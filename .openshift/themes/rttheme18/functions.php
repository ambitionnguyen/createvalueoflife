<?php
#-----------------------------------------
#	RT-Theme functions.php
#	version: 1.0
#-----------------------------------------
# start user session

if(strlen(session_id()) < 1) {
	session_start(); 
} 

# Check WP Version
function rt_check_WP_version(){
global $wp_version, $load_msg;
	if (version_compare($wp_version,"3.8","<"))
	{
		$load_msg = '<div id="notice" class="error"><p><strong><h3>WORDPRESS VERSION ERROR!</h3>This theme requires WordPress Version 3.8 or higher to run. Please upgrade your WordPress version!</strong> <br /><br />>> <a href="http://codex.wordpress.org/Upgrading_WordPress">How can I upgrade my WordPress version?</a><br /><br /></div>';
	}else{
		$load_msg = ""; 
	}
	
	return $load_msg;
}
 

# Check PHP Version
if (version_compare(PHP_VERSION, '5.2.4', '<')) {
global $load_msg;

	$PHP_version_error = '<div id="notice" class="error"><p><strong><h3>THEME ERROR!</h3>This theme requires PHP Version 5.2.4 or higher to run. Please upgrade your php version!</strong> <br />You can contact your hosting provider to upgrade PHP version of your website.</p> </div>';
	if(is_admin()){	
		add_action('admin_notices','errorfunction');
	}else{
		echo $PHP_version_error;
		die;
	}
	
	function errorfunction(){
		global $PHP_version_error;
		echo $PHP_version_error;
	}
	
	return $load_msg;
}

# Define Content Width
if ( ! isset( $content_width ) ){
	$content_width = 1060;	
} 

# Load the theme
if(rt_check_WP_version()){
	if(is_admin()){
		add_action( 'admin_notices', $c = create_function( '', 'echo "' . addcslashes( $load_msg, '"' ) . '";' ) );
	}
	else{
		exit($load_msg);
	} 
}else{
	require_once ( get_template_directory() . '/rt-framework/classes/loading.php' );
	$rttheme = new RTTheme();

	/*
	* 	 DO NOT CHANGE slug => "" !!! 
	*/
	$rttheme->start(array('theme' => 'RT-THEME 18','slug' => 'rttheme18','version' => '1.0'));
}

add_action('wp_head', 'mag_open_graph');

function mag_open_graph()
	{
		$open_graph = '';
		$open_graph .= '<meta property="og:locale" content="en_US" />'."\n";
		$open_graph .= '<meta property="og:type" content="website" />'."\n";
		$open_graph .= '<meta property="og:title" content="'.get_the_title().'" />'."\n";
		$open_graph .= '<meta property="og:description" content="'.get_the_excerpt().'" />'."\n";
		$open_graph .= '<meta property="og:url" content="'.get_permalink().'" />'."\n";
		$open_graph .= '<meta property="og:site_name" content="'.get_bloginfo('name').'" />'."\n";
		$post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
		$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
		$open_graph .= '<meta property="og:image" content="'.$post_thumbnail_url.'" />';
		
		echo $open_graph;
	}

?>