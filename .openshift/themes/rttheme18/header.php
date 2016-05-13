<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />  
<?php if(get_option( RT_THEMESLUG."_close_responsive")):?><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><?php endif;?>
	
<title><?php if (is_home() || is_front_page() ): bloginfo('name'); else: wp_title('');endif; ?></title>
<?php if (get_option( RT_THEMESLUG.'_favicon_url')):?><link rel="icon" type="image/png" href="<?php echo get_option( RT_THEMESLUG.'_favicon_url');?>"><?php endif;?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="favicon.ico">





<?php echo get_option(RT_THEMESLUG.'_space_for_head');?>

<?php wp_head(); ?>
<script src="//cdn.optimizely.com/js/75901653.js"></script>
</head>
<body <?php body_class(); ?>>
<?php do_action("rt_after_body"); ?>

<!-- background wrapper -->
<div id="container">   


	<!-- mobile actions -->
	<section id="mobile_bar" class="clearfix">
		<div class="mobile_menu_control icon-menu"></div>
		<?php if( ! get_option(RT_THEMESLUG.'_hide_top_bar') ):?><div class="top_bar_control icon-cog"></div><?php endif;?>    
	</section>
	<!-- / end section #mobile_bar -->    

	<?php if( ! get_option(RT_THEMESLUG.'_hide_top_bar') ):?>
	<!-- top bar -->
	<section id="top_bar2" class="clearfix">
        <div class="top_bar_container">First time visitor? Then <a href="<?php echo bloginfo('url');?>/academy/"><i>start here</i></a> and learn more about <a href="<?php echo bloginfo('url');?>/academy/"><span>The Remarkable Practice</span></a>
        <div class="search_top_bar">

            <?php if( get_option( RT_THEMESLUG."_show_search_menu" ) ):?>

            <!-- search -->
            <div class="search-bar">
                <form action="<?php echo rt_wpml_get_home_url(); ?>" method="get" class="showtextback" id="menu_search">
                    <fieldset>
                        <input type="text" class="search_text showtextback" name="s" id="menu_search_field" value="<?php _e('What are you looking for ?','rt_theme');?>" />
                        <div class="icon-search-1"></div>
                    </fieldset>
                </form>
            </div>
            <!-- / search-->
            <?php endif;?>
        </div>
        </div>

    </section>
	<section id="top_bar" class="clearfix">
		<div class="top_bar_container">


					<ul id="top_navigation" class="top_links">

						<!--  top links -->
						<?php if ( has_nav_menu( 'rt-theme-top-navigation' ) ): // check if user created a custom menu and assinged to the rt-theme's location ?>
							<?php  
								//call the top menu			 
								$topmenuVars = array(
									'menu_id'         => "", 
									'menu_class'      => "top_links", 
									'container'       => '', 
									'echo'            => true, 
									'depth'		 	  => 1, 
									'theme_location'  => 'rt-theme-top-navigation',
									'items_wrap'      => '%3$s', 
								); 
								
							  	wp_nav_menu($topmenuVars);
						    ?>
					    <?php else:?>
						    <?php    

						    	//call the top menu			 
								$topmenuVars = array(
									'menu'            => 'RT Theme Top Navigation Menu',  
									'menu_id'         => "top_navigation", 
									'menu_class'      => "top_links", 
									'container'       => '', 
									'echo'            => true, 
									'depth'		 	  => 1, 
									'theme_location'  => 'rt-theme-top-navigation',
									'items_wrap'      => '%3$s', 
								); 

							  	wp_nav_menu($topmenuVars);
						    ?>
				  			<!-- / end ul .top_links --> 
			  			<?php endif;?>          


						<?php if(!get_option(RT_THEMESLUG.'_hide_woo_cart') && class_exists( 'Woocommerce' )):?>
							<?php global $woocommerce; ?>
												
							<?php if ( is_user_logged_in() ) { ?>
								<li class="icon-user"><a href="<?php echo get_permalink( rt_wpml_page_id(get_option('woocommerce_myaccount_page_id')) ); ?>" title="<?php _e('My Account','rt_theme'); ?>"><?php _e('My Account','rt_theme'); ?></a></li>
								<li class="icon-logout"><a href="<?php echo wp_logout_url(home_url('/')); ?>" title="<?php _e('Logout','rt_theme'); ?>"><?php _e('Logout','rt_theme'); ?></a></li>
							<?php } else { ?>
								<li class="icon-login"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','rt_theme'); ?>"><?php _e('Login / Register','rt_theme'); ?></a></li>
							<?php } ?>						  			

							<li class="icon-basket"><span><a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'rt_theme'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'rt_theme'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a></span>&nbsp;</li>					
						<?php endif;?>
	 

						<?php if( get_option( RT_THEMESLUG."_show_search_top" ) ):?>
							<li><form action="<?php echo rt_wpml_get_home_url(); ?>/" method="get" class="showtextback" id="top_search_form"><span class="icon-search"></span><span><input type="text" class="search_text showtextback" size="1" name="s" id="top_search_field" value="<?php _e('Search','rt_theme');?>" /></span></form></li>
						<?php endif;?>


						<?php if(get_option(RT_THEMESLUG.'_show_flags') && function_exists('icl_get_languages')):?>
						    <?php rt_wpml_languages_list();?>		  
						<?php endif;?>

						<?php 
							//adds additional links to the top links - format <li><a></a></li>
							do_action("add_top_menu_links");
						?>

					</ul>


					<?php 
					if( get_option(RT_THEMESLUG.'_social_media_top') ){
						echo do_shortcode("[rt_social_media_icons]");
					}   
					?>


		</div><!-- / end div .top_bar_container -->    
	</section><!-- / end section #top_bar -->    
	<?php endif;?>    

	<!-- header -->
	<header id="header"> 

		<!-- header contents -->
		<section id="header_contents" class="clearfix">
				 
				<?php 
					#
					# get logo and header widgets
					# @hooked in /rt-framework/functions/theme_functions.php
					#
					do_action( "rt_header_output" );
				?>

		</section><!-- end section #header_contents -->  	


		<!-- navigation -->   
		<div class="nav_shadow <?php echo get_option( RT_THEMESLUG."_sticky_navigation" )  ? "sticky" : ""; ?>"><div class="nav_border"> 
	  
	 		<?php	 			
	 		$add_menu_class = get_option( RT_THEMESLUG."_show_search_menu" ) ? " with_search" : "";//show search 
	 		$add_menu_class .= apply_filters( "show_subtitles", get_option( RT_THEMESLUG."_show_subtitles" ) ? " with_subs" : "" );
	 		$add_menu_class .= get_option( RT_THEMESLUG."_show_sticky_logo" ) ? " with_small_logo" : "";//small logo
	 	

	 		echo '<nav id="navigation_bar" class="navigation '.$add_menu_class.'">'; //open nav holder

				//action before the navigation
				do_action("rt_before_navigation");

	 			//call the main navigation
		 		if ( has_nav_menu( 'rt-theme-main-navigation' ) ){ // check if user created a custom menu and assinged to the rt-theme's location
 
						$menuVars = array(
							'menu_id'         => "navigation", 
							'echo'            => false,
							'container'       => '', 
							'container_class' => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'container_id'    => 'navigation_bar', 
							'theme_location'  => 'rt-theme-main-navigation',
							'walker' => new RT_Menu_Class_Walker
						);
						
						$main_menu=wp_nav_menu($menuVars);
						echo ($main_menu);
				}else{
						
						$menuVars = array(
							'menu'            => 'RT Theme Main Navigation Menu',  
							'menu_id'         => "navigation", 
							'echo'            => false,
							'container'       => '',  
							'container_class' => '' ,
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'container_id'    => 'navigation_bar',  
							'theme_location'  => 'rt-theme-main-navigation',
							'walker' => new RT_Menu_Class_Walker
						);
						
						$main_menu=wp_nav_menu($menuVars);
						echo ($main_menu); 				
 				}

				//action after the navigation
				do_action("rt_after_navigation");

				//show serch bar on the menu bar
				if( get_option( RT_THEMESLUG."_show_search_menu" ) ):?>

					<!-- search -->
					<!--<div class="search-bar">
						<form action="<?php /*echo rt_wpml_get_home_url(); */?>" method="get" class="showtextback" id="menu_search">
							<fieldset>							
								<input type="text" class="search_text showtextback" name="s" id="menu_search_field" value="<?php /*_e('Search','rt_theme');*/?>" />
								<div class="icon-search-1"></div>					
							</fieldset>
						</form>
					</div>-->
					<!-- / search-->
				<?php endif;?> 

			</nav>
		</div></div>
		<!-- / navigation  --> 

		</header><!-- end tag #header --> 


		<!-- content holder --> 
		<div class="content_holder">

		<?php 
			#
			# get info bar (breadcrumb and page title )	  
			# get templates haeder bar outputs
			# @hooked in /rt-framework/functions/theme_functions.php
			#	
			/* Update For Academy Page - HL*/		
			
			$page_id=get_the_ID();
			
			if($page_id==2469 && !is_search()) { 
				$image='gear_academy.png';
					if(file_exists(TEMPLATEPATH.'/images/'.$image)) {  
						echo '<div class="academy_gear_col">
								<div >
									<p class="acedemy_gear_text"><span class="green_text">Finally: </span>A Step-by-Step System for Achieving the Next Level in </br>
									Your Practice – <span class="un_green_text">Without </span>Sacrificing Your Core Values…</br>
									Introducing “The Remarkable Practice Academy”…</br>
									</p>
									
								</div>

								<style>
									.ic_social_real_ca {
										cursor: default;
									}
								</style>
		
								<div class="bg_mac">
									<section id="row-<?php the_ID(); ?>" class="content_block clearfix " >
									<section class="text_box fadeIn animated" data-rt-animate="animate" data-rt-animation-type="fadeIn" data-rt-animation-group="single" style="-webkit-animation: 0.1s;">
										<div class="row">
									<div class="product_thumb for_intro" >
										<div class="product_thumb_lf">
											<div class="single_image ">
								                <a id="lightbox-testimonial" class="lightbox_ single" data-group="image_testimonial" title="" data-title="" data-description="" data-thumbnail="../wp-content/uploads/2014/10/man-academy.jpg" data-thumbtooltip="" data-scaleup="" data-href="" data-width="" data-height="" data-flashhaspriority="" data-poster="" data-autoplay="" data-audiotitle="" href="https://www.youtube.com/watch?v=7zOrZ3Lu19A">
								                <img src="../wp-content/uploads/2014/10/man-academy.jpg" class="size-full wp-image-2174 " style="width:100%">

								                </a>
								            </div>
										</div>
										<div class="product_thumb_rt_no_pad_forDC dot_dash custom-add-to-cart-area" >
											<div class="div_dash"> 
												<div  style="margin: 15px 40px 0 40px !important; text-align: center">
													<p class="pToday" style="padding-bottom:15px;">Get Started Today <strong>$299</strong></p>
													<a href="https://et151.infusionsoft.com/app/manageCart/addProduct?productId=27&subscriptionPlanId=41" class="button addtocart" value="Add To Cart"  style="padding:7px 30px;">Add To Cart</a>
													<center style="padding-top:25px;"><div class="ic_social"><a href="#" class="ic_social_real_ca" id="ic_mastercard_top" title=""></a> <a href="#" class="ic_social_real_ca" id="ic_visa_top" title=""></a> <a href="#" class="ic_social_real_ca" id="ic_american_ex_top" title=""></a></div></center>
													
												</div>
											</div> 

										</div>
									</div>
									
								
				</section>
			</section></div></div>';  
					};
			}else{
				do_action( 'rt_header_bar_output');					
			}
			/*End Update*/
		?>	

			<div class="content_second_background">
				<div class="content_area clearfix"> 
		

				<?php do_action( 'rt_content_before'); ?>									