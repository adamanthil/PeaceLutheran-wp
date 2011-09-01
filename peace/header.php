<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta name="viewport" content="width=device-width; initial-scale=1"/><?php /* Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, but keep in mind that it will disable user-zooming completely. Bad for accessibility. */ ?>
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
    <?php wp_enqueue_script("jquery"); /* Loads jQuery if it hasn't been loaded already */ ?>

    <link type="text/css" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/stylesheets/normalize.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/stylesheets/site.css" media="screen" />
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title><?php if ( is_category() ) {
      echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_tag() ) {
      echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_archive() ) {
      wp_title(''); echo ' Archive | '; bloginfo( 'name' );
    } elseif ( is_search() ) {
      echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
    } elseif ( is_home() ) {
      bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
    }  elseif ( is_404() ) {
      echo 'Error 404 Not Found | '; bloginfo( 'name' );
    } elseif ( is_single() ) {
      wp_title('');
    } else {
      echo wp_title(''); 
      echo ' | '; bloginfo( 'name' );
    } ?></title>

    <script type="text/javascript" src="http://use.typekit.com/ltq7dhs.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>

    <section id="main" role="main">
      <header>
        <div id="title">
          <h1><a href="#">Peace Lutheran Church</a></h1>
          <span class="loc">Sussex, Wisconsin</span>
        </div>
        <nav role="navigation">
          <?php wp_nav_menu( array('menu' => 'header-menu', 'container' => false )); ?>
        </nav>
        <ul id="site-selector">
          <li><a href="#">Academy</a></li>
          <li><a href="#">CCA</a></li>
          <li class="at"><a href="#">Parish</a></li>
        </ul>
      </header>
      <article id="content">


