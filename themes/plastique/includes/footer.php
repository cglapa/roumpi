            <footer id="bottom">
                <div class="wrap">
	                <small>&copy; <?php echo date('Y'); ?> <?php echo site_name(); ?>.</small>
	                    
	                <ul role="navigation">
	                    <li><a href="<?php echo rss_url(); ?>">RSS</a></li>
	                    <li><a href="<?php echo twitter_url(); ?>">@<?php echo twitter_account(); ?></a></li>
	                    
	                    <?php if(user_authed()): ?>
	                    <li><a href="<?php echo admin_url(); ?>" title="Administrez">Espace membres</a></li>
	                    <?php endif; ?>
	                   <?php //echo get_last_tweet(); ?>
			    <li><a href="/mentions-legales.html">Mentions légales</a></li>
	                    <li><a href="/" title="Go back to my website.">Accueil</a></li>
	                </ul>
	                
	                <a id="attribution" title="Fièrement propulsé par Roumpi" href="//julienbarrier.fr/roumpi">Propulsé par Roumpi</a>

<div id="pub"><a href="http://www.backlinks.com/?aff=58769" target="_blank" class="annonce">Annonces commerciales :</a>
<?php
// THE FOLLOWING BLOCK IS USED TO RETRIEVE AND DISPLAY LINK INFORMATION.
// PLACE THIS ENTIRE BLOCK IN THE AREA YOU WANT THE DATA TO BE DISPLAYED.

// MODIFY THE VARIABLES BELOW:
// The following variable defines whether links are opened in a new window
// (1 = Yes, 0 = No)
$OpenInNewWindow = "1";

// # DO NOT MODIFY ANYTHING ELSE BELOW THIS LINE!
// ----------------------------------------------
$BLKey = "SEW1-93R9-7WW9";

if(isset($_SERVER['SCRIPT_URI']) && strlen($_SERVER['SCRIPT_URI'])){
    $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_URI'].((strlen($_SERVER['QUERY_STRING']))?'?'.$_SERVER['QUERY_STRING']:'');
}

if(!isset($_SERVER['REQUEST_URI']) || !strlen($_SERVER['REQUEST_URI'])){
    $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'].((isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']))?'?'.$_SERVER['QUERY_STRING']:'');
}

$QueryString  = "LinkUrl=".urlencode(((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on')?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$QueryString .= "&Key=" .urlencode($BLKey);
$QueryString .= "&OpenInNewWindow=" .urlencode($OpenInNewWindow);


if(intval(get_cfg_var('allow_url_fopen')) && function_exists('readfile')) {
    @readfile("http://www.backlinks.com/engine.php?".$QueryString); 
}
elseif(intval(get_cfg_var('allow_url_fopen')) && function_exists('file')) {
    if($content = @file("http://www.backlinks.com/engine.php?".$QueryString)) 
        print @join('', $content);
}
elseif(function_exists('curl_init')) {
    $ch = curl_init ("http://www.backlinks.com/engine.php?".$QueryString);
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_exec ($ch);

    if(curl_error($ch))
        print "Error processing request";

    curl_close ($ch);
}
else {
    print "It appears that your web host has disabled all functions for handling remote pages and as a result the BackLinks software will not function on your web page. Please contact your web host for more information.";
}
?></div>

	             </div>
            </footer>

<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://julienbarrier.fr/piwik/" : "http://julienbarrier.fr/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://julienbarrier.fr/piwik/piwik.php?idsite=3" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
    </body>
</html>
