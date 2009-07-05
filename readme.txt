=== wp reCAPTCHA Form ===
Contributors: Matt Rude,  gattdesign
Donate link: http://www.mattrude.com/
Tags: recaptcha form, contact, form, contact form, recaptcha, antispam, captcha
Requires at least: 2.7.1
Tested up to: 2.8
Stable tag: 1.0

A simple plugin for your WordPress blog that enables you to have a contact
form with the reCAPTCHA challenge system.

== Description ==

A simple plugin for your WordPress blog that enables you to have a contact form with the reCAPTCHA challenge system.

All you have to do is install and activate the plugin, enter your reCAPTCHA keys in the Admin section, and place the 
shortcode `[wp_recaptcha_form]` on any page or post within your blog, that's it!

You can optionally specify a theme for the reCAPTCHA box (Red, Blackglass, Clean and White), and you can also specify 
a different language (Dutch, French, German, Portuguese, Russian, Spanish and Turkish).

The form asks users for their name, email address and message.  The plugin will check that all fields have been filled 
in, and check the reCAPTCHA challenge has been validated before sending the email to the blog administrator's email 
address.

== Installation ==

1. Upload the `wp-recaptcha-form` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to the `wp reCAPTCHA Form` Admin section and enter your reCAPTCHA private and public keys
1. Use the shortcode `[wp_recaptcha_form]` in any of your posts or pages

== ChangeLog ==

= Version 1.0 =

* First release.
* Starting from reCAPTCHA Form version 1.1 by Gatt Design http://plugins.gattdesign.co.uk/

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
