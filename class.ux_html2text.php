<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2007, Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
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

// Include custome debug class
require_once(t3lib_extMgm::extPath('rtp_smarty').'lib/class.html2text.php');

class ux_html2text extends html2text {

    var $appendLinks = false;
    var $stripLines = false;

    function _convert() {
        // Variables used for building the link list
        $this->_link_count = 0;
        $this->_link_list = '';

        $text = trim(stripslashes($this->html));

        // Run our defined search-and-replace
        $text = preg_replace($this->search, $this->replace, $text);

        // Strip any other HTML tags
        $text = strip_tags($text, $this->allowed_tags);

        // Bring down number of empty lines to 2 max
        if($this->stripLines) {
	        $text = preg_replace("/\n\s+\n/", "\n\n", $text);
	        $text = preg_replace("/[\n]{3,}/", "\n\n", $text);
        }

        // Add link list
        if ( !empty($this->_link_list) && $this->appendLinks) {
            $text .= "\n\nLinks:\n------\n" . $this->_link_list;
        }

        // Wrap the text to a readable format
        // for PHP versions >= 4.0.2. Default width is 75
        // If width is 0 or less, don't wrap the text.
        if ( $this->width > 0 ) {
            $text = wordwrap($text, $this->width);
        }

        $this->text = $text;

        $this->_converted = true;
    }

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rtp_smarty/class.ux_html2text.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rtp_smarty/class.ux_html2text.php']);
}

?>