module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        shell: {
            "permissions": {
                command: "chmod -R a+w content/*"
            },
            "refresh-po": {
                command: [
                    "find . -name '*.php' | xargs xgettext -L PHP --from-code UTF-8 -o locale/messages.pot",
                    "msgmerge --update --backup=none locale/en_US/LC_MESSAGES/en_US.po locale/messages.pot",
                    "msgmerge --update --backup=none locale/ru_RU/LC_MESSAGES/ru_RU.po locale/messages.pot",
                    "rm locale/messages.pot"
                ].join("&&")
            },
            "generate-mo": {
                command: [
                    "msgfmt -o locale/en_US/LC_MESSAGES/en_US.mo locale/en_US/LC_MESSAGES/en_US.po",
                    "msgfmt -o locale/ru_RU/LC_MESSAGES/ru_RU.mo locale/ru_RU/LC_MESSAGES/ru_RU.po"
                ].join("&&")
            }
        },
        less: {
            production: {
                options: {
                    cleancss: true
                },
                files: {
                    "css/styles.min.css": "css/styles.less"
                }
            }
        },
        jshint: {
            options: {
                camelcase: true,
                curly: true,
                eqeqeq: true,
                forin: true,
                freeze: true,
                immed: true,
                indent: 4,
                latedef: true,
                newcap: true,
                noarg: true,
                noempty: true,
                undef: true,
                unused: true,
                trailing: true,
                browser: true,
                jquery: true,
                node: true,
                globals: {"SCRIBA_BASE_URL": true}
            },
            all: [
                'Gruntfile.js',
                'js/*.js'
            ]
        }
    });

    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-jshint');

    grunt.registerTask(
        'permissions',
        'Grant PHP write permissions to content/ dir.',
        ['shell:permissions']
    );

    grunt.registerTask(
        'refresh-po',
        'Scan PHP files for new translatable messages.',
        ['shell:refresh-po']
    );

    grunt.registerTask(
        'generate-mo',
        'Generates binary Gettext message catalogs.',
        ['shell:generate-mo']
    );

    grunt.registerTask(
        'default',
        'Generates all resources for production app.',
        ['permissions', 'generate-mo', 'less']
    );
};
