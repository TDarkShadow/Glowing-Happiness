<?php
try {
    require_once("../lib_php/initialization.inc.php");
    $_smarty->display('index.tpl');
}
catch (Exception $_e) {
	include("../lib_php/exceptionHandling.inc.php");
	echo exceptionHandling($_e,"../logs/error_log.csv");
}
?>
