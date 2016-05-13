<?php do_action( 'rt_content_after'); ?>			
	
				</div><!-- / end div .content_area -->  

				<?php 
					#
					# footer output
					# get templates footer content outputs
					# @hooked in /rt-framework/functions/theme_functions.php
					#				
					do_action( 'rt_footer_output');					
				?>


	        </div><!-- / end div .content_second_background -->  
	    </div><!-- / end div .content_holder -->  
	</div><!-- end div #container --> 

    <!-- footer -->
    <footer id="footer">
     
        <!-- footer info -->
        <section class="footer_info">
            <div class="footer-content row clearfix">
                <div class="box footer-content-left">
                    <section class="text_box" data-rt-animate="animate" data-rt-animation-type="fadeIn" data-rt-animation-group="single">
                        <div class="single_image " style="text-align:center;">
                            <!-- <a id="lightbox-123" class="lightbox_ single" data-group="image123" title="" data-title="" data-description="" data-thumbnail="<?=RT_THEMEURI . '/images/footer_thumb_video.png'?>" data-thumbTooltip="" data-scaleUp="" data-href="" data-width="" data-height="" data-flashHasPriority="" data-poster="" data-autoplay="" data-audiotitle="" href="http://www.youtube.com/watch?v=QMvwA5EXHQM"> -->
                            <!-- <img src="<?=RT_THEMEURI . '/images/footer_thumb_video.png'?>" class="size-full wp-image-2174"/> -->
                            <img src="<?php echo bloginfo("url")?>/wp-content/uploads/2014/08/DocBlackShirt.png" class="size-full wp-image-2174" style="height:300px;display:inline"/>
                            <!-- </a> -->
                        </div>

                    </section>
                </div>
                <div class="box footer-content-right" style="padding-top:30px;">
                    <section class="text_box" data-rt-animate="animate" data-rt-animation-type="fadeIn" data-rt-animation-group="single">
                        <img src="<?=RT_THEMEURI . '/images/footer_logo.png'?>"/>
                        <div>Enter your email address below for FREE Instant Access to all  <br/>
                            33 Critically Important Questions For Every NP...
                        </div>
                        <div class="signup">
                            <form accept-charset="UTF-8" action="https://et151.infusionsoft.com/app/form/process/51df86135875f4a14e8da8f996b1fd69" class="infusion-form rt_form" method="POST" _lpchecked="1">
                              <input name="inf_form_xid" type="hidden" value="51df86135875f4a14e8da8f996b1fd69" />
                              <input name="inf_form_name" type="hidden" value="TRP Home Page Optin_33Qs" />
                              <input name="infusionsoft_version" type="hidden" value="1.32.0.68" />
                              <input class="infusion-field-input-container signup_email" id="inf_field_Email" name="inf_field_Email" type="text" placeholder="Your Best Email Here" />
                              <input type="submit" value="Get Access Now !" class="button btn-signup">
                          </form>
                        </div>
                     </section>
                </div>
            </div>
            <div class="footer-menu clearfix">
                <!-- left side -->
                <div class="part1">

                        <!-- footer nav -->
                        <?php if ( has_nav_menu( 'rt-theme-footer-navigation' ) ): // check if user created a custom menu and assinged to the rt-theme's location ?>
                            <?php
                                //call the footer menu
                                $footermenuVars = array(
                                   'depth'		 => 1,
                                   'menu_id'         => 'footer_links',
                                   'menu_class'      => 'footer_links',
                                   'echo'            => false,
                                   'container'       => '',
                                   'container_class' => '',
                                   'container_id'    => '',
                                   'theme_location'  => 'rt-theme-footer-navigation'
                                );

                                $footer_menu=wp_nav_menu($footermenuVars);
                                echo $footer_menu;
                            ?>
                        <?php else:?>
                            <?php
                                //call the footer menu
                                $footermenuVars = array(
                                   'menu'            => 'RT Theme Footer Navigation Menu',
                                   'depth'		 	 => 1,
                                   'menu_id'         => 'footer_links',
                                   'menu_class'      => 'footer_links',
                                   'echo'            => false,
                                   'container'       => '',
                                   'container_class' => '',
                                   'container_id'    => '',
                                   'theme_location'  => 'rt-theme-footer-navigation'
                                );

                                $footer_menu=wp_nav_menu($footermenuVars);
                                echo $footer_menu;
                            ?>
                            <!-- / end ul .footer_links -->
                        <?php endif;?>

                        <!-- copyright text -->
                        <div class="copyright"><?php echo do_shortcode(rt_wpml_t(RT_THEMESLUG, 'Footer Copyright Text', get_option(RT_THEMESLUG.'_footer_copy')));?>
                        </div><!-- / end div .copyright -->

                </div><!-- / end div .part1 -->

                <!-- social media icons -->
                <?php
                //social media icons
                if(get_option(RT_THEMESLUG.'_social_media_bottom')){
                    echo do_shortcode("[rt_social_media_icons]");
                }
                ?><!-- / end ul .social_media_icons -->
            </div>
        </section><!-- / end div .footer_info -->
            
    </footer>
    <!-- / footer -->


<?php echo get_option( RT_THEMESLUG.'_google_analytics');?> 
<?php echo get_option(RT_THEMESLUG.'_space_for_footer');?>
<?php wp_footer(); ?>
</body>
</html>