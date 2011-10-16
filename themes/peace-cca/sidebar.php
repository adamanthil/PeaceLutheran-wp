<div id="sidebar" class="column">
	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>

		<li id="sidebar-search" class="widget">
			<h3>Search</h3>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</li>
		
		<li id="sidebar-archives" class="widget">
			<h3>Archives</h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</li>

	<?php endif; ?>
</div><!--sidebar-->
