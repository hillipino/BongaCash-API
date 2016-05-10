<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Header
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_header($cmd, $title, $des, $kws) {
			
			$link = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
			
			echo '
				
				<!DOCTYPE html>
				
				<html lang="en">
				
					<head>
					
						<title>' . $title . '</title>
						<meta charset="utf-8" />
						<meta name="viewport" content="width=device-width, initial-scale=1" />
						<meta name="description" content="' . $des . '" />
						<meta name="keywords" content="' . $kws . '" /> 

						<link rel="stylesheet" href="' . BASEHREF . 'assets/css/main.css" />

						<!--[if lte IE 8]>
							<script src="' . BASEHREF . 'assets/js/ie/html5shiv.js"></script>
							<link rel="stylesheet" href="' . BASEHREF . 'assets/css/ie8.css" />
						<![endif]-->

						<!--[if lte IE 9]><link rel="stylesheet" href="' . BASEHREF . 'assets/css/ie9.css" /><![endif]-->							

					</head>

			';
				
			flush();
				
			echo '

					<body id="top">

						<!-- Header -->
							<header id="header">
								<h1><a href="' . BASEHREF . '">' . SITENAME . '</a></h1>				
								<a href="#menu">Menu</a>
							</header>

						<!-- Nav -->
							<nav id="menu">
								<ul class="links">
									<li><a href="' . BASEHREF . '">All Cams</a></li>					
									<li><a href="' . BASEHREF . 'cams/female" class="' . ( ($link == "female") ? "active"   : "") . '">Female Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/male" class="' . ( ($link == "male") ? "active"   : "") . '">Male Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/couple" class="' . ( ($link == "couple") ? "active"   : "") . '">Couple Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/lesbian" class="' . ( ($link == "lesbian") ? "active"   : "") . '">Lesbian Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/tranny" class="' . ( ($link == "tranny") ? "active"   : "") . '">Tranny Cams</a></li>
									<li><a href="' . LINK_BROADCAST . '" class="external">Broadcast Your Cam!</a></li>
								</ul>
								<ul class="actions vertical">
									<li><a href="' . LINK_SIGNUP . '" class="button special fit external">Free Account</a></li>
									<li><a href="http://adultfriendfinder.com/go/g10296-ppc?page_id=685" class="button fit external">Get Laid!</a></li>
									<li><a href="' . LINK_AFF . '" class="button fit external">Affiliate Program</a></li>
									
								</ul>
							</nav>					

			';
		
		}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Footer
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_footer() {
		
			echo '
			
						
							</div>

						<!-- Footer -->
							<footer id="footer">
								<div class="container">
									<div class="row double">
										<div class="6u 12u$(medium)">
											<h2>Responsive Chaturbate API Demo</h2>
											<p>Ornare interdum nascetur enim lobortis nunc amet placerat pellentesque nascetur in adipiscing. Interdum amet accumsan placerat commodo ut amet aliquam blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id lorem ipsum dolor.</p>
										</div>
										<div class="3u 6u(medium) 12u$(small)">
											<h3>What\'s Hot</h3>
											<ul class="alt">
												<li><a href="' . BASEHREF . 'cams/female">Female Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/couple">Couple Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/lesbian">Lesbian Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/male">Male Cams</a></li>
											</ul>
										</div>
										<div class="3u$ 6u$(medium) 12u$(small)">
											<h3>More Cool Stuff</h3>
											<ul class="alt">
												<li><a href="http://adultfriendfinder.com/go/g10296-ppc?page_id=685" class="external">Sex With Strangers!</a></li>
												<li><a href="https://bongacash.com/ref?c=226357" class="external">Earn up to $3 per free signup!</a></li>
												<li><a href="http://babes.hillipino.com" class="external">Desktop Strippers</a></li>
												<li><a href="https://github.com/hillipino" class="external">Get this Script</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="copyright">
									&copy; ' . SITENAME . '. All rights reserved. <a href="' . BASEHREF . 'privacy">Privacy</a> | <a href="' . BASEHREF . '2257">2257</a>
								</div>
							</footer>
					';

					if ( GOOGLE != '' ) {

						echo '

						<!-- Google Analytics -->

							<script>
							  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
							  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
							  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
							  })(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');

							  ga(\'create\', \'' . GOOGLE . '\', \'auto\');
							  ga(\'send\', \'pageview\');

							</script>
						';
						
					}

					echo '

					<!-- Scripts -->

						<script src="' . BASEHREF . 'assets/js/jquery.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/skel.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/util.js"></script>
						<!--[if lte IE 8]><script src="' . BASEHREF . 'assets/js/ie/respond.min.js"></script><![endif]-->
						<script src="' . BASEHREF . 'assets/js/main.js"></script>				

				</body>
				
			</html>
			
			';
		
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Homepage
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	
		function tpl_home() {

			get_banner();

			echo '
				<!-- Main -->
					<div id="main">';	
				
			get_cams ( $gender='', 24 );
					
		}
		
		function tpl_404() {

			echo '
				<!-- Main -->
					<div id="main">';				
				
			get_cams ( $gender='', 24 );
					
		}	
		
		function tpl_cams() {	

			echo '
				<!-- Main -->
					<div id="main">';				
		
			$gender = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
		
			switch ( $gender ) {
				
				case 'female':
					$gender = 'Female';
					break;
				case 'male':
					$gender = 'Males';
					break;
				case 'couple':
					$gender = 'Couple Female + Male';
					break;
				case 'lesbian':
					$gender = 'Couple Female + Female';
					break;
				case 'gay':
					$gender = 'Couple Male + Male';
					break;		
				case 'tranny':
					$gender = 'Trans';
					break;					
				default:
					$gender = '';

			}
			
			get_cams ( $gender, 24 );
			
		}
		
		function tpl_view_cams() {

			echo '<div id="content">';				

			$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
		
			solo_cams( $arg1 );	
		
		}

		function tpl_2257() {

			echo '
				<!-- Main -->
					<div id="content">

						<div class="container">

							<h2>18 U.S.C. § 2257 Statement</h2>


						</div>


			';
					
		}

		function tpl_privacy() {

			echo '
				<!-- Main -->
					<div id="content">

						<div class="container">
							
							<h2>Privacy Policy</h2>

						</div>


			';
					
		}
			

?>