<?php

/**
 * Boomverzorging Xavier Sobry - HomeController
 * 
 * @author Mike Sobry 
 * 
 */
		
class InboxController extends PlonkController {

	/**
	 * The views allowed for this module
	 * @var array
	 */	
	protected $views = array(
		'inbox'
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

	public function showInbox() {
		
		// Main Layout
		
			// assign vars in our main layout tpl
			$this->mainTpl->assign('pageTitle', 'Taskhub');
			$this->mainTpl->assign('pageMeta', 
					'<link rel="stylesheet" type="text/css" href="modules/inbox/css/inbox.css" />' . PHP_EOL .
					'<script type="text/javascript" src="modules/inbox/js/inbox.js"></script>');

			$this->mainTpl->assignOption('oMenu');

			$this->mainTpl->assign('inboxLink',				$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=inbox');
			$this->mainTpl->assign('dueActionsLink',		$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=dueActions');
			$this->mainTpl->assign('nextActionsLink',		$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=nextActions');
			$this->mainTpl->assign('projectsLink',			$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=projects');
			$this->mainTpl->assign('contextsLink',			$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=contexts');
			$this->mainTpl->assign('ticklerLink',			$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=tickler');
			$this->mainTpl->assign('settingsLink',			$_SERVER['PHP_SELF'] . '?' . PlonkWebsite::$moduleKey . '=settings');
			
				
		// Page Specific layout
			
			$this->pageTpl->assignOption('oChecked');
	}
	
}

// EOF