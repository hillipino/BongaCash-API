# Bongacams-API
A simple responsive php template to pull Bonga Cams's affiliate XML Feed.

#Styling
You can style this template using SASS or CSS. The html display is found in 'includes/templates.php' and 'includes/functions.php'.

#Setup and Configuration
Open includes/settings.php and add your configuration details. Be sure to change your user and aff id if you want to get credit for your sales. If you do not have an affiliate account you can get one <a href="https://bongacash.com/ref?c=226357">here</a>. The following options are configurable:

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// General Configuration Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		define ( 'SITENAME',		'BongaCams API Demo' );								// Your Site Name
		define ( 'BASEHREF',		'http://v1.localhost.com/' );						// The Url path o the index.php
		define ( 'BASEPATH',		'/path/to/script' );								// The file directory path to index.php
		define ( 'FLATFILE',		BASEPATH . '/includes/data/feed.xml');				// Name of file to store xml feed into
		define ( 'USECRON',			true );												// If you would like to update via cron set this to true and add includes/cron.php to your crontab 
		define ( 'SLIDE_DIR',		'down' );											// Which direction thumbnail overlays slide in. (up,down,left,right)
		define ( 'RELATED_SHOW',	true );												// Shows related cams on single cam page.
		define ( 'RELATED_CNT', 	12 );												// The amount of related cams to show.
		define ( 'PAGINATE',		true );												
		define ( 'GOOGLE',			'' );												// Google Analytics Tracking ID Leave Blank to disable

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Links
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		define ( 'XML_FILE',		'http://tools.bongacams.com/promo.php?c=226355&type=api&api_type=xml');
		define ( 'LINK_SIGNUP',		'http://bongacams.com/track?c=226355' );			// Signup Link
		define ( 'LINK_AFF',		'https://bongacash.com/ref?c=226357' );				// Your Affiliate URL
		define ( 'LINK_BROADCAST',	'https://bongacash.com/model-ref?c=315725' );		// Broadcast your cam	

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Columns
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

		define ( 'COLUMNS_DESKTOP',	'2u' );												// How many columns do you want to show.
		define ( 'COLUMNS_LARGE',	'3u(large)' );										// How many columns do you want to show.
		define ( 'COLUMNS_TABLET',	'6u(medium)' );										// How many columns do you want to show.	
		define ( 'COLUMNS_MOBILE',	'12u(small)' );										// How many columns do you want to show.			

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Thumbnail Position Ads
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		define ( 'AD_POS1',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS2',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS3',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS4',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		
		define ( 'AD_CODE1',		NULL );										// ( Ad Code for position 1 )
		define ( 'AD_CODE2',		NULL );										// ( Ad Code for position 2 )
		define ( 'AD_CODE3',		NULL );										// ( Ad Code for position 3 )
		define ( 'AD_CODE4',		NULL );										// ( Ad Code for position 4 )	

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Random Banner Titles and Descritptions
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		#Random Descriptions
		In the settings file there is also a section that allows you to set random descriptions for the single cam display page. You can modify these descriptions or even add or remove them.
		
		If you add or remove descriptions be sure to change the following variable:
		$num 	= Rand (1,6); // 6 would be the total amount of descriptions added.
		
		#Links
		These shouldn't have to be modified but you can double check your affiliate links to make sure the codes matchup.
