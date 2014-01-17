$(function() {
    /**
     * A simple Markdown editor to edit the given `text`.
     */
    function Editor(cfg) {
        var field = $("<textarea/>").text(cfg.text);
        field.css({
            width: "100%",
            height: cfg.height
        });

        // Save button that switches back the old content
        var button = $("<button/>").text("Salvesta");

        var editor = $("<div class='markdown-editor'>");
        editor.append(field);
        editor.append(button);

        button.click(cfg.save);

        this.getEl = function() {
            return editor;
        };

        this.getText = function() {
            return field.val();
        };
    }

    function loadMarkdown(sectionName, callback) {
        $.ajax({
            url: SCRIBA_BASE_URL+"/"+sectionName,
            method: "GET",
            data: {
                admin: true,
                source: true
            },
            dataType: "text",
            success: callback
        });
    }

    function saveMarkdown(sectionName, text, callback) {
        $.ajax({
            url: SCRIBA_BASE_URL+"/"+sectionName,
            method: "POST",
            data: {
                admin: true,
                save: true,
                text: text
            },
            dataType: "html",
            success: callback
        });
    }

    // Switch to editor when an editable area is clicked on.
    $("body").on("click", ".editable", function() {
        var editable = $(this);
        var oldWidth = editable.width();
        var oldHeight = editable.height();
        var sectionName = $(this).data("name");

        loadMarkdown(sectionName, function(text) {
            var editor = new Editor({
                text: text,
                height: oldHeight,
                save: function() {
                    saveMarkdown(sectionName, editor.getText(), function(html) {
                        editor.getEl().replaceWith(html);
                    });
                }
            });

            editable.replaceWith(editor.getEl());
        });

    });

});
