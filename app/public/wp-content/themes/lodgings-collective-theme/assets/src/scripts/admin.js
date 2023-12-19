// RC Slider jQuery for admin attachment images
jQuery(function ($) {
	$('body').on('click', '.wc_multi_upload_image_button', function (e) {
		e.preventDefault();

		var button = $(this),
			custom_uploader = wp
				.media({
					title: 'Insert image',
					button: { text: 'Use this image' },
					multiple: true,
				})
				.on('select', function () {
					let attach_ids = '';
					attachments;
					var attachments = custom_uploader.state().get('selection'),
						attachment_ids = new Array(),
						i = 0;
					attachments.each(function (attachment) {
						attachment_ids[i] = attachment.id;
						attach_ids += ',' + attachment.id;
						if (attachment.attributes.type === 'image') {
							$(button)
								.siblings('ul')
								.append(
									'<li data-attachment-id="' +
										attachment.id +
										'"><a href="' +
										attachment.attributes.url +
										'" target="_blank"><img class="true_pre_image" src="' +
										attachment.attributes.url +
										'" /></a><i class=" dashicons dashicons-no delete-img"></i></li>'
								);
						} else {
							$(button)
								.siblings('ul')
								.append(
									'<li data-attachment-id="' +
										attachment.id +
										'"><a href="' +
										attachment.attributes.url +
										'" target="_blank"><img class="true_pre_image" src="' +
										attachment.attributes.icon +
										'" /></a><i class=" dashicons dashicons-no delete-img"></i></li>'
								);
						}

						i++;
					});

					var ids = $(button)
						.siblings('.attachments-ids')
						.attr('value');
					if (ids) {
						var ids = ids + attach_ids;
						$(button)
							.siblings('.attachments-ids')
							.attr('value', ids);
					} else {
						$(button)
							.siblings('.attachments-ids')
							.attr('value', attachment_ids);
					}
					$(button).siblings('.wc_multi_remove_image_button').show();
				})
				.open();
	});

	$('body').on('click', '.wc_multi_remove_image_button', function () {
		$(this)
			.hide()
			.prev()
			.val('')
			.prev()
			.addClass('button')
			.html('Add Media');
		$(this).parent().find('ul').empty();
		return false;
	});
});

jQuery(document).ready(function () {
	jQuery(document).on(
		'click',
		'.multi-upload-medias ul li i.delete-img',
		function () {
			const ids = [];
			const this_c = jQuery(this);
			jQuery(this).parent().remove();
			jQuery('.multi-upload-medias ul li').each(function () {
				ids.push(jQuery(this).attr('data-attachment-id'));
			});
			jQuery('.multi-upload-medias')
				.find('input[type="hidden"]')
				.attr('value', ids);
		}
	);
});

// Re-aarange images in admin
jQuery(document).ready(function () {
	jQuery('.multi-upload-medias ul').sortable({
		stop(event, ui) {
			const ids = [];
			jQuery('.multi-upload-medias ul li').each(function () {
				ids.push(jQuery(this).attr('data-attachment-id'));
			});
			jQuery('.multi-upload-medias')
				.find('input[type="hidden"]')
				.attr('value', ids);
		},
	});
});

// Uncheck checkboxes when one of them is checked in 'change image sizes' option for the slider
document.addEventListener('DOMContentLoaded', function () {
	const checkboxes = document.querySelectorAll('.checkbox-sizes');

	for (const checkbox of checkboxes) {
		checkbox.addEventListener('click', function () {
			for (const otherCheckbox of checkboxes) {
				if (otherCheckbox !== this) {
					otherCheckbox.checked = false;
				}
			}
		});
	}
});
