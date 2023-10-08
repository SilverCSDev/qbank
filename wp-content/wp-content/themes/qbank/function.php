<?php

/* enqueue scripts and style from parent theme */
 
function qbank_style() {
wp_enqueue_style( 'qbank_style', get_stylesheet_uri(),
array( 'twenty-twenty-three-style' ), wp_get_theme()->;get('Version') );
}
add_action( 'wp_enqueue_scripts', 'qbank_style');