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
 * Smarty plugin "typolinkURL"
 * -------------------------------------------------------------
 * File:    function.typolinkURL.php
 * Type:    function
 * Name:    Typolink URL
 * Version: 2.0
 * Author:	Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
 * Purpose: Return the URL of a typolink
 * Example:	{typolinkURL setup="lib.link" parameter="10"}
 * Note:	url and typolinkURL are identical (i.e. {url setup="lib.link"} and {url setup="lib.link"}
 * 			are interchangeable
 * Note:	You can add any property valid for the TypoScript typolink object.
 *			For example, parameter="1" or useCacheHash="1" or addQueryString.exclude="id,L" etc.
 *			For details of available parameters check the typolink documentation at:
 * 			http://typo3.org/documentation/document-library/references/doc_core_tsref/4.1.0/view/5/8/
 * Note:	The parameter "setup" will reference the global template scope, so you can pass a typoscript
 *			object which defines your link configuratiopn.
 *			For example, if your TypoScript setup contains an element lib.myLink, adding
 *			setup="lib.myLInk" will use the TypoScript configuration from lib.myLink to build the link
 * Note:	Any parameters inside the typolink tag will override the corresponding parameters in a TypoScript
 *			object. For example, {typolink setup="lib.link" parameter="10"}click here{/typolink} will use
 *			the TypoScript configuration from lib.link, but set the property 'parameter' to 10
 * Note:	If you haven't defined a title for the link the content between the tags will automatically be used
 * 			for the link title attribute.
 * -------------------------------------------------------------
 *
 **/


	function smarty_function_typolinkURL($params, &$smarty) {
		if($funcName = $smarty->getAndLoadPlugin('block','typolink')) { // Call typolink with option 'returnLast
			$params['returnLast'] = 'URL';
			return $funcName($params, '', $smarty);
		}
	}

?>