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
<h1 class="page-title"><?php
						printf( __( 'Tag Archives: %s', 'artblogazine' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) )
							echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
					?>

</div>
<div class="clearfix"></div>
</section>

<section class="sumary">
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-meta">				
<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="post-info"> <?php artblogazine_posted_on(); ?> | <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'artblogazine' ) . '</span>', _x( '1 comment', 'comments number', 'artblogazine' ), _x( '% comments', 'comments number', 'artblogazine' ) ); ?></p>

</header>
<div class="ekserp">
<div class="alignleft">
<?php _e('Categories :', 'artblogazine'); ?> <?php the_category(' &bull; '); ?>
</div>
<div class="alignright">
<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( __( '<span class="%1$s">Tagged :</span> %2$s', 'artblogazine' ), '', $tags_list ); ?>
					</span>
				<?php endif; ?>

</div>
</div>
</div>
<div class="clear"></div>

<?php endwhile; ?>
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
