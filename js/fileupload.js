$(function() {
    // For HTML5 multi-upload capable browsers
    function displayMultiSelection(files) {
        $(".upload-filelist").empty();
        for (var i=0; i<files.length; i++) {
            $(".upload-filelist").append($("<li/>").text(files[i].name));
        }
    }

    // Fallback for older browsers
    function displaySingleSelection(fileName) {
        var baseName = fileName.replace(/^.*[\/\\]/, "");
        $(".upload-filelist").empty();
        $(".upload-filelist").append($("<li/>").text(baseName));
    }

    // Redirect click events from our custom button to the actual
    // file input field.
    $(".upload-button").bind("click", function() {
        $("input[type='file']").click();
    });

    // When files are selected for uplod, display them in list.
    $("input[type='file']").bind("change", function(e) {
        if (e.target.files) {
            displayMultiSelection(e.target.files);
        } else {
            displaySingleSelection($(this).val());
        }
    });

});
