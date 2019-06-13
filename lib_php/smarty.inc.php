<?php
require_once("../smarty/Smarty.class.php");
$_smarty = new Smarty;
$_smarty->setTemplateDir('../templates');
$_smarty->setCompileDir('../templates_c');
$_smarty->setCacheDir('../cache');
$_smarty->setConfigDir('../configs');
//$_smarty->force_compile = true;
$_smarty->debugging = ($_SERVER['SERVER_NAME'] == 'localhost') ? 'true' : 'false';
$_smarty->caching = false;
$_smarty->cache_lifetime = 120;
?>
