<?php

session_start();

// get hostname
$hostname = str_replace(array('randholeeresort.','firs.','ellensplace.'), '', $_SERVER['HTTP_HOST']);
 
 // block direct request to this script
if ( strpos(strtolower($_SERVER['SCRIPT_NAME']),strtolower(basename(__FILE__))) )
{
    //header("Location: index.php");
    //echo "<h4 style='text-align: center;'>You don't have right permission to access this file directly.<br>Redirecting ...</h4>";

    
    ?>
    <html>
    	<head>
    		<title>Invalid Request!</title>
    	</head>
    	<body>
    		<h4 style="text-align: center;">
    			Hey! Sorry to disappoint you but this is an invalid request!
    			<br>
    			<span style="color: red;">Redirecting ...</span>
    		</h4>
    		<script type="text/javascript">
    			setTimeout(function(){ 
    				//alert("Hello"); 
    				window.location.href = "http://<?php echo $hostname; ?>/";
    			}, 3000);
    		</script>
    	</body>
    </html>
    <?php
    exit;

}


// if config/config.php is not accessible -> exit
if(!is_file(dirname(__FILE__).'/../config/config.php'))
{
	?>
    <html>
    	<head>
    		<title>Error!</title>
    		<base href="http://<?php echo $hostname; ?>/"/>
    	</head>
    	<body>
    		<div style="margin: 0px auto; width: 460px;">
    				<img src="assets/img/500errorpage_1x.png"/>
    		</div>
    		<?php //echo dirname(__FILE__); ?>
    	</body>
    </html>
	<?php
	exit;
}

//Set document root
define('DOC_ROOT', pathinfo(__FILE__,PATHINFO_DIRNAME).'/');



require_once(DOC_ROOT.'/../config/config.php');

require_once(DOC_ROOT.'classes/NoCSRF-master/nocsrf.php');

require_once(DOC_ROOT.'classes/generic.class.php');

require_once(DOC_ROOT.'vendor/autoload.php');

require_once(DOC_ROOT.'classes/mailing.class.php');

require_once(DOC_ROOT.'classes/Db.php');

require_once(DOC_ROOT.'classes/Data.php');

//Set http path dynamically
define('HTTP_PATH', ( Generic::is_ssl() ? 'https' : 'http') . "://{$_SERVER['SERVER_NAME']}".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']));

date_default_timezone_set("Asia/Colombo");

// Dumb shit, they built a switch to turn on/off the best web logo but they could fix the rest of the junk
define('BESTWEB', true);

// Property Domains
define('PARENT_DOMAIN', 'https://freudenberg-php-2023-do.3cs.website');
define('RANDHOLEE_DOMAIN', 'https://rand-freudenberg-php-2023-do.3cs.website/');
define('FIRS_DOMAIN', 'https://firs-freudenberg-php-2023-do.3cs.website/');
define('ELLENS_DOMAIN', 'https://ellens-freudenberg-php-2023-do.3cs.website');



// establish db connection
$db = new Db($config['db']);

if(isset($pg) && !in_array($pg['page'], array('error')))
{
    $cms = new Data($db, $pg);
    
    if($pg['page'] != 'contactus')
    {
        if(!$cms->isValidPage())
        {
            header('Location: '.PARENT_DOMAIN.'page-not-found/');
            //exit;
        }        
    }

}