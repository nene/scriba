$(function() {
	$("#slides").slidesjs({
		width: 911,
		height: 300,
		pagination: {active: false, effect: "slide"},
		navigation: {active: false, effect: "slide"}
	});

	// Switch to editor when an editable area is clicked on.
	$("article").on("click", ".editable", function() {
		var editable = $(this);
		var oldWidth = editable.width();
		var oldHeight = editable.height();
		var sectionName = $(this).data("name");

		$.ajax({
			url: "/scriba/markdownSource",
			data: {name: sectionName},
			dataType: "text",
			success: function(text) {
				var field = $("<textarea class='markdown-editor'>"+text+"</textarea>");
				field.css({
					width: "100%",
					height: oldHeight
				});

				// switch back the old content
				field.click(function() {
					$(this).replaceWith(editable);
				});

				editable.replaceWith(field);
			}
		});

	});

});