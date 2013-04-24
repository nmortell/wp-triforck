<?php 
if ( post_password_required() ) {
		?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'artblogazine'); ?></p>
		<?php
		return;
		}
if (function_exists('wp_list_comments')) :
	if ( have_comments() ) : ?>	
	<h3 id="comments"><?php comments_number(__('No Comments', 'artblogazine'), __('One Comment', 'artblogazine'), __('% Comments', 'artblogazine') );?></h3>
<?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') ) ?>
	<ul class="commentlist">
<?php wp_list_comments( array( 'type' => 'comment', 'avatar_size' => 80 ) ); ?>		
	</ul>
	<ul class="trackback">
		<?php wp_list_comments('type=pings'); ?>
	</ul>
	
<?php else : ?> 
	<?php if ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?><p class="nocomments"><?php _e('Comment are closed','artblogazine'); ?></p>
	<?php endif;
endif;
else:
$oddcomment = 'alt';
?>
<?php if ($comments) : ?>	
 <?php else : ?>  
 
	 
<?php endif; ?>
<?php endif; ?>  
<?php if ('open' == $post->comment_status) : ?>
<div class="respond">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('You must','artblogazine'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in','artblogazine'); ?></a></p>
<?php else : ?>
 <?php comment_form(); ?>
</div>
<?php endif; ?>  
<?php endif; ?> 