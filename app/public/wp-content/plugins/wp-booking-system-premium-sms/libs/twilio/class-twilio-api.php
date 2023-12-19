<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

require_once WPBS_SMS_PLUGIN_DIR . 'libs/twilio/vendor/autoload.php';

use Twilio\Rest\Client;

class WPBS_Twilio_API
{

    public $twilio;
    public $twilio_api;

    public function __construct()
    {
        $this->twilio_api = get_option('wpbs_twilio_api', array());

        $this->account_sid = isset($this->twilio_api['twilio_account_sid']) ? trim($this->twilio_api['twilio_account_sid']) : '';
        $this->auth_token = isset($this->twilio_api['twilio_auth_token']) ? trim($this->twilio_api['twilio_auth_token']) : '';
        $this->phone_number = isset($this->twilio_api['twilio_phone_number']) ? trim($this->twilio_api['twilio_phone_number']) : '';

        if (!$this->account_sid || !$this->auth_token) {
            return false;
        }

        $this->twilio = new Client($this->account_sid, $this->auth_token);

    }

    public function send($to, $message)
    {

        if(!$this->twilio){
            return false;
        }

        $from = isset($this->twilio_api['twilio_sender_id']) && !empty($this->twilio_api['twilio_sender_id']) ? $this->twilio_api['twilio_sender_id'] : $this->phone_number;
        
        try {
            $response = $this->twilio->messages->create(
                $to,
                [
                    'from' => $from,
                    'body' => $message,
                ]
            );

            return array('success' => true);

        } catch (Exception $e) {
            return array('success' => false, 'error' => $e->getMessage());
        }

    }

    public function validate($number)
    {
        if(!$number){
            return false;
        }
        
        try {
            $phone_number = $this->twilio->lookups->v1->phoneNumbers($number)->fetch();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
