<?php
/**
 *	Template Name: Media
*/
?>

<?php get_header(); ?>
	<div id='content'>
		<?php if ( ! dynamic_sidebar( 'Alert' ) ) : ?>
			<!--Wigitized 'Alert' for the home page -->
		<?php endif ?>
		<div>
			<h2>Sermons</h2>
			<?php query_posts( 'post_type=peace_sermon&post_status=publish&posts_per_page=5'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-single">
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
					<div class="post-content">
						<?php the_content(__('Read more'));?>
					</div>
					<div class="post-meta">
						<p>
							<?php the_time('F j, Y'); ?> at <?php the_time() ?>
						</p>
					</div><!--.postMeta-->
				</div><!--.post-single-->
			<a href='sermons'>View Archive</a>
			<?php endwhile; endif; ?>
		</div>
		<div>
			<h2>Congregation at Prayer</h2>
			<?php query_posts( 'post_type=peace_congpray&post_status=publish&posts_per_page=5'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-single">
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
					<div class="post-content">
						<?php the_content(__('Read more'));?>
					</div>
					<div class="post-meta">
						<p>
							<?php the_time('F j, Y'); ?> at <?php the_time() ?>
						</p>
					</div><!--.postMeta-->
				</div><!--.post-single-->
			<a href='congregation-at-prayer'>View Archive</a>
			<?php endwhile; endif; ?>
		</div>
		<div>
			<h2>Bulletins</h2>
			<?php query_posts( 'post_type=peace_bulletin&post_status=publish&posts_per_page=5'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-single">
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
					<div class="post-content">
						<?php the_content(__('Read more'));?>
					</div>
					<div class="post-meta">
						<p>
							<?php the_time('F j, Y'); ?> at <?php the_time() ?>
						</p>
					</div><!--.postMeta-->
				</div><!--.post-single-->
			<a href='bulletins'>View Archive</a>
			<?php endwhile; endif; ?>
		</div>
	</div><!--#content-->
<?php get_footer(); ?>
