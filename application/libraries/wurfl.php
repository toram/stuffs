<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use ScientiaMobile\WurflCloud\Config;
use ScientiaMobile\WurflCloud\Cache\Null;
use ScientiaMobile\WurflCloud\Cache\Cookie;
use ScientiaMobile\WurflCloud\Client;

class Wurfl {
	/**
	 * Enter your API Key here
	 * @var string
	 */
	private static $api_key = '';
	

	public function __construct()
	{
		require_once __DIR__.'/../third_party/wurfl/src/autoload.php';

		$config = new Config();
		$config->api_key = self::$api_key;

		// To disable caching for testing, you can use the Null cache provider:
		// $cache = new Null();
		$cache = new Cookie();
		
		// These two lines setup the WurflCloud_Client and do the device detection
		self::$instance = new Client($config, $cache);
		self::$instance->detectDevice();		
	}

	/**
	 * Returns the value of the requested capability
	 * @param string $capability_name
	 * @return mixed Value of the requested capability
	 */
	public static function get($capability_name) {
		if (self::$instance === null) self::init();
		return self::$instance->getDeviceCapability($capability_name);
	}


	public static function getInstance() {
		return self::$instance;
	}

	/**
	 * @var WurflCloud_Client_Client
	 */
	private static $instance;	
}
?>