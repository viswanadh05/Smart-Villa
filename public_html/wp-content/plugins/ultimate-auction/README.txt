=== Ultimate Wordpress Auction Plugin ===
Contributors: nitesh_singh
Donate link: http://auctionplugin.net/
Tags: auctions,auction,auction plugin,wp auction,wordpress auction,wp auctions,auction script,ebay,ebay auction,bidding
Requires at least: 3.5
Tested up to: 4.8.1
License: GPLv2 or later
Stable tag: trunk

Awesome plugin to host auctions on your wordpress site and sell anything you want.

== Description ==

[Main Site](http://auctionplugin.net/) | [Pro Theme Features](http://auctionplugin.net/features)| [Pro Theme Demo](http://demo.auctionplugin.net/) | [Pro Plugin Features](http://auctionplugin.net/plugin-features) | [Pro Plugin Demo](http://plugindemo.auctionplugin.net/)

Ultimate Wordpress Auction plugin allows easy and quick way to setup auctions on your site.
Simple and flexible, Lots of features, very configurable.  Easy to setup.  Great support.


*   [Awesome AUCTION THEME to setup NEW AUCTION WEBSITE!! &raquo;](http://auctionplugin.net/)

*   [Awesome AUCTION PLUGIN to host auctions on EXISTING WEBSITE!!&raquo;](http://auctionplugin.net/plugin-features)

*   [AUCTION THEME Vs FREE PLUGIN &raquo;](http://auctionplugin.net/comparison/)

 = PRO Theme Features = 
 
	1. Responsive UI
	2. Professional design 
	3. Home Page with Grid and List views
	4. My Dashboard Page
	5. Auction Detail Page
	6. Auction Search Page with Facets
	7. Login & Register pages
	8. Blog
	9. Contact Us page
	10. About page
	11. Inherits all features of PRO Plugin.
 
 = PRO Plugin Features =

	1. Reverse Auction
	2. Registered Users can add auction to your site.
	3. Front End Dashboard for users to add/manage auction.
	4. PROXY BIDDING feature
	5. Automatic Time Extension to AVOID SNIPPING.
	6. Admin can charge LISTING FEE to users to post auction.
    7. Admin can charge COMMISSIONS FEE on final bidding price.   
	8. Add SHIPPING/POSTAGE fee to auctions.
	9. CATEGORIZE Auction in different categories.
	10. Smart SEARCH feature for finding auctions.
	11. PAYPAL invoicing for handling payment.
	12. Schedule auction for later date
	13. Add more than 4 IMAGES to auction
	14. Add To WATCHLIST feature
	15. BULK IMPORT feature
	16. WIDGET to show auction.
	17. Add Tax amount

 = Free Plugin (Core) Features =
    1. Registered User can place bids 
	2. Ajax Admin panel for better management.
    3. Add standard auctions for bidding
    4. Buy Now option with paypal
    5. Upload multiple product images
    6. Show auctions in your timezone        
    7. Paypal ready payment settings
    8. Set Reserve price for your product
	9. Set Bid incremental value for auctions
	10. Ability to edit, delete & end live auctions
	11. Re-activate Expired auctions
	12. Email notifications to bidders for placing bids
    13. Email notification to Admin for all activity
    14. Email Sent for Payment Alerts
	15. Outbid Email sent to all bidders who has been outbid.
	16. Count Down Timer for auctions.
	17. Lightbox feature to display auction images
	18. Ability to Cancel last bid 
    and Much more...
	
 = Free Plugin Display Features =
    1. Auction feed Page which shows excertps of live auctions
    2. Pagination feature for feed page
    3. Auction Detail page via wordpress custom post
    4. Comments section for each auction page
	5. Send Private Message section for each auction page
	6. Tested with multiple Wordpress theme


== Installation ==

 = IMPORTANT = 

Please backup your wordpress database before you install/uninstall/activate/deactivate/upgrade Ultimate Wordpress Auction Plugin.

Manual Installation

1. Upload the `ultimate-auction` folder to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3. Visit Settings tab of the plugin and enter "payment settings" and general settings.

4. After you have setup your settings you can go to "Add Auction" tab to add your auction.

5. After you have added auctions, go to "Pages" inside your admin dashboard and add a new page.

6. Enter this text "[wdm_auction_listing]" as a shortcode inside this new page and publish it. 

7. If you have a Default Wordpress theme installed then the page you published (on step 6) will be accessible through top menu bar. NOTE: For Custom themes you would be required to add the page on top menu bar.

This page is responsible for displaying all live auctions. If you click a specific auction on this page, it'll open specific auction page where your visitors can place bids and perform all actions related to tht auction.


== Screenshots ==


== Frequently Asked Questions ==

== Changelog ==
= 4.0.0 = 
* New Feature - Responsive UI for auction pages.

= 3.7.7 =
* Fix - Add auction wasn't working properly when Ultimate Auction -> Settings -> Auction -> Allow users to bid -> "Only if they are logged in" was configured. This has been fixed.

= 3.7.6 = 
* Fix - Dutch Translation Files updated by Alex


= 3.7.5 = 
* Fix - Plugin would only show comments which are approved by admin.


= 3.7.4 = 
* Fix - False Error while adding auction about empty title and description has been fixed.

= 3.7.3 = 
* Fix - Added UAE's currency support
* Fix - Fixed South African currency symbol issue 
* Fix - Fixed multiple emails problem.


= 3.7.2 = 
* Fix - Missing file "see-more-bidder.php" has been checked in to fix Manage auction section


= 3.7.1 =
* New Feature - Auction feeder and dedicated pages are made responsive.
* New Feature - Now Bid is retained if non logged is redirected to login.
* Fix - Localhost upload problem
* Fix - Usernames are now hyperlinked to show their emails inside Manage auction section.


= 3.4.0 = 
* New Feature - Deleting auction would delete its images too.
* New Feature - Manage Auction -> Expired auction -> Payment column would now highlight payment method for better readability.
* Fix - Description text would appear without HTML code.
* Fix - New layout for Settings tab and separate Payments tab to mention payment related details.


= 3.3.0 =
* Fix - Plugin comments conflicts with theme/site comments.
* Fix - Javascript code has been moved out in separate directory as it was previously posing problem with few wordpress themes.


= 3.2.0 =
* Fix - Warning message appearing under manage auction.


= 3.1.0 =
* Fix - Auction owner cannot place bid on his own auction
* Fix - Feed page overlap issue for few WP themes.
* Fix - Timer is now localized to be converted to local language.
* Fix - Popup message saying "ʺyou can be winner if you amount is close to buy nowʺ is now rectified to show at correct time.

 
= 3.0.0 = 

* Code Update to support Proxy Bidding Addon. One needs to buy Proxy Bidding Addon for free plugin or PRO version for it.
* Code Update to support Automatic Time Extension to avoid snipping. One needs to buy Proxy Bidding Addon for free plugin or PRO version for it.
* Fix - Feed Page Image is now displayed by scaling it ratio wise which does not squeeze or blur the image.
* Fix - Default Image when no images are loaded.
* Fix - Lightbox Image container is fixed for no images. Earlier empty container was shown.


= 2.0.2 = 

* Fix - Email Notification is not working for some wordpress site.
* Fix - Paypal link not proper for email clients like outlook.


= 2.0.1 = 

* Support for new Search feature - Plugin will integrate with Categories Addon to display categories and search box.
* Auction short description field - New field added inside "Add Auction" form. This field is responsible in displaying auction excerpts (1 or 2 lines about auction) on feed page. Prior to this, 
* All prices on front end would display decimal values upto 2 places.
* Bug - Fix provided for HTML Editor for auction description to accept new line characters.
* Bug - Email Sent via plugin would have sender name as website name.

= 2.0.0 = 
* Plugin now supports Category Addon - If you want category feature then you need to buy category addon.
* Added Countdown timer for auctions.
* Breadcrumb added for dedicated auction.
* Bid Now button added on feed page.
* Lightbox feature to display auction images


= 1.0.5 = 
* HTML editor added for Product description field.
* Bulk delete feature added for Manage Auction.
* Feed page Shortcode Issue resolved: Use your own text below and above shortcode.
* Resolved plugin conflicts: Renamed common variables which causes issues with other loosely coded plugins.
* Bug Resolved pertaining to End Auction when 2 bidders are competing for auction till last minute.


= 1.0.4 = 
* Outbid Email which sends emails to all existing bidders that you have been outbid
* Code to integrate with Shipping Cost Addon. This lets you add shipping cost in auctions.


= 1.0.3 = 
* Decimal Pricing is now possible. 
To make this work: Update your plugin to 1.0.3 & then deactivate & re-activate the plugin. 


= 1.0.2 = 
* Pagination bug resolved


= 1.0.1 =
* New Feature added where only registered users can place bids
* Major CRLF bug resolved


= 1.0.0 =
Alpha Launch