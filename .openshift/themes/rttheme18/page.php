<?php
/**
 * 
 * The template for displaying all pages
 *
 */
global $rt_sidebar_location;
get_header(); ?>

<!-- For page About Us -->
<?php $page_id=get_the_ID();

				if(is_page() && $page_id==862) { 
					$image='Stephen-Franson-dc.png';
					if(file_exists(TEMPLATEPATH.'/images/'.$image)) {  
						echo '<div style="line-height: 0%;"><img src="'.get_bloginfo('template_url').'/images/'.$image.'" style="width: 100%; " /></div>';  
					};
				}			
				
?>
<?php 
	$page_id=get_the_ID();
	if($page_id==862) { 
		echo '<section class="content_block_background" style="background-color: rgb(236,236,236); ">';
	}else if ($page_id==2469) {
		echo '<section class="content_block_background" style="background-color: white; ">';		
	}else{
		echo '<section class="content_block_background">';	
	}
?>
<!-- End page About Us -->

	<section id="row-<?php the_ID(); ?>" class="content_block clearfix">
		<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> >		
			<div class="row">							

				<?php do_action( "get_info_bar", apply_filters( 'get_info_bar_pages', array( "called_for" => "inside_content" ) ) ); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php if(comments_open() && get_option(RT_THEMESLUG."_allow_page_comments")):?>
					<div class='entry commententry'>
						<?php comments_template(); ?>
					</div>
				<?php endif;?>
			</div>
		</section><!-- / end section .content -->  
		<?php get_sidebar(); ?>
	</section>



</section>

<!-- For page About Us -->
<?php 	
	$page_id=get_the_ID();
	if($page_id==862) { 
		$id=2341; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section id="row-'.$id.'" class="content_block clearfix paraAfter bg_cl_white">
				<section id="post-'.$id.'" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
			</section>
		</section>';
	}
?>
<!-- End page About Us -->

<!-- For page Academy -->
<!-- Section 2 -->
<?php 	
	$page_id=get_the_ID();
	if($page_id==2469) { 
		$id=2577; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_gray" >
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>
		<style>
			#footer .footer-content-right div {display:none}
		</style>
		';
	}
?>
<!-- End Section 2 -->

<!-- Section 3 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2577) { 

		$id=2594; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_white">
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 3 -->

<!-- Section 4 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2594) { 

		$id=2599; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_gray" >
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 4 -->

<!-- Section 5 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2599) { 

		$id=2601; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_white">
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 5 -->

<!-- Element 1 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2601) { 	
		$id=2730; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background" style="background-color: #d7f6c2">
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';	
	}
?>
<!-- End Element 1 -->



<!-- Section 6 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2730) { 

		$id=2603; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_gray" >
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 6 -->

<!-- Section 7 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2603) { 

		$id=2605; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_white" >
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 7 -->

<!-- Section 8 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2605) { 

		$id=2609; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_gray" >
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 8 -->

<!-- Section 9 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2609) { 

		$id=2611; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_white" >
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 9 -->

<!-- Element 1 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2611) { 	
		$id=2730; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background" style="background-color: #d7f6c2">
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';	
	}
?>
<!-- End Element 1 -->

<!-- Section 10 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2730) { 

		$id=2778; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_white" >
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 10 -->

<!-- Element 1 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2778) { 

		$id=2730; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background" style="background-color: #d7f6c2">
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';	
	}
?>
<!-- End Element 1 -->


<!-- Section 11 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2730) { 

		$id=2793; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background bg_cl_white" >
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';
	}
?>
<!-- End Section 11 -->

<!-- Element 1 -->
<?php 	
	$page_id=get_the_ID();	
	if($page_id==2793) { 

		$id=2730; 
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 

		echo '<section class="content_block_background" style="background-color: #d7f6c2">
				<section id="row-<?php the_ID(); ?>" class="content_block clearfix" >
				<section id="post-<?php the_ID(); ?>" <?php post_class("content ".$rt_sidebar_location[0]); ?> 
					<div class="row">'.$content.'													
				</div>
				</section>
			</section>
		</section>';	
	}
?>
<!-- End Element 1 -->

<!-- End page Academy -->


<?php get_footer(); ?>