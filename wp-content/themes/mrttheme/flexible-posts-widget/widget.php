<?php
/**
 * Flexible Posts Widget: Default widget template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo $before_title . $title . $after_title;

if( $flexible_posts->have_posts() ):
?>
	<ul class="dpe-flexible-posts volunteer-post">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a id="volunteer-post-link"href="<?php echo the_permalink(); ?>">
				<div class="volunteer-thumb"><?php
					if( $thumbnail == true ) {
						// If the post has a feature image, show it
						if( has_post_thumbnail() ) {
							the_post_thumbnail( $thumbsize );
						// Else if the post has a mime type that starts with "image/" then show the image directly.
						} elseif( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) {
							echo wp_get_attachment_image( $post->ID, $thumbsize );
						}
					}
				?>
				</div>
				</a>
			<div class="volunteer-text">
				<h4 class="title"><?php the_title(); ?></h4>
				<p id="volunteer-excerpt"><?php the_content(); ?></p>
			<input type="button" value="Be Our Volunteer" id="volunteer-btn" />
			</div>
			
		</li>
		<div id="volunteer-form" title="Nominate A Volunteer!">
			<div class"v-form"><?php echo do_shortcode("[easy_contact_forms fid=2]");?></div>
		</div>
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts -->
<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e( 'No post found', 'flexible-posts-widget' ); ?></p>
	</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
