<div class="social">
<?php get_sidebar('icon'); ?>
<div class="footer alignright">
<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
<?php bloginfo('name'); ?></a> | <a href="<?php echo esc_url(__('http://amdhas.tk','artblogazine')); ?>" title="<?php esc_attr_e('artblogazine', 'artblogazine'); ?>"><?php printf('artblogazine'); ?></a> powered by <a href="<?php echo esc_url(__('http://wordpress.org','artblogazine')); ?>" title="<?php esc_attr_e('WordPress', 'artblogazine'); ?>"><?php printf('WordPress'); ?></a>
</div>
<div class="clearfix"></div>
</div>
<?php wp_footer(); ?>
</body>
</html>