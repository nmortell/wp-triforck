<?php get_header(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="navmenu">
<?php wp_nav_menu( array( 'theme_location' => 'primary') );?>
</div>
<section id="container">
<section class="header">
<div class="title-blog">
<h1><?php printf( __( 'Search Results for: %s', 'artblogazine' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</div>
<div class="clearfix"></div>
</section>
<?php if ( have_posts() ) : ?>
<section class="home-content">
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-meta">				
<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="post-info"> <?php artblogazine_posted_on(); ?> | <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'artblogazine' ) . '</span>', _x( '1 comment', 'comments number', 'artblogazine' ), _x( '% comments', 'comments number', 'artblogazine' ) ); ?></p>

</header>
<div class="ekserp">
<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
<?php the_excerpt(); ?>
</div></div>
<div class="clear"></div>

<?php endwhile; ?>
<?php else : ?>
<h2 class="eror"><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'artblogazine' ); ?></h2>
						
<?php endif; ?>
</section>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-below" class="navigation">
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older') ); ?></div>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&rarr;</span>') ); ?></div>
    </div><!-- #nav-below -->
<?php endif; ?>

                       </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
