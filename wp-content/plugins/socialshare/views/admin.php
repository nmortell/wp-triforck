<!-- This file is used to markup the administration form of the widget. -->
<div class="wrapper">
  <fieldset>
    
    <p>
		<div class="option">
			<label for="<?php echo $this->get_field_id('twitter'); ?>">
				<?php _e('Tweet Text:', self::locale); ?>
			</label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" class="widefat" />
		</div>
	</p>
	
	<p>
		<div class="option">
			<label for="<?php echo $this->get_field_id('twitterurl'); ?>">
				<?php _e('Tweet Url:', self::locale); ?>
			</label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('twitterurl'); ?>" name="<?php echo $this->get_field_name('twitterurl'); ?>" value="<?php echo $instance['twitterurl']; ?>" class="widefat" />
		</div>
	</p>
    
	<p>
		<div class="option">
			<label for="<?php echo $this->get_field_id('facebook'); ?>">
				<?php _e('Facebook(Url to Like):', self::locale); ?>
			</label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" class="widefat" />
		</div>
	</p>
    
	<p>
		<div class="option">
			<label for="<?php echo $this->get_field_id('google_plus'); ?>">
				<?php _e('Google+(Url to +1):', self::locale); ?>
			</label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('google_plus'); ?>" name="<?php echo $this->get_field_name('google_plus'); ?>" value="<?php echo $instance['google_plus']; ?>" class="widefat" />
		</div>
	</p>
    
	<p>
		<div class="option">
			<label for="<?php echo $this->get_field_id('pinterest'); ?>">
				<?php _e('Pinterest(Url to pin):', self::locale); ?>
			</label>
			<br />
			<input type="text" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $instance['pinterest']; ?>" class="widefat" />
		</div>
	</p>
    
  </fieldset>
</div><!-- /wrapper -->