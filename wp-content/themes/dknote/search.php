<?php
/**
 * @package dkNote
 * @since dkNote 1.0
 */
get_header(); ?>
<section class="dh8">
<section id="main">
<header class="archive-title">
  <?php echo dknote_breadcrumb(); ?>
  <h3 class="content-title"><?php printf( __( 'Search Results for: %s', 'dknote' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
</header>  
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <article id="post-<?php the_ID(); ?>" <?php post_class("archive-page"); ?>>
    <h2 class="content-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'dknote' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
     <div class="info-meta"><?php _e( 'Author:', 'dknote' ); ?> <?php the_author_posts_link(); ?> | <?php the_time('F jS, Y') ?> |
      <?php $categories_list = get_the_category_list( __( ', ', 'dknote' ) ); if ( $categories_list ) :?>
       <span class="cat-links"><?php _e( 'Category :', 'dknote' ); ?> <?php echo $categories_list; ?></span>
      <?php endif; // End if categories ?>
     </div>
     <?php the_excerpt(); ?>
   </article>
    <?php endwhile; else: ?>
      <div class="post"><p class="errore"><?php _e('Sorry, no posts matched your criteria', 'dknote'); ?></p></div>
    <?php endif; ?>
<nav id="pagenavi"><?php dknote_pagenavi();?></nav>
</section>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
