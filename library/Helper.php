<?php

class Helper
{
    /*
	 * Retrieves the Server Root
	 * Useful for server-file inclusions
	*/
	public static function getServerRoot()
	{
		return dirname(__FILE__) . '/';
	}

	/*
	 * Retrieves the Website Root
	 * Useful for client-file inclusions
	*/
	public static function getWebsiteRoot()
	{
		global $config;

		return 'https' . '://' . $_SERVER['HTTP_HOST'] . '/' . $config['rootFolder'];
	}

	/*
	 * Remove "library" string
	*/
	public static function removeLibraryString($string)
	{
		return str_replace('library/', '', $string);
	}

	/*
	 * Dump a variable in a formatted style.
	*/
	public static function dump($data)
	{
		print('<pre>' . print_r($data, true) . '</pre>');
	}
}