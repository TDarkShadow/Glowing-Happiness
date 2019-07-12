<?php
try {
    require_once("../lib_php/initialization.inc.php");
    require_once("../lib_php/readIn.inc.php");
    $_content = readIn('../html/Core.html');
    $_smarty->assign('content', $_content);
    $_smarty->display('index.tpl');
}
catch (Exception $_e) {
	include("../lib_php/exceptionHandling.inc.php");
	echo exceptionHandling($_e,"../logs/error_log.csv");
}
?>
