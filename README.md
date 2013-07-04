IRPG Website Code v1.4.2 (04/07/13)
===

Description
---
This is a version of the [IdleRPG site][ois] updated using [bootstrap][bs].

Installation
------------

1. Make sure you have the bot functional and running.
2. Copy all the files here to your public_html or some folder.
3. Edit config.php with your favorite editor.
4. chmod 644 * && chmod 777 hits.db
5. If you change the default settings in the IRPG bot (for example, if you turn
   off the option to write quest info to file, you'll have to manually edit
   some scripts to take this into account. If you disable the INFO command,
   you might want to remove it from the index.php page.
6. Some code in this package requires that your system have GD 2.0+ (or have it
   enabled in your php.ini, on Win32). If you don't want this functionality to
   be available, edit the script playerview.php to remove the use of the map
   and header.php to remove the links to the world map and the quest info page.
   You can also delete the worldmap.php, makeworldmap.php, makemap.php,
   quest.php, and makequestmap.php scripts.

Theme Creation
--------------

Currently to create a theme you need to either use the [twitter bootstrap customiser][bsc] (suggested), or take one of the provided themes and modify the content of that with a text editor.

Changes
---

This site differs from the original site source:
* HTML5 & CSS3
* Only uses long php tags since short tags that were provided with the original have been disabled in some places I've used sites
* Per-page header CSS
* Configurable Network Name, Network URL and irc channel link
* change active page in nav bar depending on what page is being looked at
* minor cosmetic changes for other pages.
* Ability to add themes!
* cleaner looking playerview page
* Configurable for old and new google analytics tracking code
* And more!

For more changes please see the [original change][ocl] log.

Licensce
---

The modifications of the original [IdleRPG site source][ois] are licensed under [Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA)](http://creativecommons.org/licenses/by-nc-sa/3.0/).

[ois]: http://idlerpg.net/
[ocl]: https://raw.github.com/adamus1red/idlerpg-site/01df15980c9e111c04d23ecaa8d7a0b7dd82d912/ChangeLog
[bs]: http://twitter.github.io/bootstrap/
[bsc]: http://twitter.github.io/bootstrap/customize.html#variables