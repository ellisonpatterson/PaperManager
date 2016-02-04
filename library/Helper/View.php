<?php

class Helper_View extends Helper
{
    /*
     * Get's the current website named defined in the config.
    */
	public static function getWebsiteName()
	{
		global $config;

		return $config['name'];
	}
}