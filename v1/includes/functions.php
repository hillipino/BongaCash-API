<?php
																
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Display Functions No Need to Edit any of this unless you really want to.
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		// Check for cron , if set to false process the xml script

			if ( !USECRON )
				get_xml();

		// Get The feed and save it to your server

			function get_xml() {

				$filename 	= FLATFILE;
				$url 		= XML_FILE;
				$data 		= file_get_contents( $url );

				if( !empty( $data ) ) {

					file_put_contents( $filename, $data );

				} else {

					echo "Did not get a file back<br />\n";

				}

			}

			function get_banner() {

				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
				$count 	= 0;
				
				foreach( $cams as $cam ){ 

					if ( $count == 0 ) {

						echo '
							<section id="banner" style="background-image: url(' .  $cam->profile_images->profile_image . ')">
								<div class="content">
									<h2>'; 

								random_banner_title( $cam->display_name ); 

								echo '
									</h2>
									<p>
								'; 

								random_banner_text( );

								echo '
									</p>
									<ul class="actions">
										<li><a href="' . BASEHREF . 'cam/' . $cam->username . '" class="button special">Watch My Live Cam</a></li>
									</ul>
								</div>
							</section>
						';	
					}			

					$count++;

				}
				

			}
			

		// Process the XML Request 
		
			function get_cams( $gender, $limit ){
			
				$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
				$arg2 = array_key_exists('arg2', $_GET) ? $_GET['arg2'] : null;

				if ( $arg1 ) {
					
					if ( is_numeric( $arg1 ) ) {
					
						$page = $arg1;
						$targetpage = 'cams/';
						
					} else {
					
						$targetpage = 'cams/' . $arg1 . '/';
					
						if ( $arg2  ) {

							if ( is_numeric( $arg2 ) ) {

								$page = $arg2;
								
							} 
							
						} else {
						
							$page = 1;
						
						}
						
					} 
					
				} else {
					
					$targetpage = 'cams/';
					$page = 1;
				
				}
				
				$end 	= $page * $limit;
				$start	= $end - $limit;
				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
				
				// Count the total cams
				
				if ( $gender != '' ) {
				
					$doc = new DOMDocument();
					$doc->load(FLATFILE);
					$totalCams = 0;

					if ( $gender == 'hd' ) {

						foreach( $doc->getElementsByTagName('is_hd') as $is_hd )  {

							if( $is_hd->nodeValue == 'True' )
								$totalCams++;

						}

					} elseif ( $gender == 'new' ) {
						
						foreach( $doc->getElementsByTagName('is_new') as $is_new )  {

							if( $is_new->nodeValue == 'True' )
								$totalCams++;

						}

					} else {

						foreach( $doc->getElementsByTagName('gender') as $tag ) {
							// to iterate the children
							foreach( $tag->childNodes as $child ) {
								// outputs the xml of the child nodes. Of course, there are any number of
								// things that you could do instead!
								$i = $doc->saveXML($child);
								
								if ($i == $gender )
									$totalCams++;
							}
						}

					}


					
				} else {
				
					$totalCams = count($cams);
					
				}
				
				
				echo '<div class="row uniform 0%">';
				
				$count = 0;
				
				foreach( $cams as $cam ){ 

					if ( $gender == $cam->gender ) {
						cam_rows( $cam, $count, $start, $end );
						$count++;
					} 										
					
					elseif ( $gender == '' ) {
						cam_rows( $cam, $count, $start, $end );
						$count++;
					}
					
					
				}
				
				echo '</div>';
				
				if ( PAGINATE )
					paginate($page, $totalCams, $limit, $targetpage);
					
			}
			
		// Get Related Cams

			function get_related( $gender, $limit ){
				
				$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
				$arg2 = array_key_exists('arg2', $_GET) ? $_GET['arg2'] : null;
				
				if ( $arg1 ) {
					
					if ( is_numeric( $arg1 ) ) {
					
						$page = $arg1;
						$targetpage = 'cams/';
						
					} else {
					
						$targetpage = 'cams/' . $arg1 . '/';
					
						if ( $arg2  ) {

							if ( is_numeric( $arg2 ) ) {

								$page = $arg2;
								
							} 
							
						} else {
						
							$page = 1;
						
						}
						
					} 
					
				} else {
					
					$targetpage = 'cams/';
					$page = 1;
				
				}
				
				$end 	= $page * $limit;
				$start	= $end - $limit;				
				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
				
				// Count the total cams
				
				if ( $gender != '' ) {
				
					$doc = new DOMDocument();
					$doc->load($xml);
					$totalCams = 0;
					foreach( $doc->getElementsByTagName('gender') as $tag ) 
					{
						// to iterate the children
						foreach( $tag->childNodes as $child ) 
						{
							// outputs the xml of the child nodes. Of course, there are any number of
							// things that you could do instead!
							$i = $doc->saveXML($child);
							
							if ($i == $gender )
								$totalCams++;
						}
					}

					
				} else {
				
					$totalCams = count($cams);
					
				}

				echo '<div class="row uniform 0%">';
				
				$count = 0;
				
				foreach( $cams as $cam ){ 

					if ( $cam->gender == $gender ) {

						if ( $count >= $start && $count < $end ) {

							print_cams($cam);
							
						}


						$count++;
						
					} 
					
					if ( $gender == '' ) {

						if ( $count >= $start && $count < $end ) {
								print_cams($cam);
						}
						
						$count++;
								
					}
					
					
				}
				
				echo '</div>';
				
			}		
			
			
		// Print each individual cam
		
			function print_cams($cam) {

				switch ( $cam->gender) {
					
					case 'Female':
						$gender = 'female';
						break;
					case 'Male':
						$gender = 'male';
						break;
					case 'Couple Female + Male':
						$gender = 'couple';
						break;
					case 'Couple Female + Female':
						$gender = 'lesbian';
						break;
					case 'Couple Male + Memale':
						$gender = 'gay';
						break;											
					case 'Trans':
						$gender = 'tranny';
						break;

					default:
						$gender = '';
				}			
				
				echo '
						
					<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">

						<div class="thumbnail">
							<div class="image fit"><img src="' . $cam->profile_images->thumbnail_image_big_live . '" alt="Watch ' . $cam->display_name . ' Streaming Live" /></div>
							<div class="overlay slide' . SLIDE_DIR . '">
								<div class="content">
									<h3>' . limit_chars( $cam->display_name, 20 ) . '</h3>
									<ul class="actions">
										<li><span class="fa fa-eye"></span> ' . $cam->members_count . '</li>
										<li><span class="fa fa-clock-o"></span> ' .  ago( $cam->online_time ) . '</li>
									</ul>
									<a href="' . BASEHREF . 'cam/' . $cam->username . '" class="button special">Watch Live Stream</a>
								</div>
							</div>
						</div>	

					</div>					
							
				';	
				
			}			
		
		// Print Solo Cams
		
			function solo_cams( $user ) {

				$arg1 	= array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;				
				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
				
				foreach( $cams as $cam ){ 
				
					switch ( $cam->gender) {
						
						case 'Female':
							$gender = 'female';
							break;
						case 'Male':
							$gender = 'male';
							break;
						case 'Couple Female + Male':
							$gender = 'couple';
							break;
						case 'Couple Female + Female':
							$gender = 'lesbian';
							break;
						case 'Couple Male + Memale':
							$gender = 'gay';
							break;											
						case 'Trans':
							$gender = 'Tranny';
							break;

						default:
							$gender = '';
					}				


					if ( $cam->username == $user ) {
					
						echo '		
							<div class="container">
								<div class="row 200% uniform">
									<div class="12u">						
										<section class="cb_video video-wrapper">
							
											<iframe src="' . $cam->embed_chat_url . '"></iframe>';
						
											$time_online = ago( $cam->online_time );
											
											echo '
						
										</section>
									</div>
									<div class="6u 12u(medium)">
										<header>

											<h2>';

											 
											 random_title( $arg1, $cam->display_age );

											 echo '
											 	</h2>


										</header>
										';

										random_text($arg1, $cam->display_age, $cam->members_count, $time_online  );

										echo '
									</div>
									<div class="6u 12u(medium)">
										<ul class="alt">		
											<li>' . $cam->display_age . ' ' . $gender . '</li>
											<li>' . $cam->ethnicity . '</li>
											<li>' . $cam->height . '</li>
											<li>' . $cam->weight . '</li>
											<li><i class="fa fa-clock-o"></i>&nbsp; ' . $time_online . '</li>
											<li><i class="fa fa-eye"></i>&nbsp; ' . $cam->members_count . '</li>
										</ul>

										<a href="' . LINK_SIGNUP . '" target="_blank" class="button special">Register to tip ' . $arg1 . '</a>

									</div>
								</div>
							</div>
						</div>		
							
						';					
						
					} 			
	
				}
				
				if ( RELATED_SHOW ) {
				
					echo '
					<div id="related">
						<section>
							<header>
								<h2>More Live Cams</h2>
							</header>
					';
	
					get_related( '', RELATED_CNT );
					
					echo '</section>';
				}					

			}	
			
		// Human Readable Time

			function ago( $secs ) {
			
				$second 	= 1;
				$minute 	= 60;
				$hour 		= 60*60;
				$day 		= 60*60*24;
				$week 		= 60*60*24*7;
				$month 		= 60*60*24*7*30;
				$year 		= 60*60*24*7*30*365;
				 
				if ( $secs <= 0 ) { $output = "now";
				} elseif ( $secs > $second && $secs < $minute ) { $output = round( $secs/$second )." second";
				} elseif ( $secs >= $minute && $secs < $hour ) { $output = round( $secs/$minute )." minute";
				} elseif ( $secs >= $hour && $secs < $day ) { $output = round( $secs/$hour )." hour";
				} elseif ( $secs >= $day && $secs < $week ) { $output = round( $secs/$day )." day";
				} elseif ( $secs >= $week && $secs < $month ) { $output = round( $secs/$week )." week";
				} elseif ( $secs >= $month && $secs < $year ) { $output = round( $secs/$month )." month";
				} elseif ( $secs >= $year && $secs < $year*10 ) { $output = round( $secs/$year )." year";
				} else { $output = " more than a decade ago"; }
				 
				if ( $output <> "now" ) {
					$output = ( substr( $output,0,2 )<>"1 " ) ? $output."s" : $output;
				}
				return $output;
				
			}	
		
		
		// Function to Limit characters of string.

			function limit_chars( $string, $word_limit ) {
			 
				$string			= preg_replace( "/&#?[a-z0-9]{2,8};/i", "", strip_tags( $string ) );
				$words 			= explode( ' ', $string );
				$new_string 	= substr( $string, 0, $word_limit );
				
				return $new_string;
			 
			}

		// Paginate
		
			function paginate( $page, $total_pages, $limit, $targetpage ) { 
			
				// How many adjacent pages should be shown on each side?
				$adjacents = 3;
			
				// Setup page vars for display. 
				if ($page == 0) $page = 1;								//if no page var is given, default to 1.
				$prev = $page - 1;										//previous page is page - 1
				$next = $page + 1;										//next page is page + 1
				$lastpage = ceil($total_pages/$limit);					//lastpage is = total pages / items per page, rounded up.
				$lpm1 = $lastpage - 1;									//last page minus 1
				
				$targetpage = BASEHREF . $targetpage;
				
				// Now we apply our rules and draw the pagination object. We're actually saving the code to a variable in case we want to draw it more than once.
				$pagination = "";
				if ($lastpage > 1)
				{	
					$pagination .= '<div class="cb_pager">';
					//previous button
					if ($page > 1) 
						$pagination.= '<a href="' . $targetpage . $prev . '" class="prev button">previous</a>';
					else
						$pagination.= '<span class="disabled button">previous</span>';	
					
					//pages	
					if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
					{	
						for ($counter = 1; $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= '<span class="current button">' . $counter . '</span>';
							else
								$pagination.= '<a href="' . $targetpage . $counter . '" class="button">' . $counter . '</a>';					
						}
					}
					elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
					{
						//close to beginning; only hide later pages
						if($page < 1 + ($adjacents * 2))		
						{
							for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
							{
								if ($counter == $page)
									$pagination.= '<span class="current button">' . $counter . '</span>';
								else
									$pagination.= '<a href="' . $targetpage . $counter . '" class="button">' . $counter . '</a>';					
							}
							$pagination.= '...';
							$pagination.= '<a href="' . $targetpage . $lpm1 . '" class="button">' . $lpm1 . '</a>';
							$pagination.= '<a href="' . $targetpage . $lastpage . '" class="button">' . $lastpage . '</a>';		
						}
						//in middle; hide some front and some back
						elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
						{
							$pagination.= '<a href="' . $targetpage . '/1" class="button">1</a>';
							$pagination.= '<a href="' . $targetpage . '/2" class="button">2</a>';
							$pagination.= '...';
							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
							{
								if ($counter == $page)
									$pagination.= '<span class="current button">' . $counter . '</span>';
								else
									$pagination.= '<a href="' . $targetpage . $counter . '" class="button">' . $counter . '</a>';					
							}
							$pagination.= '...';
							$pagination.= '<a href="' . $targetpage . $lpm1 . '" class="button">' . $lpm1 . '</a>';
							$pagination.= '<a href="' . $targetpage . $lastpage . '" class="button">' . $lastpage . '</a>';		
						}
						//close to end; only hide early pages
						else
						{
							$pagination.= '<a href="' . $targetpage . '/1" class="button">1</a>';
							$pagination.= '<a href="' . $targetpage . '/2" class="button">2</a>';
							$pagination.= '...';
							for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
							{
								if ($counter == $page)
									$pagination.= '<span class="current button">' . $counter . '</span>';
								else
									$pagination.= '<a href="' . $targetpage . $counter . '" class="button">' . $counter . '</a>';					
							}
						}
					}
				
					//next button
					if ($page <= $counter -1 ) 
						$pagination.= '<a href="' . $targetpage . $next . '" class="next button">next</a>';
					else
						$pagination.= '<span class="disabled button">next</span>';
					$pagination.= '</div>';		
				}
				
				echo $pagination;
				
			}	

			function cam_rows( $cam, $count, $start, $end ) {

				if ( PAGINATE ) {

							if ( $count >= $start && $count < $end ) {

								if ( $count == AD_POS1 && AD_POS1 != null || $count == AD_POS2 && AD_POS2 != null || $count == AD_POS3 && AD_POS3 != null || $count == AD_POS4 && AD_POS4 != null )
								{
								
									if ( $count == AD_POS1 ) 
										echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE1 . '</div>';
									if ( $count == AD_POS2 ) 
										echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE2 . '</div>';
									if ( $count == AD_POS3 ) 
										echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE3 . '</div>';							
									if ( $count == AD_POS4 ) 
										echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE4 . '</div>';					
									
								} else {
								
									print_cams($cam);
								
								}
							
							}
						
				} else {

							if ( $count == AD_POS1 && AD_POS1 != null || $count == AD_POS2 && AD_POS2 != null || $count == AD_POS3 && AD_POS3 != null || $count == AD_POS4 && AD_POS4 != null )
							{
							
								if ( $count == AD_POS1 ) 
									echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE1 . '</div>';
								if ( $count == AD_POS2 ) 
									echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE2 . '</div>';
								if ( $count == AD_POS3 ) 
									echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE3 . '</div>';							
								if ( $count == AD_POS4 ) 
									echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE4 . '</div>';					
									
							} else {
								
								print_cams($cam);
								
							}

				}

			}		
	
	
?>