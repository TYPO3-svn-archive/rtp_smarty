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
 * Smarty prefilter "dots"
 * -------------------------------------------------------------
 * File:    prefilter.dots.php
 * Type:    prefilter
 * Name:	Dots
 * Version: 2.0
 * Author:  Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
 * Purpose:	regex any typoscript properties inside of Smarty tags so that Smarty will not attempt to parse them
 * Example:	{$myTag typoscript.property.stdWrap.case="upper"} becomes {$myTag typoscript_DOT_property_DOT_stdWrap_DOT_case="upper"}
 * -------------------------------------------------------------
 *
 **/


	function smarty_prefilter_dots($tpl_source, &$smarty) {
		if (preg_match_all('/(\\b(?<!\\$)([\\w]+[\\.]{1}[\\w]+)+\\s*=)(?=[^}|{]*})/',$tpl_source,$typoscript)) {
			$typoscriptModified = str_replace('.','_DOT_',$typoscript[2]);
			$tpl_source = str_replace($typoscript[2], $typoscriptModified, $tpl_source);
		}
		return $tpl_source;
	}

?>