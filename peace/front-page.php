<?php get_header(); ?>
  <div id="top">
    <div id="welcome">
      <h3>Welcome</h3>
      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin lobortis dictum tristique. Aliquam lacinia luctus interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin tempus dictum tincidunt. Morbi commodo ullamcorper nisl, sit amet lacinia elit pharetra.</p>
    </div>
  </div> <!-- /top -->

  <div id="content">
    <div id="mid" class="columns">
      <div id="downloads" class="column">
        <h3>Weekly Downloads</h3>
        <h4>5th Sunday in Lent</h4>
        <ul class="inside">
          <li>Sermon <a href="#">Download</a></li>
          <li>Bulletin <a href="#">Download</a></li>
          <li>Congegration in Prayer <a href="#">Download</a></li>
        </ul>
      </div>
      <div id="schedule" class="column">
        <h3>Weekly Schedule</h3>
        <h4>Divine Services &amp; Catechesis</h4>
        <div class="inside columns">
          <div class="column">
            <h5>Divine Services</h5>
            Sundays:  7:45am and 10:35am<br />
            Wednesdays:  6:45pm<br />
            Festivals, Feast Days, and Holidays
          </div>
          <div class="column">
            <h5>Catechesis</h5>
            Sundays:  9:15am Catechesis
            Mondays:  7pm Didache
            Thursdays:  9am Coffee Break Bible Study
          </div>
        </div>
      </div>
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
