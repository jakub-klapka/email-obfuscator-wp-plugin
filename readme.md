E-mail obfuscator WP plugin
===
Just another plugin for anti-robot e-mail obfuscator. This one is focused on theme developers and speed.

Why?
---
I wanted two things, which other similar plugins didn't offer.

 - It should be very lightweight and load code (both PHP and JS) only, when it's needed.
 - I wanted to be able manage jquery dependency, so I can have jQuery included in my global js file and plugin will use it, instead of loading whole jquery from WP.
 - Also I sometimes need to add class to anchor for styling purposes.

Usage
---
    [lumi-email title="Send me and e-mail" class="emailclass1 emailclass2"]me@example.com[/lumi-email]

or just

    [lumi-email]me@example.com[/lumi-email]

you get the point.

You can use it in theme development simply by running `do_shortcode` like:

    <?php echo do_shortcode('[lumi-email]me@example.com[/lumi-email]'); ?>

Filters
---

    lumi-email-obfuscator/jquery_library
    
Put your script handle into this filter and plugin will assume, that jquery is in this script and it will use it.