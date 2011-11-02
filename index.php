<?php

/**
 * Taskhub - Index file
 * 
 * @author Mike Sobry
 * 
 */

// include project specific includes
require_once './core/includes/config.php';
require_once './core/includes/functions.php';

// include Plonk & PlonkWebsite
require_once './library/plonk/plonk.php';
require_once './library/plonk/website/website.php';

// Gentlemen, start your engines!
try {
	
	// This is the real deal here :-)
	$website = new PlonkWebsite(
		array( 'inbox', 'dueActions','nextActions', 'Projects', 'contexts','tickler','settings' )
	);
	
} catch (Exception $e) { 	// Ooops, somehing went wrong ...
	if (defined('DEBUG') && (DEBUG === true))
	{			
		echo '<h1>Exception Occured</h1><pre>';
		throw $e;
	} else exit('There was an error with processing your request - Please retry.');
}

// EOF - Yes, that's it! :-)