<?php

/*
* Plugin Name: Email Debugger
*/
add_filter( 'wp_mail', function ( $args ) {
	$my_file = dirname( __FILE__ ) . '/file_' . rand() . '.html';
	$handle = fopen( $my_file, 'w' ) or die( 'Cannot open file:  ' . $my_file );
	fwrite( $handle, '<html><head></head><body>' . $args['message'] . '</body>' );
	fclose( $handle );
	error_log( print_r( '--', true ) );
	return $args;
});
