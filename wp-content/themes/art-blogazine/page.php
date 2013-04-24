<?php get_header(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="navmenu">
<?php wp_nav_menu( array( 'theme_location' => 'primary') );?>
</div>
<section id="container">
<div class="header">
<div class="title-post">				
<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
</div>
<div class="title-blog-single">
<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
</div>
<div class="clearfix"></div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="navigation">
<div class="meta-prev">
<?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'artblogazine' ) . '</span>' ); ?>
</div>
<div class="meta-next">
<?php next_post_link( '%link', '<span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'artblogazine' ) . '</span>' ); ?>
</div>
</div>
<section class="sumary">
	<div class="content-post">
<?php the_content(); ?>	
<div class="clearfix"></div>
<?php artblogazine_posted_on(); ?>
<div class="clearfix"></div>
<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'artblogazine' ) . '</span>', 'after' => '</div>' ) ); ?>
</div>
</section>
<aside id="authorarea">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 90 ) ); ?>
		<div class="authorinfo">
			<h3><?php the_author(); ?></h3>
			<p><?php the_author_meta( 'description' ); ?></p>
			
		</div>
	</aside>
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
</section>
<?php get_footer(); ?>