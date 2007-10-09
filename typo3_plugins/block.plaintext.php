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
 * Smarty plugin "plaintext"
 * -------------------------------------------------------------
 * File:    block.plaintext.php
 * Type:    block
 * Name:    Plaintext
 * Version: 1.0
 * Author:  Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
 * Purpose: Turns HTML into plaintext using the html2text class
 * Example: {plaintext}
 *				This is a line of text
 *				This is another line of text
 *				But this will all end up on 1 line...
 *			{/plaintext}
 * Note:	To preserve linebreaks set the parameter "stripLines"
 * 			(otherwise multiple linebreaks are collapsed)
 * Note:	To append a list of links at the end of the text block as
 * 			footnotes set the parameter "appendlinks"
 * -------------------------------------------------------------
 *
 **/


 	// Include extended version of html2text class
 	require_once(t3lib_extMgm::extPath('rtp_smarty').'class.ux_html2text.php');

	function smarty_block_plaintext($params, $content, &$smarty) {
		$params = array_change_key_case($params);
		$textConversion = new ux_html2text($content);
		if($params['striplines']) $textConversion->stripLines = true;
		if($params['appendlinks']) $textConversion->appendLinks = true;
		return $textConversion->get_text();
	}

?>
