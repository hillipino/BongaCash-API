<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// General Configuration Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		define ( 'SITENAME',		'BongaCams API Demo' );								// Your Site Name
		define ( 'BASEHREF',		'http://yourdomain.com/' );							// The Url path o the index.php
		define ( 'BASEPATH',		'/path/to/script' );								// The file directory path to index.php
		define ( 'FLATFILE',		BASEPATH . '/includes/data/feed.xml');				// Name of file to store xml feed into
		define ( 'USECRON',			false );											// If you would like to update via cron set this to true and add includes/cron.php to your crontab 
		define ( 'SLIDE_DIR',		'down' );											// Which direction thumbnail overlays slide in. (up,down,left,right)
		define ( 'RELATED_SHOW',	true );												// Shows related cams on single cam page.
		define ( 'RELATED_CNT', 	12 );												// The amount of related cams to show.
		define ( 'PAGINATE',		true );												
		define ( 'GOOGLE',			'' );												// Google Analytics Tracking ID Leave Blank to disable
		define ( 'CATEGORY',		'all' );											// What category do you want to show ( all , male, female, tranny)

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Links
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		switch ( CATEGORY ) {

			case 'all':
				$category_string = '&categories[]=female&categories[]=male&categories[]=transsexual';
				break;
			case 'female':
				$category_string = '&categories[]=female';
				break;
				
			case 'male':
				$category_string = '&categories[]=male';
				break;
			case 'tranny':
				$category_string = '&categories[]=transsexual';
				break;	
		}

		define ( 'XML_FILE',		'http://tools.bongacams.com/promo.php?c=226355&type=api&api_type=xml' . $category_string );
		define ( 'LINK_SIGNUP',		'http://bongacams.com/track?c=226355' );			// Signup Link
		define ( 'LINK_AFF',		'https://bongacash.com/ref?c=226357' );				// Your Affiliate URL
		define ( 'LINK_BROADCAST',	'https://bongacash.com/model-ref?c=315725' );		// Broadcast your cam
		define ( 'EMBED',			'http://tools.bongacams.com/promo.php?c=226355&type=embed_chat');	// Chatroom embed for offline cams

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
	
		function random_banner_title( $model ) {

			$num 	= Rand (1,7);

			switch ($num) {

				// Description 1

					case 1:
						echo 'Hi, I\'m ' . $model;
						break;	

					case 2:
						echo 'Hey, my name is ' . $model;
						break;
									
					case 3:
						echo 'Hello, I\'m ' . $model;
						break;
									
					case 4:
						echo 'Hola, soy ' . $model;
						break;
									
					case 5:
						echo 'Hi there, I\'m ' . $model;
						break;
									
					case 6:
						echo 'Howdy, I\'m ' . $model;
						break;
									
					case 7:
						echo 'Hey Guys, I\'m ' . $model;
						break;								

			}

		}	


		function random_banner_text( ) {

			$num 	= Rand (1,5);

			switch ($num) {

				// Description 1

					case 1:
						echo 'I\'m streaming live right now and can\'t wait to chat with you!';
						break;

					case 2:
						echo 'I\'m home all alone and need someone to chat with. Will you CUM join me?';
						break;
									
					case 3:
						echo 'I\'m being very naughty on my cam right now! Want to see?';
						break;
									
					case 4:
						echo 'It\'s no fun being horny and alone. CUM and keep me company!';
						break;
									
					case 5:
						echo 'I love getting naked on my cam, especially when lots of people are watching!';
						break;			

			}

		}


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Random Descriptions for single page.
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function random_title( $model, $age  ) {

			$num 	= Rand (1,6);

			switch ($num) {

				// Description 1

					case 1:
					echo '
						' . $model . '\'s Live Cam Show
					';
					break;

				// Description 2	

					case 2:
					echo '
						' . $model . '\'s Live Webcam
					';
					break;

				// Description 3

					case 3:
					echo '
						' . $model . '\'s Live Stream
					';
					break;

				// Description 4

					case 4:
					echo '
						' . $model . '\'s Streaming Webcam
					';
					break;

				// Description 5

					case 5:
					echo '
						' . $model . '\'s Online Webcam Show
					';
					break;

				// Description 6

					case 6:
					echo '
						' . $model . '\'s Live Cam Show
					';
					break;																									

			}
			
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Random Descriptions for single page.
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function random_text( $model, $age, $num_users, $time_online  ) {

			$num 	= Rand (1,6);

			switch ($num) {

				// Description 1

					case 1:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;

				// Description 2	

					case 2:
					echo '
						<p>
							Thanks for checking out <strong>' . $model . '\'s live stream</strong> and chat room! You can enjoy watching ' . $model . ' absolutely FREE! If you would like to chat with this <strong>Smoking HOT ' . $age . ' year old</strong>, or view ' . $model . '\'s private pics and video clips you\'ll have  to <a href="' . LINK_SIGNUP . '">register for a FREE account</a>.

						</p>
					';
					break;

				// Description 3

					case 3:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;

				// Description 4

					case 4:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;

				// Description 5

					case 5:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;

				// Description 6

					case 6:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;																									

			}
			
		}

		

?>