<?php

/**
 * Boomverzorging Xavier Sobry - HomeController
 * 
 * @author Mike Sobry 
 * 
 */
		
class HomeController extends PlonkController {

	/**
	 * The views allowed for this module
	 * @var array
	 */	
	protected $views = array(
		'homepage'
	);

	
	/**
	 * The actions allowed for this module
	 * @var array
	 */
	protected $actions = array();

	
	/*
	 * Default method override
	 */
	public function doDefault() {
		
	}


	/**
	 * Our default view
	 * @return
	 */

	public function showHomepage() {
		
		// Main Layout

			// assign vars in our main layout tpl
			$this->mainTpl->assign('pageTitle', 'Boomverzorging Xavier Sobry');
			$this->mainTpl->assign('pageMeta', 
					'<link rel="stylesheet" type="text/css" href="modules/home/css/homepage.css" />' . PHP_EOL .
					'<script type="text/javascript" src="modules/home/js/home.js"></script>');

			$this->mainTpl->assign('homeUrl',			$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=home');
			$this->mainTpl->assignOption('oHomeActive');
			$this->mainTpl->assign('activiteitenUrl',	$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=activiteiten');
			$this->mainTpl->assign('contactUrl',		$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=contact');
			$this->mainTpl->assign('fotoUrl',			$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=fotos');
		// Page Specific layout

            $this->pageTpl->assign('activiteitenUrl',	$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=activiteiten');
			$this->pageTpl->assign('contactUrl',		$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=contact');
			$this->pageTpl->assign('fotoUrl',			$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=fotos');
	}
	
}

// EOF