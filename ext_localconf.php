<?php

	if (!defined ('TYPO3_MODE')) die ('Access denied.');

	// Get default vars from extension configuration
	$_EXTCONF = unserialize($_EXTCONF);

	/****
	 * Location of Smarty class files
	 ****/

	// Location of the smarty class files
	$smarty_dir = (substr($_EXTCONF['smarty_dir'], -1) == '/')?$_EXTCONF['smarty_dir']:$_EXTCONF['smarty_dir'].'/';
	$smarty_dir = preg_replace('%[\\\\|/]$%m', '', $smarty_dir).'/';
	$smarty_dir = t3lib_div::getFileAbsFileName($smarty_dir,0);
	$smarty_dir = (@file_exists($smarty_dir.'Smarty.class.php'))?$smarty_dir:$smarty_dir.'libs/'; // Choose subdirectory 'libs' if Smarty.class.php isn't found

	// Define SMARTY_DIR
	if(@file_exists($smarty_dir.'Smarty.class.php')) define('SMARTY_DIR',$smarty_dir);

	/****
	 * Default location of Smarty templates
	 ****/

	// Define default location of Smarty templates
	$TYPO3_CONF_VARS['EXTCONF'][$_EXTKEY]['template_dir'] = t3lib_div::getFileAbsFileName($_EXTCONF['template_dir'],0);

	/****
	 * Load the main rtp_smarty class
	 ****/

	require_once(t3lib_extMgm::extPath($_EXTKEY).'class.tx_rtpsmarty.php');

?>