<?php
/*
blogazine style: Blogazine no aside style
*/
?>
<?php get_header(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="navmenu">
<?php wp_nav_menu( array( 'theme_location' => 'primary') );?>
</div>
<section class="header">
<div class="title-post">
<div class="clear"></div>				
<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
</div>
<div class="title-blog-single">
<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
</div>
<div class="clearfix"></div>
</section>
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="navigation">
<p class="alignleft post-info-single"><?php artblogazine_posted_on(); ?></p> 
<p class="alignright font-small"><?php _e('Categories :', 'artblogazine'); ?><?php the_category(' &bull; '); ?></p>
</div>
<?php the_content(); ?>	
<div class="clearfix"></div>
</div>
<?php endwhile; ?>
<div id="nav-below" class="navigation">
<div class="meta-prev">
<?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'artblogazine' ) . '</span> %title' ); ?>
</div>
<div class="meta-next">
<?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'artblogazine' ) . '</span>' ); ?>
</div>
</div>
<div id="comm">
<div class="komentar">
<?php comments_template('', true); ?>	
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
