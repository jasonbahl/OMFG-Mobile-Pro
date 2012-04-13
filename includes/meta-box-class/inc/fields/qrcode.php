<?php
// Prevent loading this file directly - Busted!
if( ! class_exists('WP') ) 
{
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

if ( ! class_exists( 'RWMB_QR_Code_Field' ) ) 
{
	class RWMB_QR_Code_Field 
	{
		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field ) 
		{
			
			$permalink = get_permalink();
				
			$html .= "Scan the code with a QR Code scanner on your mobile device to preview the page.";
			$html .= "<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=".$permalink."&choe=UTF-8' alt='QR code'>";
			$html .= "<a href='".$permalink."' target='_blank'>View Page</a> | <a href='http://www.qrlicious.com/completely/' target='_blank'>Order a Custom QR Code</a>";
			$html .= "<br/>";
		
			return $html;
		}
	}
}