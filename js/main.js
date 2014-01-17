$(function() {
    $("#slides").slidesjs({
        width: 911,
        height: 300,
        pagination: {active: false, effect: "slide"},
        navigation: {active: false, effect: "slide"}
    });

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

    function getHtml(name, text, callback) {
        $.ajax({
            url: "/scriba/markdown",
            data: {
                name: name,
                text: text
            },
            dataType: "html",
            success: callback
        });
    }

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
                var editor = new Editor({
                    text: text,
                    height: oldHeight,
                    save: function() {
                        getHtml(sectionName, editor.getText(), function(html) {
                            editor.getEl().replaceWith(html);
                        });
                    }
                });

                editable.replaceWith(editor.getEl());
            }
        });

    });

});
