<?php

/**
 * Plonk - Plonk PHP Library
 * HTTP Class - class to fetch data over HTTP
 *  
 * @package		Plonk
 * @subpackage	http
 * @author		Bramus Van Damme <bramus.vandamme@kahosl.be>
 * @version		1.0
 */

class PlonkHTTP {
	
	/**
	 * The version of this class
	 * @var double
	 */
	const version = 1.0;
	
	/**
	 * Get content from an URL.
	 *
	 * @return	string					The content.
	 * @param	string $url				The URL of the webpage that should be retrieved.
	 * @param	string $returnType		The return type. Possible values are string, json
	 * @param	array $extraOptions		Extra cURL options one wants to set/overwrite
	 */
	public static function get($url, $returnType = 'string', $extraOptions = array()) {
		
		// check if curl is available
		if(!function_exists('curl_init')) throw new Exception('This method requires cURL (http://php.net/curl), it seems like the extension isn\'t installed.');

		// set options
		$options[CURLOPT_URL] = (string) $url;
		$options[CURLOPT_USERAGENT] = 'PlonkHTTP '. self::version;
		$options[CURLOPT_FOLLOWLOCATION] = true;
		$options[CURLOPT_RETURNTRANSFER] = true;
		$options[CURLOPT_TIMEOUT] = 20;
		
		// inject extra options
		foreach((array) $extraOptions as $k => $v) $options[$k] = $v;
		
		// init
		$curl = @curl_init();

		// set options
		@curl_setopt_array($curl, $options);

		// execute
		$response = @curl_exec($curl);

		// fetch errors
		$errorNumber = @curl_errno($curl);
		$errorMessage = @curl_error($curl);

		// close
		@curl_close($curl);

		// validate
		if($errorNumber != '') throw new Exception($errorMessage);

		// return the content
		switch ($returnType) {
			
			case 'json':
			case 'array':
				if (!function_exists('json_decode'))  throw new Exception('Cannot return the content as JSON. Please make sure that you are running PHP 5.2.0 or newer');
				return json_decode($response, ($returnType == 'array'));
			break;
			
			case 'string':
			default:
				return (string) $response;
			break;
			
		}
	}
	
	
	/**
	 * Gets the version of this class
	 * @return double
	 */
	public static function version() {
		return (float) self::version;
	}
	
}

// EOF