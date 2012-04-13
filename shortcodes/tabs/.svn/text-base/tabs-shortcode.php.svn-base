<?php

/*
Tabs
============================*/

add_shortcode( 'omfg_tabgroup', 'vz_tabgroup' );

function vz_tabgroup( $atts, $content ){
	
$GLOBALS['tab_count'] = 0;
do_shortcode( $content );

if( is_array( $GLOBALS['tabs'] ) ){
	
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '
	<li><a href="#'.$tab['id'].'">'.$tab['title'].'</a></li>
		';
$panes[] = '
	<li id="'.$tab['id'].'Tab">'.$tab['content'].'</li>
		';
}

$return .= "\n".'
<!-- the tabs -->

<div style="width:98%; margin: 5px auto;"> 
	<ul class="tabs">
	'.implode( "\n", $tabs ).'
	</ul>'."\n".'

	<!-- tab "panes" -->
	<ul class="tabs-content">
	'.implode( "\n", wpautop(do_shortcode($panes)) ).'
	</ul>'."\n"
	
."</div>";
}

return $return;

}

add_shortcode( 'omfg_tab', 'vz_tab' );

function vz_tab( $atts, $content ){
extract(shortcode_atts(array(
	'title' => '%d',
	'id' => '%d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array(
	'title' => sprintf( $title, $GLOBALS['tab_count'] ),
	'content' =>  $content,
	'id' =>  $id );

$GLOBALS['tab_count']++;
}
