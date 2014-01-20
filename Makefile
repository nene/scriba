all:
	echo "Nothing to do by default."
	echo "Available targets: refresh-po generate-mo"

# target: refresh-po - Scan PHP files for new translatable messages.
refresh-po:
	find . -name '*.php' | xargs xgettext -L PHP --from-code UTF-8 -o locale/messages.pot
	msgmerge --update --backup=none locale/en/LC_MESSAGES/en.po locale/messages.pot
	msgmerge --update --backup=none locale/fi/LC_MESSAGES/fi.po locale/messages.pot
	msgmerge --update --backup=none locale/sv/LC_MESSAGES/sv.po locale/messages.pot
	msgmerge --update --backup=none locale/ru/LC_MESSAGES/ru.po locale/messages.pot
	rm locale/messages.pot

# target: generate-mo - Generates binary Gettext message catalogs.
generate-mo:
	msgfmt -o locale/en/LC_MESSAGES/en.mo locale/en/LC_MESSAGES/en.po
	msgfmt -o locale/fi/LC_MESSAGES/fi.mo locale/fi/LC_MESSAGES/fi.po
	msgfmt -o locale/sv/LC_MESSAGES/sv.mo locale/sv/LC_MESSAGES/sv.po
	msgfmt -o locale/ru/LC_MESSAGES/ru.mo locale/ru/LC_MESSAGES/ru.po

