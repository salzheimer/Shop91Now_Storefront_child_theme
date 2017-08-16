<?php
/**
 * Footer
 *
 * @see  shop91now_footer_widgets()
 * @see  shop91now_credit()
 */
add_action( 'shop91now_footer', 'shop91now_footer_widgets', 10 );
add_action( 'shop91now_footer', 'shop91now_credit',         20 );
