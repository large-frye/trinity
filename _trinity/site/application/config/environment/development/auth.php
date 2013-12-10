<?php defined('SYSPATH') or die('No direct script access.');

return array
(
	/* How much time (milliseconds) to remember, default 2 weeks (1209600) */
	'lifetime' => 1209600,
	
	/* from which characters to construct the salt */
	'salt_chars' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',

	/**
	 * Type of hash to use for passwords. Any algorithm supported by the hash function
	 * can be used here. Note that the length of your password is determined by the
	 * hash type + the number of salt characters.
	 * @see http://php.net/hash
	 * @see http://php.net/hash_algos
	 */
	'hash_method' => 'sha256', /* sha256 is stronger than md5 */
	'hash_iterations' => 3,
	'shared_secret' => 'a1b2c3d4e5f6g7',
	'session_key' => 'auth_user'
);