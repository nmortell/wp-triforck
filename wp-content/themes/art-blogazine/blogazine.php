<?php
/*
blogazine style: Blogazine Style
*/
?>
<?php get_header(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="navmenu">
<?php wp_nav_menu( array( 'theme_location' => 'primary') );?>
</div>
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>	
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
