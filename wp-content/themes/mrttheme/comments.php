<?php 
/**
 * @package dkNote
 * @since dkNote 1.0
 */
if ( post_password_required() )
	return; ?>
<section id="comments">
 <?php if ( have_comments() ) : ?>
  <section class="tombolkomentar">
    <?php printf( _n( 'One Comment on &ldquo;%2$s&rdquo;', '<span>%1$s Comments</span> on &ldquo;%2$s&rdquo;', get_comments_number(), 'dknote' ),
       number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
    <?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
      <p class="nocomments"><?php _e( 'Comments are closed.', 'dknote' ); ?></p>
    <?php endif; ?>
  </section>
  <div class="kosong"></div>
  <ul class="commentlist">
    <?php wp_list_comments( array( 'callback' => 'dknote_comment' ) ); ?>
  </ul><!-- .commentlist -->
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
  <nav id="pagenavi"><?php paginate_comments_links(); ?></nav>
		<?php endif; ?>			
 <?php endif; // have_comments() ?>
 <?php if (comments_open()): // The comment form 
   $req = get_option( 'require_name_email' );
   $aria_req = ( $req ? " aria-required='true'" : '' );
   $fields =  array(
    'author'	=>	'<p><input type="text" class="txt" placeholder="'.esc_attr( 'Name ( required )','dknote' ).'" name="author"'. $aria_req .' /><label>'.esc_attr('Name','dknote').'</label>',
    'email'		=>	'<p><input type="text" class="txt" placeholder="'.esc_attr( 'Email ( required )','dknote' ).'" name="email"'. $aria_req .' /><label>'.esc_attr('Email','dknote').'</label>',
    'url'		=>	'<p><input type="text" class="txt" placeholder="'.esc_attr( 'Website','dknote' ).'" name="url"'. $aria_req .' /><label>'.esc_attr('Website','dknote').'</label>'
   );
   $args = array(
    'title_reply'          => 	__( 'Leave a Reply', 'dknote' ),
    'comment_notes_before' =>	 '',
    'comment_field'        => 	'<p><textarea name="comment" id="comment" class="animasibox" rows="10" placeholder="'.esc_attr('Your Comments','dknote').'"></textarea>',
    'label_submit'         =>	 __( 'Submit','dknote' ),
    'comment_notes_after'  => 	'',
    'fields'               => 	apply_filters( 'comment_form_default_fields', $fields )
   );
 comment_form($args);  
 endif; ?>
</section> <!-- #comments --> 	
