<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2007 Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
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

// Include TypoScript parser class
require_once(PATH_t3lib.'class.t3lib_tsparser.php');

class tx_rtpsmarty_div {

	// Set appropriate caching for cHash and no_cache
	function getCacheID($cache_id = null) {
		// If caching is disabled in TYPO3 make sure it's disabled in Smarty as well
		if($GLOBALS['TSFE']->no_cache || t3lib_div::_GP('no_cache')) {
			$this->caching = false;
			return; // Exit here
		}
		// If cHash is set, use it for the cache_id
		if(t3lib_div::_GP('cHash')) {
			return t3lib_div::_GP('cHash');
		}
		// Otherwise create a unique cache_id from POST/GET vars
		// TODO: Observe how well Smarty caching works in the context of TYPO3. Disabling caching is generally recommended...
		return ($cache_id)?$cache_id:t3lib_div::shortMD5(serialize(array_merge(t3lib_div::_GET(),t3lib_div::_POST())));
	}

	// Turns yes/no, true/false, on/off into booleans. !IMPORANT
	function booleanize($value)  {
        if (preg_match("/^(on|true|yes)$/i", trim($value))) {
            $value = true;
        } elseif (preg_match("/^(off|false|no)$/i", trim($value))) {
            $value = false;
        }
        return $value;
	}

	// Get path from location to location
	function getPathFromTo($sourceDir,$targetDir) {

		if (!$sourceDir || !$targetDir) return $targetDir;

		$targetDir = tx_rtpsmarty_div::getFileAbsName($targetDir);
		$sourceDir = tx_rtpsmarty_div::getFileAbsName($sourceDir);

		preg_match_all('%([^\\\\|/]*)%', $targetDir, $targetDirInfo, PREG_PATTERN_ORDER);
		$targetDirs = array_filter($targetDirInfo[0]);

		preg_match_all('%([^\\\\|/]*)%', $sourceDir, $sourceDirInfo, PREG_PATTERN_ORDER);
		$sourceDirs = array_filter($sourceDirInfo[0]);

		$diffDirsUp = array_diff($targetDirs,$sourceDirs);
		if($diffDirsUp) {
			$diffDirsUp = implode('/',$diffDirsUp);
		}

		$diffDirsDown = array_diff($sourceDirs,$targetDirs);
		if($diffDirsDown) {
			$diffDirsDown = array_map(create_function('$dir', 'return "..";'), $diffDirsDown);
			$diffDirsDown = implode('/',$diffDirsDown).'/';
		}
		return $diffDirsDown.$diffDirsUp;
	}

	// Retrieves a TypoScript object from the global setup scope ($GLOBALS['TSFE']->tmpl->setup)
	function getTypoScriptFromTMPL($key) {
		if(!$key) return false;
		$ts_parser = t3lib_div::makeInstance('t3lib_tsparser');
		if ($setup = $ts_parser->getVal($key,$GLOBALS['TSFE']->tmpl->setup)) return $setup;
		return false;
	}

	// Turns an array (assumed to be TypoScript Parameters) into
	// text. Any occurences of _DOT_ (see prefilter dots) are replaced with a dot (.)
	function makeTypoScriptFromArray($params) {
		foreach($params as $param => $value) {
			$return .= str_replace('_DOT_','.',$param).' = '.$value.chr(10);
		}
		return $return;
	}

	// Parses a block of text (assumed to be TypoScript) and, if successful,
	// returns an array:
	// $setup[0]	The TypoScript object, e.g. IMAGE or TEXT etc.
	// $setup[1]	The configuration array of the object
	function parseTypoScript($typoscript) {
		if(!$typoscript) return false;
		if (is_array($typoscript)) $typoscript = tx_rtpsmarty_div::makeTypoScriptFromArray($typoscript);
		$ts_parser = t3lib_div::makeInstance('t3lib_tsparser');
		$ts_parser->parse($typoscript);
		return ($ts_parser->setup)?$ts_parser->setup:false;
	}

	// General function to return TypoScript from plugin params
	// The special param 'setup' is assumed to reference a TypoScript object from the global scope
	function getTypoScriptFromParams($params) {
		if($params['setup']) {
			$setup = tx_rtpsmarty_div::getTypoScriptFromTMPL($params['setup']);
			unset($params['setup']);
		}
		if($params) $params = tx_rtpsmarty_div::parseTypoScript($params); // Create a TypoScript array from $params
		if($params && $setup) $setup[1] = t3lib_div::array_merge_recursive_overrule($setup[1],$params,false,true); // Merge $setup & $params
		return ($setup)?$setup:array(1 => $params);
	}

	// Get an absolute file/dir reference (trailing slashes are stripped)
	function getFileAbsName($filename) {
		return ($location = t3lib_div::getFileAbsFileName($filename,0))?preg_replace('%([\\\\|/]*$)%', '', $location):$filename;
	}

}

?>