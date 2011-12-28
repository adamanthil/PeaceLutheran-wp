<?php
/**
 *	Template Name: Staff
*/
?>

<?php get_header(); ?>

<div id="core" class="columns">
    <h1>Staff</h1>
    <?php switch_to_blog(1);?>
    <?php query_posts( 'post_type=peace_staff&post_status=publish&order=ASC'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php 
        $name = get_the_title();
        $bio = get_the_content();
	    $title = get_post_meta($post->ID, 'title', $single = true);
	    $shortName = get_post_meta($post->ID, 'short_name', $single = true);
	    $email = get_post_meta($post->ID, 'email', $single = true);
	    $education = get_post_meta($post->ID, 'education', $single = true);
	    $awards = get_post_meta($post->ID, 'awards', $single = true);
	    $publications = get_post_meta($post->ID, 'publications', $single = true);
	    $images = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
	    $image = array_key_exists(0, $images) ? $images[0] : '';
	?>
	    <div class='staff-bio'>
	        <div class='bio-left'>
    	        <img alt="<?php echo $name; ?>" src="<?php echo $image?>" />
    	        <div class='education'>
    	            <?php if($education): ?>
        	            <h4>Education</h4>
        	            <div class='item'><?php echo str_replace("\n", "</div><div class='item'>", $education); ?></div>
    	            <?php endif; ?>
    	            <?php if($email): ?>
        	            <a href='/contact?n=<?php echo rawurlencode($shortName); ?>'>Contact <?php echo $shortName; ?></a>
    	            <?php endif; ?>
    	        </div>
    	    </div>
	        <div class='bio-right'>
    	        <h2><?php echo $name; ?></h2>
    	        <h3><?php echo $title; ?></h3>
    	        <div class='bio'><?php echo $bio; ?></div>
    	        <?php if($awards): ?>
        	        <h4>Awards and Accomplishments</h4>
        	        <div><?php echo $awards; ?></div>
    	        <?php endif; ?>
    	        <?php if($publications): ?>
        	        <h4>Publications</h4>
        	        <div><?php echo $publications; ?></div>
    	        <?php endif; ?>
	        </div>
	    </div>
	<?php endwhile; endif; ?>
    <?php restore_current_blog(); ?>

</div> <!-- / core -->

<?php get_footer(); ?>