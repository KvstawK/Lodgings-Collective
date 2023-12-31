<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6144624af660f69a9306fbbffbaa22a4
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6144624af660f69a9306fbbffbaa22a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6144624af660f69a9306fbbffbaa22a4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6144624af660f69a9306fbbffbaa22a4::$classMap;

        }, null, ClassLoader::class);
    }
}
