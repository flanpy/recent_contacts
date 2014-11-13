Plugin recent_contacts
============
Display recent contacts in mail compose using jQueryUI (*BETA*)

## Installation :

1. Download plugin in plugins folder of your roundcube installation.
2. Add "recent_contacts" (+ "jqueryui" if not already defined) to $config['plugins'] in cfg file.


## Features :
Display the most recent contacts while you compose a mail (`task="mail"` & `action="compose"`)
####How it works:
While you compose a mail, if you click on the empty search input, an additional query is sent to the IMAP server to find 3 recent contacts and display them.
Return an array to update the `source` option of jQueryUI autocomplete feature.

## ToDo :
- [ ] Caching the request (not doing it again and again, and again...)
- [ ] A click on a element should transfer the value to `TO:` field
