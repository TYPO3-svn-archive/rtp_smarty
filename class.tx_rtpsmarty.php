<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2006-2007 Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * @copyright 	2007 Rueegg Tuck Partner GmbH
 * @author 		Simon Tuck <stu@rtpartner.ch>
 * @link 		http://www.rtpartner.ch/
 * @package 	TYPO3 is Smarter (rtp_smarty)
 **/


class tx_rtpsmarty {

	function &smarty($localConf=array()) {

		/****
		 * Get and load Smarty
		 ****/

		tx_rtpsmarty::_getSmarty(); // Check for valid Smarty installation
		require_once(t3lib_extMgm::extPath('rtp_smarty').'/class.tx_rtpsmarty_wrapper.php'); // Get the Smarty wrapper class

		/****
		 * Create an instance of smarty
		 ****/

		// Invoke the smarty wrapper class
		$smarty = t3lib_div::makeInstance('tx_rtpsmarty_wrapper');

		// Instantiate Smarty with the current instance of the Extension class
		$smarty->startSmarty($this);

		/****
		 * Get the Smarty class vars. Smarty class vars are acquired (in order of priority) from:
		 * 1. Plugin configuration array in TYPO3_CONF_VARS (default template_dir)
		 * 2. TypoScript for the Smarty extension (if loaded) in rtp_smarty/static/setup.txt
		 * 3. Any TypoScript for rtp_smarty from the calling class, e.g. plugin.myPlugin.smarty.template_dir = ...
		 *    Both pi_base and lib/div scenario are checked for TypoScript, in the lib/div scenario the default
		 *    path to the templates directory is inherited.
		 * 4. Any TypoScript passed directly to this function
		 ****/

		 $smarty->t3_confVars['extconf']['template_dir'] = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtp_smarty']['template_dir']; // The default template_dir is defined in the plugin configuration
		 $smarty->t3_confVars['rtp_smarty'] = $GLOBALS['TSFE']->tmpl->setup['plugin.']['rtp_smarty.']; // Default Smarty configuration
		 if(is_subclass_of($this,'tslib_pibase')) { // Traditional scenario
			 $smarty->t3_confVars[$this->prefixId] = $GLOBALS['TSFE']->tmpl->setup['plugin.'][$this->prefixId.'.']['smarty.']; // Smarty configuration from the calling extension
		 } elseif(is_subclass_of($this,'tx_lib_object')) { // lib/div mvc scenario
			 $smarty->t3_confVars['lib/div']['template_dir'] = $this->getPathToTemplateDirectory(); // Defined path to templates from lib/div
			 $smarty->t3_confVars[$this->getExtensionPrefix()] = $this->controller->configurations->get('smarty.'); // Smarty configuration from the calling extension
		 }
		 $smarty->t3_confVars['local'] = $localConf;

		/****
		 * Set Smarty class vars
		 ****/

		 // Merge the various TypoScript arrays in the order defined above
		 $smarty->t3_conf = array();
		 foreach($smarty->t3_confVars as $arr) {
		 	if($arr['pathToTemplateDirectory']) $arr['template_dir'] = ($arr['pathToTemplateDirectory']); // pathToTemplateDirectory is an alias for template_dir
			$smarty->t3_conf = (is_array($arr))?array_merge($smarty->t3_conf,$arr):$smarty->t3_conf;
		 }

		 // Set Smarty class vars
		 foreach($smarty->t3_conf as $var => $value) {
			$smarty->setSmartyVar($var,$value);
		 }

		/****
		 * Save extension infos for debug screen
		 ****/

		// Save extension infos for the debug console
		 if(is_subclass_of($this,'tslib_pibase')) { // Traditional pi_base scenario
			 $smarty->t3_extVars = array(
			 	'prefixId' => $this->prefixId,
			 	'extKey' => $this->extKey,
			 	'extPath' => t3lib_extMgm::extPath($this->extKey),
			 );
		 } elseif(is_subclass_of($this,'tx_lib_object')) { // lib/div mvc scenario
			 $smarty->t3_extVars = array(
			 	'prefixId' => $this->getExtensionPrefix(),
			 	'extKey' => $this->getExtensionPrefix(),
			 	'extPath' => $this->getExtensionPath(),
			 );
		 }

		/****
		 * Set the language file for the FE translation plugin
		 ****/

		$smarty->setPathToLanguageFile($this);

		/****
		 * Return Smarty class instance
		 ****/

		return $smarty;

	}

	// Alias for tx_rtpsmarty::smarty
	function &newSmarty($localConf=array()) {
		return tx_rtpsmarty::smarty($localConf);
	}

	// Alias for tx_rtpsmarty::smarty
	function &newSmartyTemplate($localConf=array()) {
		return tx_rtpsmarty::smarty($localConf);
	}

	function _getSmarty() {
		if(!@file_exists(SMARTY_DIR.'Smarty.class.php')) {
			// Get default Smarty configuration from ext_conf
			$smarty_dir = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rtp_smarty']['smarty_dir'];
			// Find the main Smarty class file
			$smarty_dir = preg_replace('%[\\\\|/]$%m', '', $smarty_dir).'/';
			$smarty_dir = t3lib_div::getFileAbsFileName($smarty_dir,0);
			$smarty_dir = (@file_exists($smarty_dir.'Smarty.class.php'))?$smarty_dir:$smarty_dir.'libs/'; // Choose subdirectory 'libs'.
			// Check for valid Smarty installation or die!
			if(@file_exists($smarty_dir.'Smarty.class.php')) {
				define('SMARTY_DIR',$smarty_dir);
			} else {
				die('Sorry, but I can\'t find Smarty in:<br /><span style="color:red;">'.$smarty_dir.'</span><br />Please check your configuration and try again.');
			}
		}
	}


}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rtp_smarty/class.tx_rtpsmarty.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rtp_smarty/class.tx_rtpsmarty.php']);
}

?>