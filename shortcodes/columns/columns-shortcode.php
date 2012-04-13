<?php
/*
COLUMNS
=============================================*/

// 1-3 col

function vz_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_one_third', 'vz_one_third');

function vz_one_third_first( $atts, $content = null ) {
   return '<div class="one_third first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_one_third_first', 'vz_one_third_first');

function vz_two_thirds( $atts, $content = null ) {
   return '<div class="two_thirds">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_two_thirds', 'vz_two_thirds');

function vz_two_thirds_first( $atts, $content = null ) {
   return '<div class="two_thirds first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_two_thirds_first', 'vz_two_thirds_first');

// 1-4 col 

function vz_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_one_half', 'vz_one_half');


function vz_one_half_first( $atts, $content = null ) {
   return '<div class="one_half first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_one_half_first', 'vz_one_half_first');


function vz_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_one_fourth', 'vz_one_fourth');


function vz_one_fourth_first( $atts, $content = null ) {
   return '<div class="one_fourth first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_one_fourth_first', 'vz_one_fourth_first');

function vz_three_fourths( $atts, $content = null ) {
   return '<div class="three_fourths">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_three_fourths', 'vz_three_fourths');


function vz_three_fourths_first( $atts, $content = null ) {
   return '<div class="three_fourths first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_three_fourths_first', 'vz_three_fourths_first');


function vz_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_one_fifth', 'vz_one_fifth');

function vz_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_two_fifth', 'vz_two_fifth');

function vz_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_three_fifth', 'vz_three_fifth');

function vz_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('omfg_four_fifth', 'vz_four_fifth');

// 1-5 Col

function vz_one_fifth_first( $atts, $content = null ) {
   return '<div class="one_fifth first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_one_fifth_first', 'vz_one_fifth_first');

function vz_two_fifth_first( $atts, $content = null ) {
   return '<div class="two_fifth first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_two_fifth_first', 'vz_two_fifth_first');

function vz_three_fifth_first( $atts, $content = null ) {
   return '<div class="three_fifth first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_three_fifth_first', 'vz_three_fifth_first');

function vz_four_fifth_first( $atts, $content = null ) {
   return '<div class="four_fifth first">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_four_fifth_first', 'vz_four_fifth_first');