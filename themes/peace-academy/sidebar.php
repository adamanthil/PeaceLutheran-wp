<div id="sidebar" class="column">
	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>

		<li id="sidebar-search" class="widget">
			<h3>Search</h3>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</li>
		<?php if(!is_search()): // Dont show archives on search page (since multiple post types possible) ?>
			<li id="sidebar-archives" class="widget">
				<h3>Archives</h3>
				<ul>
					<?php 
						$args = array('type' => 'monthly');
						if(get_post_type() == 'post') {
							wp_get_archives($args);
						}
						else {
							wp_get_post_type_archives(get_post_type( $post ), $args);
						}
					?>
				</ul>
			</li>
		<?php endif; ?>
	<?php endif; ?>
</div><!--sidebar-->
