<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Tomita Militaru <militarutomita@gmail.com>
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
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'TM Cars' for the 'tm_cars' extension.
 *
 * @author	Tomita Militaru <militarutomita@gmail.com>
 * @package	TYPO3
 * @subpackage	tx_tmcars
 */
class tx_tmcars_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_tmcars_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_tmcars_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'tm_cars';	// The extension key.
	var $pi_checkCHash = true;
        var $templateCode;
        var $javascript;
        var $jQueryUI;
        var $jQuery_multifile;
        var $style;
        var $uploadDir = 'uploads/tx_tmcars/';
        var $fileFunctions;
        var $jQuery_validate;
        
        function init() {
            $this->pi_setPiVarDefaults();
	    $this->pi_loadLL();
            
            /*
            * Fetch the template file
            */

            $template = $this->conf['templateFile'] ? $this->conf['templateFile'] : 'EXT:tm_cars/res/template.html';
            $this->templateCode = $this->cObj->fileResource($template);
        }
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->init();
		
	
		$content= $this->getListView();
	
		return $this->pi_wrapInBaseClass($content);
	}
        
        function getListView() {
            $template = $this->cObj->getSubpart($this->templateCode, '###TEMPLATE_LIST###');
            
            $markContentArray = array(
                '###HEADER###' => $this->pi_getLL('header'),
                '###PAGE###' => $this->pi_getLL('page'),
                '###SORT_LIST###' => $this->pi_getLL('sort_list'),
                '###BRAND###' => $this->pi_getLL('brand'),
                '###PRICE###' => $this->pi_getLL('price'),
                '###DETAILS###' => $this->pi_getLL('details')
            );
            
            $template = $this->cObj->substituteMarkerArray($template, $markContentArray);
            
            $cars = $this->getRecords();
            $subContent = '';
            $subTemplate = $this->cObj->getSubpart($template, '###CARS###');
            
            foreach($cars as $car) {
                $subMarkerArray = array(
                    '###CAR_TITLE###' => $car['title'],
                    '###CAR_COMMENT###' => $car['comment'],
                    '###CAR_PRICE_INFO###' => $car['price_info'],
                    '###CAR_FUEL_CON###' => $car['fuel_con'],
                    '###CAR_FUEL_IN###' => $car['fuel_in'],
                    '###CAR_FUEL_OUT###' => $car['fuel_out'],
                    '###CAR_CO2###' => $car['co2'],
                    '###CAR_DATEN###' => $car['daten'],
                    '###CAR_EQUIPMENT###' => $car['equipment'],
                    '###CAR_DESCRIPTIO###' => $car[''],
                    '###CAR_NUMBER###' => $car['number'],
                    '###CAR_USED###' => $car['used'] == 1 ? $this->pi_getLL('used') : $this->pi_getLL('new'),
                    '###CAR_PRICE###' => $car['price'],
                    '###CAR_###' => $car[''],
                    '###CAR_###' => $car[''],
                    '###CAR_###' => $car[''],
                    
                    
                );
                $subContent .= $this->cObj->substituteMarkerArray($subTemplate, $subMarkerArray);
            }
            
            $content = $this->cObj->substituteSubpart($template, '###CARS###', $subContent);
            return $content;
        }
        
        function getSingleView($uid) {
            $template = $this->cObj->getSubpart($this->templateCode, '###TEMPLATE_SINGLE###');
            
            $markContentArray = array(
                '###HEADER###' => $this->pi_getLL('header'),
            );
            
            $content = $this->cObj->substituteMarkerArray($template, $markContentArray);
            return $content;
        }
        
        function getRecords() {
            $records = array();
            
            $fields = '*';
            $table = 'tx_tmcars_vehicle';
            $where = '1' . $this->cObj->enableFields($table);
            
            $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
                    $fields, $table, $where
                    );
            
            while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
                $records[] = $row;
            }
            $GLOBALS['TYPO3_DB']->sql_free_result($res);
            t3lib_utility_Debug::debug($records);
            return $records;
        }
        
        function getRecord($uid) {
            $table = 'tx_tmcars_vehicle';
            $fields = '*';
            $where = 'uid = ' . $uid . $this->cObj->enableFields($table);
            
            $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
                    $fields, $table, $where
                    );
            $row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
            $GLOBALS['TYPO3_DB']->sql_free_result($res);
            
            return $row;
        }
        
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tm_cars/pi1/class.tx_tmcars_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/tm_cars/pi1/class.tx_tmcars_pi1.php']);
}

?>