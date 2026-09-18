/* Settings → Site Images: wires each "Choose Image" / "Remove" button to
   the standard WordPress media library picker. Runs only on that admin
   screen (enqueued conditionally in functions.php). */
jQuery(function ($) {
	$(".denson-cel-image-field").each(function () {
		var $field = $(this);
		var $preview = $field.find(".denson-cel-image-preview");
		var $input = $field.find(".denson-cel-image-id");
		var $choose = $field.find(".denson-cel-choose-image");
		var $remove = $field.find(".denson-cel-remove-image");
		var frame;

		$choose.on("click", function (e) {
			e.preventDefault();
			if (frame) {
				frame.open();
				return;
			}
			frame = wp.media({
				title: "Choose Image",
				button: { text: "Use This Image" },
				multiple: false,
				library: { type: "image" }
			});
			frame.on("select", function () {
				var attachment = frame.state().get("selection").first().toJSON();
				var url = (attachment.sizes && attachment.sizes.medium) ? attachment.sizes.medium.url : attachment.url;
				$input.val(attachment.id);
				$preview.attr("src", url).show();
				$choose.text("Change Image");
				$remove.show();
			});
			frame.open();
		});

		$remove.on("click", function (e) {
			e.preventDefault();
			$input.val("");
			$preview.hide().attr("src", "");
			$choose.text("Choose Image");
			$remove.hide();
		});
	});
});
