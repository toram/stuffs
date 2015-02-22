<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function wurfl_is_desktop() 
	{
		return !(Wurfl::get('is_wireless_device'));
	}

	function wurfl_get_brand() 
	{
		return Wurfl::get('brand_name');
	}

	function wurfl_get_model() 
	{
		return Wurfl::get('model_name');
	}

?>