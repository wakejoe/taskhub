<?php

/**
 * Plonk - Plonk PHP Library
 * Website Class - Front Controller to any Website
 *  
 * @package		Plonk
 * @subpackage	website
 * @author		Bramus Van Damme <bramus.vandamme@kahosl.be>
 * @version		1.2 - By default includes PlonkSession and PlonkCookie
 * 					  Automatically starts a session
 * 				1.1 - Added getDB function to get a PlonkDB instance
 * 					  Now includes the version number (was missing from 1.0)
 * 				1.0 - First release
 */

class PlonkWebsite
{
	
	
	/**
	 * The version of this class
	 */
	const version = 1.1;
	
	
	/**
	 * Loaded controller
	 * @var Object
	 */
	private $controller;
	
	
	/**
	 * key in the $_GET array which holds the currently active module
	 * @var String
	 */
	static $moduleKey;
	
	
	/**
	 * Allowed Modules
	 * @var array
	 */
	private $modules;
	
	
	/**
	 * key in the $_GET array which holds the currently active view
	 * @var String
	 */
	static $viewKey;
	
	
	/**
	 * Constructor
	 * @param array $modules
	 * @return void
	 */
	public function __construct($modules, $moduleKey = 'module', $viewKey = 'view')
	{
		
		// store variables
		$this->modules 		= (array) $modules;
		self::$moduleKey	= (string) $moduleKey;
		self::$viewKey		= (string) $viewKey;
		
		try {
			
			// perform the prerequisites
			$this->performPrerequisites();
					
			// define module
			$this->defineModule();
		
			// load the controller
			$this->controller = $this->loadController();
			
			// thunderbirds.are.go (and pass the requested view along with it)
			$this->controller->execute();
			
		} catch (Exception $e) { throw $e; }
		
	}


	/**
	 * Defines the currently active module
	 * @return 
	 */
	private function defineModule() 
	{
		
		// no modules defined, don't even bother starting
		if (sizeof($this->modules) === 0)	throw new Exception('Cannot initialize website: no modules defined');

		// if module is set in URL and valid
		if ((PlonkFilter::getGetValue(self::$moduleKey) !== null) && in_array(PlonkFilter::getGetValue(self::$moduleKey), $this->modules)) {

			// store module
			define('MODULE', PlonkFilter::getGetValue(self::$moduleKey));

		// no module set
		} else {

			// redirect to the default module
			self::redirect('index.php?' . self::$moduleKey . '=' . urlencode($this->modules[0]), 301);

		}

	}
	
	
	/**
	 * Gets the used PlonkDB Instance
	 * 
	 * @return PlonkDB
	 */
	public static function getDB()
	{
		// get it and return it
		try {
			return PlonkDB::getDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		} catch(Exception $e) {
			throw new Exception($e->getMessage());
		}
		
	}
	
	
	/**
	 * Load the controller
	 * @return Object
	 */
	private function loadController() 
	{

		// check if the controller file exists
		if (!file_exists(PATH_MODULES . '/' . MODULE . '/'.strtolower(MODULE).'.php'))	throw new Exception('Cannot initialize website: module "' . MODULE . '" does not exist');

		// include the controller
		require_once(PATH_MODULES . '/' . MODULE . '/'.strtolower(MODULE).'.php');
		
		// include the DB
		require_once(PATH_MODULES . '/' . MODULE . '/'.strtolower(MODULE).'.db.php');		

		// build name of the class 
		$controller = ucfirst(MODULE).'Controller';
		
		// return new instance of the controller
		return new $controller();

	}
	
	/**
	 * Some Prerequisites to run: set the error reporting level, define the paths, include the needed files, ...
	 * @return 
	 */
	private function performPrerequisites()
	{
		
		// set errorreporting level
		if (defined('DEBUG') && (DEBUG === true)) // debug enabled
		{
			error_reporting(E_ALL);
			ini_set('display_errors', 'On');
		} 			
		else { // no debug (live server)
			error_reporting(0);
			ini_set('display_errors', 'Off');
		}


		// define paths
		DEFINE('PATH_ROOT', 	dirname(__FILE__) . '/../../..');
		DEFINE('PATH_CORE', 	PATH_ROOT . '/core');
		DEFINE('PATH_LIBRARY', 	PATH_ROOT . '/library');
		DEFINE('PATH_MODULES', 	PATH_ROOT . '/modules');
		
		
		// set Include Path
		set_include_path(get_include_path() . PATH_SEPARATOR . PATH_ROOT . PATH_SEPARATOR . PATH_LIBRARY . PATH_SEPARATOR);
		
		
		// load dependencies that every controller will need
		require_once 'plonk/website/controller.php';		// WebsiteController
		require_once 'plonk/filter/filter.php';				// PlonkFilter
		require_once 'plonk/template/template.php';			// PlonkTemplate
		require_once 'plonk/database/database.php';			// PlonkDatabase
		require_once 'plonk/cookie/cookie.php';				// PlonkCookie
		require_once 'plonk/session/session.php';			// PlonkSession
		
		// disable magic quotes
		PlonkFilter::disableMagicQuotes();
		
		// Start a session
		PlonkSession::start();
		
	}
	
	
	/**
	 * Redirects to an URL
	 * @param string $url
	 * @param int $redirectCode [optional]
	 * @param bool $exitNow [optional]
	 * @return 
	 */
	public static function redirect($url, $redirectCode = 302, $exitNow = true)
	{

		// Send header (404 needs special thingy though)!
		if ((int) $redirectCode == 404) {
			header('Refresh: 0; url=' . $url, false, 404);
		} else {
			header('Location: '.$url, false, (int) $redirectCode);
		}

		// exit now?
		if ($exitNow === true)
		{
			// We're out of here!
			die();
		}
	
	}
	
	
	/**
	 * Returns the version of this class
	 * @return double
	 */
	public static function version() 
	{
		return (float) self::version;
	}
	
	
}
// EOF