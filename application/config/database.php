<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
//    'hostname' => 'localhost',
//	'username' => 'vinaratr',
//	'password' => 'hPMO{lV8shfQ',
//	'database' => 'vinaratr_encuesta',
	'hostname' => '127.0.0.1',
	'username' => 'root',
	'password' => '',
	'database' => 'solucion2_encuesta',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
