<?php
# 
# rt-theme
# post content for standart post types in listing pages
# 
global $rt_list_style, $more, $rt_global_post_values;

//extract global values 
extract( $rt_global_post_values ); 

// Create thumbnail image
$thumbnail_image_output = ! empty( $featured_image_id ) ? get_resized_image_output( array( "image_url" => "", "image_id" => $featured_image_id, "w" => $featured_image_width, "h" => $featured_image_height, "crop" => $crop ) ) : ""; 

// Tiny image thumbnail for lightbox gallery feature
$lightbox_thumbnail = ! empty( $featured_image_id ) ? rt_vt_resize( $featured_image_id, "", 75, 50, true ) : rt_vt_resize( $featured_image_id, "", 75, 50, true ); 
$lightbox_thumbnail = is_array( $lightbox_thumbnail ) ? $lightbox_thumbnail["url"] : "" ; 
?> 

<!-- blog box-->
<article class="blog_list loop" id="post-<?php the_ID(); ?>">

	<?php if( $rt_list_style == "style1" ):?>
	<section class="first_section">     
		<div class="date_box"><span class="day"><?php the_time("d") ?></span><span class="year"><?php the_time("M") ?> <?php the_time("Y") ?></span></div>
	</section> 
	<?php endif;?>


	<section class="article_section <?php if( $rt_list_style != "style1" ):?>with_icon<?php endif;?>">
		
		<div class="blog-head-line clearfix">    

			<div class="post-title-holder">

				<!-- blog headline-->
				<?php if( $rt_list_style == "style2" ):?><h2 class="icon-pencil"><?php else:?><h2><?php endif;?><a href="<?php echo $permalink ?>" rel="bookmark"><?php the_title(); ?></a></h2> 
				<!-- / blog headline--> 
 
				<?php do_action( "post_meta_bar" )?>

			</div><!-- / end div  .post-title-holder -->
			
		</div><!-- / end div  .blog-head-line -->  


		<?php if( ! empty( $thumbnail_image_output )  ):?>
			<div class="imgeffect align<?php echo $featured_image_position;?>"> 
					<?php 
						//create lightbox link
						do_action("create_lightbox_link",
							array(
								'class'          => 'icon-zoom-in lightbox_',
								'href'           => $featured_image_url,
								'title'          => __('Enlarge Image','rt_theme'),
								'data_group'     => 'image_'.$featured_image_id,
								'data_title'     => $title,													
								'data_thumbnail' => $lightbox_thumbnail,
							)
						);
					?> 

					<a href="<?php echo $permalink;?>" class="icon-link" title="<?php echo $title; ?>" rel="bookmark" ></a>	

					<?php echo $thumbnail_image_output; ?>

			</div>
		<?php endif;?>


		<?php 	

			if( get_option(RT_THEMESLUG."_use_excerpts") ){
                                if ( ! function_exists( 'wpse_allowedtags' ) ) {
                        function wpse_allowedtags() {
    // Add custom tags to this string
                                return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>';
                         }
                        }
                    }



			if( get_option(RT_THEMESLUG."_use_excerpts") ){

			/*Update HTML Tags For Blog Headline - HL*/	
				if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 

				    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
				    global $post;
				    $raw_excerpt = $wpse_excerpt;
				        if ( '' == $wpse_excerpt ) {

				            $wpse_excerpt = get_the_content('');
				            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
				            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
				            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
				            $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

				            //Set the excerpt word count and only break after sentence is complete.
				                $excerpt_word_count = 75;
				                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
				                $tokens = array();
				                $excerptOutput = '';
				                $count = 0;

				                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
				                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

				                foreach ($tokens[0] as $token) { 

				                    if ($count >= $excerpt_word_count && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) { 
				                    // Limit reached, continue until , ; ? . or ! occur at the end
				                        $excerptOutput .= trim($token);
				                        break;
				                    }

				                    // Add words to complete sentence
				                    $count++;

				                    // Append what's left of the token
				                    $excerptOutput .= $token;
				                }

				            $wpse_excerpt = trim(force_balance_tags($excerptOutput));

				                $excerpt_end = '&nbsp;&nbsp;&nbsp;<a class="readmore" href="'. esc_url( get_permalink() ) . '">' .  'Read more ...'. '</a>';
				                $excerpt_more = apply_filters('excerpt_more', 'Read More' . $excerpt_end); 

				                //$pos = strrpos($wpse_excerpt, '</');
				                //if ($pos !== false)
				                // Inside last HTML tag
				                //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
				                //else
				                // After the content
				                $wpse_excerpt .= $excerpt_end; /*Add read more in new paragraph */

				            return $wpse_excerpt;   

				        }
				        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
				    }

				endif; 

				remove_filter('get_the_excerpt', 'wp_trim_excerpt');
				add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 				

				/*End Update*/

				the_excerpt();
			}else{
				the_content( __( 'Continue reading', 'rt_theme' ) );
				wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'rt_theme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			}
		?>

	</section> 

</article> 
<!-- / blog box-->