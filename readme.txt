=== reCAPTCHA Form ===
Contributors: gattdesign
Donate link: http://plugins.gattdesign.co.uk/
Tags: recaptcha form, contact, form, contact form, recaptcha, antispam, captcha
Requires at least: 2.7.1
Tested up to: 2.8
Stable tag: 1.1

This plugin enables you to use a reCAPTCHA contact form on your blog.

== Description ==

A simple plugin for your WordPress blog that enables you to have a contact form with the reCAPTCHA challenge system.

All you have to do is install and activate the plugin, enter your reCAPTCHA keys in the Admin section, and place the 
shortcode `[recaptcha_form]` on any page or post within your blog, that's it!

You can optionally specify a theme for the reCAPTCHA box (Red, Blackglass, Clean and White), and you can also specify 
a different language (Dutch, French, German, Portuguese, Russian, Spanish and Turkish).

The form asks users for their name, email address and message.  The plugin will check that all fields have been filled 
in, and check the reCAPTCHA challenge has been validated before sending the email to the blog administrator's email 
address.

== Installation ==

1. Upload the `gd-recaptcha` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to the `reCaptcha Form` Admin section and enter your reCAPTCHA private and public keys
1. Use the shortcode `[recaptcha_form]` in any of your posts or pages

== ChangeLog ==

= Version 1.1 =

* Modified reCAPTCHA HTML form for W3C XHTML standards compliancy.
* Added support for other reCAPTCHA box themes (Blackglass, Clean and White).
* Added support for Dutch, French, German, Portuguese, Russian, Spanish and Turkish languages.

= Version 1.0.1 =

* Bug fix for WordPress installations that do not have any other plugins which use reCAPTCHA.

= Version 1.0 =

* First release.

== Frequently Asked Questions ==

= Where Can I Use The reCAPTCHA Form? =

You can use it in any post or page.  Simply insert the shortcode `[recaptcha_form]`

= I Don't Have Any reCAPTCHA Keys.  Where Can I Get Them From? =

You can get them from the [reCAPTCHA website](http://recaptcha.net/whyrecaptcha.html "reCAPTCHA website").

= Can I Use This Plugin With Other Plugins That Use reCAPTCHA? =

reCAPTCHA Form can be installed alongside any other plugins that use the reCAPTCHA challenge system, however you must 
make sure that whatever post/page you insert the reCAPTCHA Form shortcode on does not already display a reCAPTCHA 
form - this is because you cannot display more than one reCAPTCHA form on the same HTML page.

== Translation Credits ==

* German: [Ömür Yolcu Iskender](http://www.pandorascode.com/ "Ömür Yolcu Iskender"), [socreative.tv](http://socreative.tv/ "socreative.tv")
* Russian: [socreative.tv](http://socreative.tv/ "socreative.tv")
* Turkish: [Ömür Yolcu Iskender](http://www.pandorascode.com/ "Ömür Yolcu Iskender")

== Screenshots ==

1. The reCAPTCHA admin section
2. The reCAPTCHA form