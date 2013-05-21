<?php 
/**
 * @package dkNote
 * @since dkNote 1.0
 */
?>
<div id="search-box">
<form id="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" class="field" name="s" id="search-text"  placeholder="<?php esc_attr_e( 'Search &hellip;', 'dknote' ); ?>"  />
<input id="search-button" type="submit" value="<?php esc_attr_e( 'Search', 'dknote' ); ?>" />
</form>
</div>
