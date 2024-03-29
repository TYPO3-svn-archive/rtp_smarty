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
 * Smarty plugin "typoscript"
 * -------------------------------------------------------------
 * File:    block.typoscript.php
 * Type:    block
 * Name:    TypoScript
 * Version: 1.0
 * Author:  Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
 * Purpose: Interprets the text between the tags as TypoScript, parses it and returns the result.
 * Example:	{typoscript}
 * 				10 = TEXT
 * 				10.value = hello world
 * 			{/typoscript}
 * -------------------------------------------------------------
 *
 **/


	function smarty_block_typoscript($params, $content, &$smarty) {

		// Make sure required methods exist
		if (!method_exists($smarty->cObj,'cObjGetSingle')) return FALSE;

		// Get TypoScript from $params
		$setup = tx_rtpsmarty_div::parseTypoScript($content);

		// return the TypoScript object
		if($setup[0]) return $smarty->cObj->cObjGetSingle($setup[0],$setup[1]);

	}

?>