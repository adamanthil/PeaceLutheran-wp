<?php
/**
 *	Template Name: Symposium
*/
?>

<?php get_header(); ?>

<div id="core" class="columns">
    <?php query_posts( 'post_type=peace_symposium&post_status=publish&posts_per_page=1&order=DESC'); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
            $year = get_post_meta($post->ID, "year", $single = true);
            $title = get_post_meta($post->ID, "title", $single = true);
            $dates = get_post_meta($post->ID, "dates", $single = true);
            $featuring = get_post_meta($post->ID, "featuring", $single = true);
        ?>
        <h1><?php echo $year . ' CCA Symposium'; ?></h1>
        <h2><?php echo $title; ?></h2>
        <p><em><?php echo $dates; ?></em></p>
        <div class="post-content">
    		<?php the_content();?>
    	</div>
        <h3>Featuring</h3>
        <p><?php echo str_replace("\n", "<br/>", $featuring); ?></p>
    <?php endwhile; endif; ?>
</div> <!-- / core -->

<?php get_footer(); ?>