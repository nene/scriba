module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    shell: {
        "refresh-po": {
            command: [
                "find . -name '*.php' | xargs xgettext -L PHP --from-code UTF-8 -o locale/messages.pot",
                "msgmerge --update --backup=none locale/en_US/LC_MESSAGES/en_US.po locale/messages.pot", 
                "msgmerge --update --backup=none locale/fi_FI/LC_MESSAGES/fi_FI.po locale/messages.pot", 
                "msgmerge --update --backup=none locale/sv_SE/LC_MESSAGES/sv_SE.po locale/messages.pot", 
                "msgmerge --update --backup=none locale/ru_RU/LC_MESSAGES/ru_RU.po locale/messages.pot", 
                "rm locale/messages.pot"
            ].join("&&")
        },
        "generate-mo": {
            command: [
                "msgfmt -o locale/en_US/LC_MESSAGES/en_US.mo locale/en_US/LC_MESSAGES/en_US.po", 
                "msgfmt -o locale/fi_FI/LC_MESSAGES/fi_FI.mo locale/fi_FI/LC_MESSAGES/fi_FI.po", 
                "msgfmt -o locale/sv_SE/LC_MESSAGES/sv_SE.mo locale/sv_SE/LC_MESSAGES/sv_SE.po", 
                "msgfmt -o locale/ru_RU/LC_MESSAGES/ru_RU.mo locale/ru_RU/LC_MESSAGES/ru_RU.po"
            ].join("&&")
        }
    }
  });

  grunt.loadNpmTasks('grunt-shell');

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

};
