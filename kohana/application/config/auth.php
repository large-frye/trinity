<?php defined('SYSPATH') or die('No direct script access.');

return array
(
	'driver'        => 'orm',
	'lifetime'      => 1209600,
	'hash_method'   => 'sha256', /* sha256 is stronger than md5 */
	'hash_key'      => 'Never gonna give you up',
	'session_key'   => 'auth_user'
);