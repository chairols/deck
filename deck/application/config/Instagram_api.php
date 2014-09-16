<?php

/*
|--------------------------------------------------------------------------
| Instagram
|--------------------------------------------------------------------------
|
| Instagram client details
|
*/

$config['instagram_client_name']	= '';
$config['instagram_client_id']		= 'd4378d8d4e564c8ea80bd62d41bb5c1f';
$config['instagram_client_secret']	= 'e3c22a651fa345d082d9fe3e99a8dae8';
$config['instagram_callback_url']	= 'http://deck.hostdeprueba.com.ar/instagram/callback';
$config['instagram_website']		= 'http://deck.hostdeprueba.com.ar';
$config['instagram_description']	= '';

/**
 * Instagram provides the following scope permissions which can be combined as likes+comments
 * 
 * basic - to read any and all data related to a user (e.g. following/followed-by lists, photos, etc.) (granted by default)
 * comments - to create or delete comments on a user’s behalf
 * relationships - to follow and unfollow users on a user’s behalf
 * likes - to like and unlike items on a user’s behalf
 * 
 */
$config['instagram_scope'] = 'basic+comments+relationships+likes';

// There was issues with some servers not being able to retrieve the data through https
// If you have this problem set the following to FALSE 
// See https://github.com/ianckc/CodeIgniter-Instagram-Library/issues/5 for a discussion on this
$config['instagram_ssl_verify']		= TRUE;

?>