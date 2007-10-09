<?php

/***************************************************************
 *  Copyright notice
 *
 *
 *	Created by Simon Tuck <stu@rtpartner.ch>
 *	Copyright (c) 2006-2007, Rueegg Tuck Partner GmbH (wwww.rtpartner.ch)
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
 *
 *	@copyright 	2006, 2007 Rueegg Tuck Partner GmbH
 *	@author 	Simon Tuck <stu@rtpartner.ch>
 *	@link 		http://www.rtpartner.ch/
 *	@package 	TYPO3 is Smarter (rtp_smarty)
 *
 ***************************************************************/

/**
 *
 * Smarty plugin "LLL"
 * -------------------------------------------------------------
 * File:    block.LLL.php
 * Type:    block
 * Name:    Translate Text
 * Version: 1.0
 * Author:  Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
 * Purpose: Translate a block of text from the current TYPO3 language library (e.g. locallang.xml)
 * Example: {LLL alt="Please enter your name" key="enter_name"}Your name{/LLL}
 * Note:	The parameter 'key' refers to the label xml file. If you do not provide a key
 * 			the content between the tags will be used as the key.
 * Note:	The 'alt' parameter enables you to provide an alternative text if no translation was found.
 * Note:	If the translated text contains Smarty variables it will be cycled through Smarty again!
 *			That means you can include Smarty tags in your language library
 * -------------------------------------------------------------
 *
 **/


	function smarty_block_LLL($params, $content, &$smarty) {

		// Make sure params are lowercase
		$params = array_change_key_case($params,CASE_LOWER);

		// Key for looking up the translation in the language file
		$key = ($params['key'])?$params['key']:$content;

		// Get the language file and/or label information from the key
		$parts = t3lib_div::trimExplode(':',$key,1);
		$parts = t3lib_div::removeArrayEntryByValue($parts,'LLL');
		$label = array_pop($parts);
		$language_file = implode(':',$parts);
		$language_file = ($language_file)?$language_file:$smarty->t3_languageFile;

		// Call the sL method from tslib_fe to translate the label
		$translation = $GLOBALS['TSFE']->sL('LLL:'.$language_file.':'.$label);

		// Exit if no translation was found
		if(!$translation) {
			trigger_error('Translation unavailable for key "'.$key.'" in language "'.$GLOBALS['TSFE']->lang.'"');
			return ($params['alt'])?$params['alt']:$content;
		}

		// If the result contains Smarty template vars run it through Smarty again
		if (preg_match('/['.quotemeta($smarty->left_delimiter).'[^'.quotemeta($smarty->right_delimiter).']*'.quotemeta($smarty->right_delimiter).'/m', $translation)) {
			return ($params['hsc'])?htmlspecialchars($smarty->display('string:'.$translation)):$smarty->display('string:'.$translation);
		} else {
			return ($params['hsc'])?htmlspecialchars($translation):$translation;
		}
	}

?>