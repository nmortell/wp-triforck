<?php
/**
 * @package dkNote
 * @since dkNote 1.0
 */
?>
<aside class="dh4 sidebar-wrapper">
<div class="sidebar">
 <?php if (!dynamic_sidebar('Sidebar1')) : ?>
 <?php endif; ?>
</div>
<div class="sidebar">
  <?php if (!dynamic_sidebar('Sidebar2')) : ?>
   <h3><?php _e( 'Random Post', 'dknote' ); ?></h3>
    <ul><?php $rand_posts = get_posts('numberposts=5&orderby=rand'); foreach( $rand_posts as $post ) : ?>
      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>
<div class="sidebar">
 <?php if (!dynamic_sidebar('Sidebar3')) : ?>
  <h3><?php _e( 'Popular Posts', 'dknote' ); ?></h3>
   <ul><?php query_posts('orderby=comment_count&posts_per_page=5'); if (have_posts()) : while (have_posts()) : the_post();?>
     <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
   <?php endwhile; endif; wp_reset_query(); ?>
   </ul>
 <?php endif; ?>
</div>
</aside>
