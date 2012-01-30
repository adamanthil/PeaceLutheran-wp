<?php get_header(); ?>

<div id="core" class="columns">
  
  <div id="feed" class="column">
	<?php 
		$postTypes = get_post_types(array('name' => get_post_type()), 'objects'); 
		$postType = $postTypes[get_post_type()];
		$subtitle = null;
		if(is_year()) {
		  $title = "<h1 style='margin-bottom: 0'>" . $postType->labels->name . '</h1>';
			$subtitle = '<h3 style="margin-top: 0">Yearly Archives: ' . get_the_date('Y') . '</h3>';
		}
		elseif(is_month()) {
			$title = "<h1 style='margin-bottom: 0'>" . $postType->labels->name . '</h1>';
			$subtitle = '<h3 style="margin-top: 0">Monthly Archives: ' . get_the_date('F Y') . '</h3>';
		}
		else {
			$title = '<h1>' . $postType->labels->name . '</h1>';
		}
	?>
	<?php if(!$postType->_builtin): ?>
		<?php echo $title; ?>
		<?php echo $subtitle; ?>
	<?php endif; ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php // Grab attachment link
				$attachment_link = null;
				if(get_post_type($post) != 'post' && get_post_type($post) != 'peace_sermon') {
					$args = array(
						'post_type' => 'attachment',
						'numberposts' => null,
						'post_status' => null,
						'post_parent' => $post->ID
					);
					$attachments = get_posts($args);
					if ($attachments) {
						foreach ($attachments as $attachment) {
							$attachment_link = wp_get_attachment_link($attachment->ID, false, false, false, 'Download (Adobe PDF)');
						}
					}
				}
			?>
			<div class="post-single">
				<h2 style='margin-bottom: 0px'><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 style='margin-top: 0px'><?php the_time('F j, Y'); ?></h3>
				<?php echo $attachment_link; ?>
				<?php if( function_exists('the_powerpress_content') && get_post_type($post) == 'peace_sermon') the_powerpress_content(); ?>
				<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
				<?php if(get_the_content() !== ''): ?>
					<div class="post-content">
						<?php the_content(__('Read more'));?>
					</div>
				<?php endif; ?>
				<div class="post-meta">
					<?php if($displayAuthor): ?>
						<p>
							Written on <?php the_time('F j, Y'); ?> at <?php the_time() ?>, by <?php the_author_posts_link() ?>
						</p>
					<?php endif; ?>
					<?php if(get_post_type( $post ) == 'post'): ?>
					<p class="meta">
						<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
						<br />
						Categories: <?php the_category(', ') ?>
						<br />
						<?php if (the_tags('Tags: ', ', ', ' ')); ?>
					</p>
					<?php endif; ?>
				</div><!--.postMeta-->
			</div><!--.post-single-->
		<?php endwhile; else: ?>
			<div class="no-results">
				<p><strong>There has been an error.</strong></p>
				<p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
			</div><!--noResults-->
		<?php endif; ?>
			
		<nav class="oldernewer">
			<div class="older">
				<p>
					<?php next_posts_link('&laquo; Older Entries') ?>
				</p>
			</div><!--.older-->
			<div class="newer">
				<p>
					<?php previous_posts_link('Newer Entries &raquo;') ?>
				</p>
			</div><!--.older-->
		</nav><!--.oldernewer-->

  </div>
  <?php get_sidebar(); ?>

</div> <!-- / core -->

<?php get_footer(); ?>

