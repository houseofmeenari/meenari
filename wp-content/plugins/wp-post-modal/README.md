#=== WP Post Popup ===
Contributors: allurewebsolutions
Tags: modal, popup
Donate link: https://allurewebsolutions.com/product/donation
Requires at least: 3.0
Tested up to: 5.0.3
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Turn any page / post / external page into a popup instantly!

#== Description ==
Turn any page / post / external page into a popup instantly!

Perfect for showing basic content pages without redirecting a user to the page.

#== Features ==
 * Loads only the_content() field -- excludes header/footer/sidebars/etc.
 * Optionally load custom fields using a custom page template [Documentation](https://allurewebsolutions
 .com/open-wordpress-post-modal-without-plugin#customize)
 * Trigger popup on page load using a URL a parameter
 * Show external pages in popup
 * Show only a specific div from an external page
 * Works with shortcodes and various plugins such as Contact Form 7 and BuddyPress
 * Dynamically change URL in address bar to that of the the popped up page
 * Toggle simple styling
 * Visual Editor Button for easy popup link creation
 * Set a breakpoint below which the page will load normally instead of a popup

#== Useful Links ==
* [Demo Site](https://wp-post-modal.allureprojects.com/)
* [Contact us for feedback and bug reports](https://allurewebsolutions.com/contact) ([Guidelines for submitting a
support request])(https://allurewebsolutions.com/open-wordpress-post-modal-without-plugin#support)

#== Installation ==
1. Upload `wp-post-modal.zip` to the `/wp-content/plugins/` directory and extract
2. Activate the plugin through the "Plugins" menu in WordPress
3. Add the class `modal-link` to open the href of that link into a modal window.
4. If you want to show an external page in the modal, add the attribute `data-div="#id"` to your .modal-link where the <strong>id</strong> is the container on the target external page that you would like to display inside the modal
5. A page can have multiple modal links

#== Frequently Asked Questions ==

= Will these Popups be blocked by an Ad Blocker =
They will not because these aren't "popups" in the sense of an Ad. The way this works is by creating a modal window which is a just a website block that is hidden until a click or some other action makes it visible.

= Where does the content of the popup come from? =
The content can come from any web page. If it is from a post or page (or any custom post type) from your site, it will
be the content that is in the WordPress editor (or from a custom template) . In other words, the popup will not show
your header, footer, nor sidebars. Just the primary content. If it is from another website, it will typically be the
core or main content on that page, but you define that.

You simply make a page or post with the content you want, as you always do.

= How is the popup triggered? =
[See Documentation](http://wp-post-modal.allureprojects.com/documentation)

= Can I use anchor links? =
Yes, you can add an anchor to the end of your URL (for internally linked pages) and the popup will scroll to the
position of the anchor.

= What if my External Page isn't loading =
If your external page isn't working, then you can try using the "iFrame method." With the iFrame method the entire
external page will load. You will not be able to specify a specific div to load.

There are two ways to use the iframe method:

1. Add the class `iframe` to your modal-link to selectively use the iframe method
1. Turn on the iframe method in the plugin settings to make all external links use the iframe method

= Can I change the look of trigger link? =
Absolutely, any way you want. You can turn it into a button like this: `<a class="modal-link" href="http://my-site/privacy-policy/"><button type="button">Our Privacy Policy</button></a>` or make it an image.

= How do I change the look of the popup it self? What settings are available? =
[See Documentation](http://wp-post-modal.allureprojects.com/documentation)

= Can I have multiple popups on one page? =
Yes, you can have as many as you like.

== Screenshots ==
1. How the modal looks with simple text page content
2. Style the popup within the WP Customizer
3. Available plugin settings
4. Easily insert popup link with custom button in Visual Editor

#== Changelog ==
1.0: Initial release
1.4: Add color overlay
1.4.1: Bug fix
1.4.2: Add click outside modal functionality
2.0: Version 2.0 contains new plugin settings, insert popup button in Visual Editor, refactored to using WP Rest API, and more!
2.0.1: AJAX method for loading external content
2.0.2: Minor styling fixes
2.0.3: Bug fix for if visual composer installed active
2.0.4: Works with all custom post types
2.0.5: Fix link when only slug is used
2.1: Add legacy method with fallback, admin notices, remote notice, added support for buddypress profiles
2.1.1: Update remote admin notice functionality
2.1.2: Close popup with esc key
2.1.3: Minor styling fixes
2.1.4: Made Visual Editor button optional in plugin settings, improved error handling in ajax requests, refactor admin notice dismissal
2.1.5: Add iframe method for loading more complicated external pages
2.1.6: Added support for anchor links and open with modal through URL
2.1.7: Changed slide down effect to fade in, prevented body scrolling when popup is open, recognize development URLs
with port number
2.1.8: Minor fix to move body to previously scrolled position after popup is closed
2.1.9: Refactor post with anchor functionality
2.1.10: Allow preceding forward slash on anchor links, check if modal is open before running close modal function on window click
2.2: Add functionality to update URL in address bar
3.0: Many improvements in plugin code
3.0.1: Fix scrolling bug
3.1.0: Added setting to toggle loading animation