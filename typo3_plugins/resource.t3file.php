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
 * Smarty resource "t3file"
 * -------------------------------------------------------------
 * File:    resource.t3file.php
 * Type:    resource
 * Name:    TYPO3 Resources
 * Version:	2.0
 * Author:  Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
 * Purpose: Evaluates TYPO3 files/paths for Smarty template resources
 * Example:	{include file="t3file:EXT:my_extension/my_file.tpl"}
 * Example:	$smarty->display('t3file:EXT:my_extension/my_template.tpl');
 * -------------------------------------------------------------
 *
 **/

	function smarty_resource_EXT_source($tpl_name, &$tpl_source, &$smarty) {
	  $file = t3lib_div::getFileAbsFileName($tpl_name,0);
	  if (is_file($file)) {
	    $tpl_source = $smarty->_read_file($file);
	    return TRUE;
	  }
	  return FALSE;
	}

	function smarty_resource_EXT_timestamp($tpl_name, &$tpl_timestamp, &$smarty) {
	  $file = t3lib_div::getFileAbsFileName($tpl_name,0);
	  if (is_file($file)) {
	    $tpl_timestamp = filemtime($file);
		return TRUE;
	  }
	  return FALSE;
	}

	function smarty_resource_EXT_secure($tpl_name, &$smarty) {
		// Assume all included files are insecure
		return FALSE;
	}

	function smarty_resource_EXT_trusted($tpl_name, &$smarty) {
	  return TRUE;
	}

	// register the resource name 'EXT'
	$smarty->register_resource('EXT', array('smarty_resource_t3file_source','smarty_resource_t3file_timestamp','smarty_resource_t3file_secure','smarty_resource_t3file_trusted'));

?>