all:
	echo "Nothing to do by default."
	echo "Available targets: refresh-po generate-mo"

# target: refresh-po - Scan PHP files for new translatable messages.
refresh-po:
	find . -name '*.php' | xargs xgettext -L PHP --from-code UTF-8 -o locale/messages.pot
	msgmerge --update --backup=none locale/en_US/LC_MESSAGES/en_US.po locale/messages.pot
	msgmerge --update --backup=none locale/fi_FI/LC_MESSAGES/fi_FI.po locale/messages.pot
	msgmerge --update --backup=none locale/sv_SE/LC_MESSAGES/sv_SE.po locale/messages.pot
	msgmerge --update --backup=none locale/ru_RU/LC_MESSAGES/ru_RU.po locale/messages.pot
	rm locale/messages.pot

# target: generate-mo - Generates binary Gettext message catalogs.
generate-mo:
	msgfmt -o locale/en_US/LC_MESSAGES/en_US.mo locale/en_US/LC_MESSAGES/en_US.po
	msgfmt -o locale/fi_FI/LC_MESSAGES/fi_FI.mo locale/fi_FI/LC_MESSAGES/fi_FI.po
	msgfmt -o locale/sv_SE/LC_MESSAGES/sv_SE.mo locale/sv_SE/LC_MESSAGES/sv_SE.po
	msgfmt -o locale/ru_RU/LC_MESSAGES/ru_RU.mo locale/ru_RU/LC_MESSAGES/ru_RU.po

