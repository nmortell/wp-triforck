<?php 
/**
 * @package dkNote
 * @since dkNote 1.0
 */
get_header(); ?>
<section class="dh8">
<section id="main">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php echo dknote_breadcrumb(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <h1 class="content-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'dknote' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
     <div class="info-meta"><?php _e( 'Posted on :', 'dknote' ); ?> <?php the_time(get_option('date_format')); ?> | <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?> <?php comments_popup_link( __( 'Leave a comment', 'dknote' ), __( '1 Comment', 'dknote' ), __( '% Comments', 'dknote' ) ); ?> <?php endif; ?><?php edit_post_link( __( '(Edit)', 'dknote' ), ' ', ' ' ); ?></div>
      <?php the_content(); ?>
     <div class="kosong"></div>
     <div class="info-meta">
      <?php $categories_list = get_the_category_list( __( ', ', 'dknote' ) ); if ( $categories_list ) :?>
       <span class="cat-links"><?php _e( 'Category :', 'dknote' ); ?> <?php echo $categories_list; ?></span>
      <?php endif; // End if categories ?>
       <br>
      <?php $tags_list = get_the_tag_list( '', __( ', ', 'dknote' ) ); if ( $tags_list ) : ?>
       <span class="tags-links"><?php _e( 'Tags :', 'dknote' ); ?> <?php echo $tags_list; ?></span>
      <?php endif; // End if $tags_list ?>     
     </div>
    <?php endwhile; else: ?>
   <p class="errore"><?php _e('Sorry, no posts matched your criteria', 'dknote'); ?></p>
  <?php endif; ?>
</article>
<footer class="post-footer">
<?php dknote_content_nav(); ?>
<section class="infoadmin">
 <section class="author-info">
  <?php echo get_avatar( get_the_author_meta('user_email'), '80', '' ); ?>
   <h5><?php _e( 'Author:', 'dknote' ); ?> <?php the_author_posts_link(); ?></h5>
   <p><?php the_author_meta('description'); ?></p>
 </section>
</section>
</footer>
	<?php if ( comments_open() || '0' != get_comments_number() )
		comments_template( '', true ); ?>
</section>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
