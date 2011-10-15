<?php get_header(); ?>

  <div id="top">
    <div id="welcome">
      <h3>Welcome</h3>
      <p>Peace Lutheran Academy. Lutheran Classical Education. Classical Education in the Lutheran and Liberal Arts traditions. Forging a partnership with parents in elementary education and lutheran catechesis</p>
    </div>
  </div> <!-- /top -->

  <div id="content">
    <div id="mid">
      <div id="slogan">&nbsp;</div>
    </div> <!-- / mid -->
    <div id="bottom" class="columns">
      <div class="column">
        <div class="header">
          <h3>News</h3>
        </div>
        <ul id="news">
        <?php query_posts( 'post_type=peace_news&post_status=publish&posts_per_page=1'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li>
                <h5><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
                <p><?php the_excerpt(); ?></p>
            </li>
        <?php endwhile; endif; ?>
      </div>
      <div class="column">
        <div class="header">
          <h3>Upcoming Events</h3>
        </div>
        <ul id="events">
        <?php 
            $args = array('limit=2');
            $events = array();
            if (class_exists('EM_Events')) {
                $events = EM_Events::get($args);
            }
        ?>
        <?php foreach($events as $event): ?>
        <li>
          <h5><a href="#"><?php echo $event->name; ?></a></h5>
          <span class="date"><?php $date = new \DateTime($event->start_date); echo $date->format('l F j') ?></span>
          <p><?php echo $event->notes; ?></p>
        </li>
        <?php endforeach; ?>
      </div>
      <div class="column">
        <div class="header">
          <h3>Shepherd of Peace</h3>
          <h4>The Pastoral Newsletter of Peace Lutheran</h4>
        </div>
        <div class="lastest">
        <?php query_posts( 'post_type=post&post_status=publish&posts_per_page=1'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li>
                <h5><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
                <p><?php the_excerpt(); ?></p>
            </li>
        <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div> <!-- /content -->
<?php get_footer(); ?>
