<?php

// $Id: //

/**
 * @file config.php
 *
 * Global configuration variables (may be added to by other modules).
 *
 */

global $config;

// Date timezone
date_default_timezone_set('UTC');

// Database-----------------------------------------------------------------------------------------
$config['adodb_dir'] 	= dirname(__FILE__) .'/adodb5/adodb.inc.php'; 
$config['db_user'] 	    = 'root';
$config['db_passwd'] 	= '';
$config['db_name'] 	    = 'ion';

// BioNames
$config['couchdb_options'] = array(
		'database' => 'bionames',
		'host' => 'rdmpage:peacrab@direct.bionames.org',
		'port' => 5984
		);

// HTTP proxy
if ($config['proxy_name'] != '')
{
	if ($config['couchdb_options']['host'] != 'localhost')
	{
		$config['couchdb_options']['proxy'] = $config['proxy_name'] . ':' . $config['proxy_port'];
	}
}


?>