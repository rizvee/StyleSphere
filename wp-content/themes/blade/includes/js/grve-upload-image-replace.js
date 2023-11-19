jQuery(document).ready(function($) {

	"use strict";

	var grveMediaImageReplaceFrame;
	var grveMediaImageReplaceContainer;
	var grveMediaImageReplaceMode;
	var grveMediaImageReplaceImage;
	var grveMediaImageFieldName;

	$(document).on("click",".grve-upload-remove-image",function(e) {
		e.preventDefault();
		$(this).parent().find('.grve-upload-media-id').val('0');
		$(this).parent().removeClass('grve-visible');
	});

	$(document).on("click",".grve-upload-replace-image",function() {
		grveMediaImageReplaceContainer = $(this).parent().find('.grve-thumb-container');
		grveMediaImageReplaceMode = grveMediaImageReplaceContainer.data('mode');
		grveMediaImageFieldName = grveMediaImageReplaceContainer.data('field-name');
		grveMediaImageReplaceImage = $(this).parent().find('.grve-thumb');

		if ( grveMediaImageReplaceFrame ) {
			grveMediaImageReplaceFrame.open();
			return;
		}

		grveMediaImageReplaceFrame = wp.media.frames.grveMediaImageReplaceFrame = wp.media({
			className: 'media-frame grve-media-replace-image-frame',
			frame: 'select',
			multiple: false,
			title: grve_upload_image_replace_texts.modal_title,
			library: {
				type: 'image'
			},
			button: {
				text:  grve_upload_image_replace_texts.modal_button_title
			}
		});

		grveMediaImageReplaceFrame.on('select', function(){
			var selection = grveMediaImageReplaceFrame.state().get('selection');
			var ids = selection.pluck('id');
			grveMediaImageReplaceImage.remove();
			grveMediaImageReplaceContainer.addClass('grve-visible grve-loading');
			var dataParams = {
				action:'blade_grve_get_replaced_image',
				attachment_id: ids.toString(),
				attachment_mode: grveMediaImageReplaceMode,
				field_name: grveMediaImageFieldName,
				_grve_nonce: grve_upload_image_replace_texts.nonce_replace
			};

			$.post( grve_upload_image_replace_texts.ajaxurl, dataParams, function( mediaHtml ) {
				grveMediaImageReplaceContainer.html(mediaHtml).removeClass('grve-loading');
			}).fail(function(xhr, status, error) {
				grveMediaImageReplaceContainer.removeClass('grve-visible grve-loading');
			});
		});

		grveMediaImageReplaceFrame.open();
	});

});