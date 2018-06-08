=== Look-See Security Scanner ===
Contributors: blobfolio
Donate link: https://blobfolio.com/donate.html
Tags: wordpress security, security plugin, file scanner, security scanner, filesystem, file checker, security, secure, malware, antivirus, exploit, infection, protection
Requires at least: 4.4
Tested up to: 4.9
Requires PHP: 7.0
Stable tag: trunk
License: WTFPL
License URI: http://www.wtfpl.net

Verify the integrity of a WP installation by scanning for unexpected or modified files.

== Description ==

Look-see Security Scanner is designed to help you quickly and easily spot the sorts of file system irregularities that happen when a site is hacked.

 * Verify the integrity of all core WordPress files, including plugins and themes hosted by WordPress;
 * Search `wp-admin/` and `wp-includes/` for unexpected files;
 * Search `wp-content/uploads/` for hidden scripts;
 * Identify file changes since previous scan;
 * Locate files left over from older versions of WordPress;
 * Analyze configurations for oversights and vulnerabilities;
 * Check uploaded themes and plugins against the [WPScan Vulnerabilitiy Database](https://wpvulndb.com/);
 * Pro: Schedule scans;
 * Pro: One-click delete, ignore, fix, and source viewer;
 * Pro: Full feature access through [WP-CLI](https://wp-cli.org/);

== Requirements ==

Due to the advanced nature of some of the plugin features, there are a few additional server requirements beyond what WordPress itself requires:

 * WordPress 4.4 or later.
 * PHP 7.0 or later.
 * PHP extensions: date, filter, json, pcre, spl
 * CREATE and DROP MySQL grants.

Please note: it is **not safe** to run WordPress atop a version of PHP that has reached its [End of Life](http://php.net/supported-versions.php). As of right now, that means your server should only be running **PHP 5.6 or newer**.

Future releases of this plugin might, out of necessity, drop support for old, unmaintained versions of PHP. To ensure you continue to receive plugin updates, bug fixes, and new features, just make sure PHP is kept up-to-date. :)

== Premium Version ==

[Look-See Pro](https://blobfolio.com/plugin/look-see-security-scanner/) is the same great administrative tool, just more of it!

 * [WP-CLI](https://wp-cli.org/): file scans, configuration analysis, and vulnerability searches can be run from the command line.
 * Quick Actions: view source code, fix file permission/ownership issues, ignore, or delete a file with the click of a button.
 * Scheduling: set-and-forget scan settings by day of the week.

To learn more, visit [blobfolio.com](https://blobfolio.com/plugin/look-see-security-scanner/).

== Frequently Asked Questions ==

= Is this plugin compatible with WPMU? =

The plugin is only meant to be used with single-site WordPress installations.

= Does Look-See correct any problems it finds? =

The free version of Look-See will point out potential issues and recommend follow-up actions, but it is left up to you to actually complete those actions.

The pro version includes "quick action" links when viewing scan results that can let you view a file's source, fix permission/ownership issues, and/or ignore or delete it with the push of a button.

= Every scan is timing out? =

Unfortunately file system operations like scanning can be very resource-intensive. A lot of low-end, budget shared hosting providers might have completing a scan.

In such cases, you could try fiddling with the ignore rules — ignore images and other large files — but ultimately the solution is to probably just find better hosting.

= If there are no warnings, does that mean I am A-OK? =

Not necessarily. There could still be backdoors elsewhere on the server. As always, we recommend you maintain best security practices and keep regular back-ups.

= Can scans be automated? =

The free version of the plugin requires scans be run manually through the admin interface.

The pro version contains WP-CLI integration, allowing scans to be run through the command line (thus scans can be executed any which way through server-side scripts or CRON jobs).

For pro users without command line access, it is also possible to set up scheduled scanning through the admin interface, though because of how WordPress executes its scheduled tasks, such scans will take a while to complete.

== Installation ==

Nothing fancy!  You can use the built-in installer on the Plugins page or extract and upload the `look-see-security-scanner` folder to your plugins directory via FTP.

To install this plugin as [Must-Use](https://codex.wordpress.org/Must_Use_Plugins), download, extract, and upload the `look-see-security-scanner` folder to your mu-plugins directory via FTP. See the [MU Caveats](https://codex.wordpress.org/Must_Use_Plugins#Caveats) for more information about getting WordPress to load an MU plugin that is in a subfolder.

Please note: MU Plugins are removed from the usual update-checking process, so you will need to handle future updates manually.

== Screenshots ==

1. The file scan page at rest.
2. The file scan in progress is updated in realtime and optimized to complete even on slow servers.
3. Overview of past scans.
4. Detailed scan results with explainations and more.
5. View each plugin and theme's history of published vulnerabilities.
6. Configuration analysis, offering suggestions to improve site security.

== Privacy Policy ==

This plugin does not make use of or collect any "Personal Data".

As mentioned earlier, the plugin and theme vulnerability history tool pulls remote data from the [WPScan Vulnerability Database](https://wpvulndb.com/); the maintainers of that project may or may not log your site's public IP address as a result.

== Changelog ==

= 21.2.1 =
* [Misc] Update dependencies.

= 21.2.0 =
* [Misc] Update dependencies.
* [Misc] Minor performance improvements.

= 21.1.2 =
* [New] Use the new WP.org plugin checksum API endpoint (where possible).

= 21.1.1 =
* [Fix] Workaround for Intl PHP 7.2 bug.
* [Fix] Workaround for missing mbstring PHP extension.

= 21.1.0 =
* [Fix] Improve recovery cleanup for temporary files and directories.

== Upgrade Notice ==

= 21.2.1 =
This release just updates some dependencies.

= 21.2.0 =
This release brings minor performance improvements and updated dependencies.

= 21.1.2 =
This release implements the new WP.org plugin checksum API endpoint, reducing scan times and overhead.

= 21.1.1 =
This release includes compatibility improvements for PHP 7.2 and hosts missing the mbstring PHP extension.

= 21.1.0 =
This release improves temporary file cleanup after PHP timeouts, etc.
