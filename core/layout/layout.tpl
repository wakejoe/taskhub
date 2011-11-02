<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
	   Remove this if you use the .htaccess -->
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
	
	<title>{$pageTitle}</title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
	
	
	<!-- CSS: implied media="all" -->
	<link rel="stylesheet" href="core/css/style.css?v=2" media="screen" >
	
	<!-- Uncomment if you are specifically targeting less enabled mobile browsers
	<link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->
	
	<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
	<script src="core/js/libs/modernizr-2.0.6.min.js"></script>
	
	
	{$pageMeta}
	
</head>

<body>
	
	<!-- siteWrapper voor plonk -->
	<div id="container">
	
    	<header>
    	  	<h1><a href="index.php">{$pageTitle}</a></h1>
        	
        	<nav>
        	{option:oLogin}
        	login form comes here
        	{/option:oLogin}
        	{option:oMenu}
        		<a href="{$inboxLink}"><div></div>Inbox</a>
        		<a href="{$dueActionsLink}"><div></div>Due Actions</a>
        		<a href="{$nextActionsLink}"><div></div>Next Actions</a>
        		<a href="{$projectsLink}"><div></div>Projects</a>
        		<a href="{$contextsLink}"><div></div>Contexts</a>
       			<a href="{$ticklerLink}"><div></div>Tickler</a>
       			<a href="{$settingsLink}"><div></div>Settings</a>
        	{/option:oMenu}
        	</nav>
        	
    	</header>
    	
    	<div id="topToolbar">
    		<form method="post" action="#">
    		
    			<dl class="clearfix">
    				<dt><label for="taskName">Add task:</label></dt>
    				<dd><input type="text" name="taskName" id="taskName" value="" /></dd>
    				
    				<dd class="addBtn"><input type="submit" name="submitBtn" id="submitBtn" value="Add" /></dd>
    				
    				<fieldset id="taskFormOption" class="">
    				
    					<dt><label for="startDate">Start date</label></dt>
    					<dd><input type="date" name="startDate" id="startDate" value="" /></dd>
    					
    					<dt><label for="startTime">Start time</label></dt>
    					<dd><input type="time" name="startTime" id="startTime" value="" /></dd>
    					
    					<dt><label for="dueDate">Due date</label></dt>
    					<dd><input type="date" name="dueDate" id="dueDate" value="" /></dd>
    					
    					<dt><label for="stopTime">Stop time</label></dt>
    					<dd><input type="time" name="stopTime" id="stopTime" value="" /></dd>
    					
    					<dt><label for="project">Project</label></dt>
    					<dd>
    						<select name="project" id="project">
    							<option>project Zero</option>
    							<option>create new project</option>
    						</select>
    					</dd>
    					
    					<dt><label for="context">Context</label></dt>
    					<dd>
    						<select name="context" id="context">
    							<option>project Zero</option>
    							<option>create new project</option>
    						</select>
    					</dd>
    					
    				</fieldset>
    				
    			</dl>
    		</form>    		
    		
    	</div>
    	
    	
    	
    	<!-- pageContent -->
    	<div id="main" role="main" class="clearfix">
  		{$pageContent}
    	</div>
    	
  </div> <!--! end of #container -->
  
  <footer>
    
  </footer>


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='core/js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script src="core/js/plugins.js"></script>
  <script src="core/js/script.js"></script>
  <!-- end scripts-->


  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg"); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
  <![endif]-->


  <!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>

</body>
</html>