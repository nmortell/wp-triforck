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
  <h3 class="content-title">
    <?php if ( is_category() ) {
          printf( __( 'Category Archives: %s', 'dknote' ), '<span>' . single_cat_title( '', false ) . '</span>' );
      } elseif ( is_tag() ) {
          printf( __( 'Tag Archives: %s', 'dknote' ), '<span>' . single_tag_title( '', false ) . '</span>' );
      } elseif ( is_author() ) {
          the_post();
          printf( __( 'Author Archives: %s', 'dknote' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
          rewind_posts();
      } elseif ( is_day() ) {
          printf( __( 'Daily Archives: %s', 'dknote' ), '<span>' . get_the_date() . '</span>' );
      } elseif ( is_month() ) {
          printf( __( 'Monthly Archives: %s', 'dknote' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
      } elseif ( is_year() ) {
          printf( __( 'Yearly Archives: %s', 'dknote' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
      } else {
         _e( 'Archives', 'dknote' );
      } ?>
  </h3>
  <?php
    if ( is_category() ) { $category_description = category_description();
      if ( ! empty( $category_description ) )
        echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
    } elseif ( is_tag() ) { $tag_description = tag_description();
	  if ( ! empty( $tag_description ) )
        echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
    }
  ?>
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
