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
 * Smarty plugin "translate"
 * -------------------------------------------------------------
 * File:    block.translate.php
 * Type:    block
 * Name:    Translate
 * Version: 2.0
 * Author:  Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
 * Purpose: Translate a block of text from the current TYPO3 language library (e.g. locallang.xml)
 * Example: {translate alt="Please enter your name" label="enter_name"}Your name{/translate}
 * Note:	The Smarty "translate" tag is an alias for the "LLL" tag
 * Note:	The parameter 'label' refers to the label xml file. If you do not provide a key
 * 			the content between the tags will be used as the key.
 * Note:	The 'alt' parameter enables you to provide an alternative text if no translation was found.
 * Note:	If the translated text contains Smarty variables it will be cycled through Smarty again!
 *			That means you can include Smarty tags in your language library
 * -------------------------------------------------------------
 *
 **/


	function smarty_block_translate($params, $content, &$smarty) {
		if($funcName = $smarty->getAndLoadPlugin('block','LLL')) { // getLL is an alias for LLL
			return $funcName($params, $content, $smarty);
		} else {
			return ($params['alt'])?$params['alt']:$content;
		}
	}

?>