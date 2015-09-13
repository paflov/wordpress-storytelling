<?php
/*
  Template Name: Search Stories
 */
?>


<?php /*
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( 
// get_post_meta($post->ID,'et_ptemplate_settings',true) );
get_metadata('story', $post->ID,'et_ptemplate_settings',true) );

$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;

$et_ptemplate_blogstyle = isset( $et_ptemplate_settings['et_ptemplate_blogstyle'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_blogstyle'] : false;

$et_ptemplate_showthumb = isset( $et_ptemplate_settings['et_ptemplate_showthumb'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_showthumb'] : false;

$blog_cats = isset( $et_ptemplate_settings['et_ptemplate_blogcats'] ) ? (array) $et_ptemplate_settings['et_ptemplate_blogcats'] : array();
//$et_ptemplate_blog_perpage = isset( $et_ptemplate_settings['et_ptemplate_blog_perpage'] ) ? (int) $et_ptemplate_settings['et_ptemplate_blog_perpage'] : 10;
$et_ptemplate_blog_perpage = 2; */

$is_esa_story_page = true;

?>

<?php get_header(); ?>

<?php include ('breadcrumbs-stories.php'); ?>

<div id="content-area" class="clearfix<?php if ( $fullwidth ) echo ' fullwidth'; ?>">
	<div id="left-area">
	    
	    <h1 class="page_title">
		    <?php if (is_search()) {
		    	echo ($q = get_search_query()) ? "SEARCH RESULTS FOR '$q'" :  "SEARCH RESULTS";
		    } else if (is_archive()) {
		    	echo single_term_title();
			} ?>
	    </h1>
		
		
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('entry clearfix'); ?>>
			
			
			<div class="post-content">
				<?php the_content(); ?>
				
				<div id="et_pt_blog" class="responsive">
					<?php		
						if (have_posts()) {
							while (have_posts()) {
								the_post(); 
								include('loop-story.php');
							}
					 	
							echo '<div class="page-nav clearfix">';
							if(function_exists('wp_pagenavi')) {
								echo wp_pagenavi(); 
							} else { 
								get_template_part('includes/navigation');
							}
							echo "</div>";
							
						} else {
							echo "No Stories found that are matching your criteria.";
						}
						wp_reset_query();
					?>
				</div> <!-- end #et_pt_blog -->
				
				<?php wp_link_pages(array('before' => '<p><strong>'.esc_attr__('Pages','Flexible').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div> 	<!-- end .post-content -->
		</article> <!-- end .entry -->
	</div> <!-- end #left_area -->

	<?php if ( ! $fullwidth ) include ('sidebar-stories.php'); ?>
</div> 	<!-- end #content-area -->

<?php get_footer(); ?>

