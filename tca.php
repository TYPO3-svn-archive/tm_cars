<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_tmcars_vehicle'] = array (
	'ctrl' => $TCA['tx_tmcars_vehicle']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,title,comment,price_info,fuel_con,fuel_in,fuel_out,co2,daten,equipment,description,number,images,used'
	),
	'feInterface' => $TCA['tx_tmcars_vehicle']['feInterface'],
	'columns' => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'title' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.title',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'comment' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.comment',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'price_info' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.price_info',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
                'price' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.price',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
                                'eval' => 'required'
			)
		),
		'fuel_con' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.fuel_con',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'fuel_in' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.fuel_in',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'fuel_out' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.fuel_out',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'co2' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.co2',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'daten' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.daten',		
			'config' => array (
				'type' => 'text',
				'cols' => '30',	
				'rows' => '5',
			)
		),
		'equipment' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.equipment',		
			'config' => array (
				'type' => 'text',
				'cols' => '30',	
				'rows' => '5',
			)
		),
		'description' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.description',		
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'_PADDING' => 2,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly'       => 1,
						'type'          => 'script',
						'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon'          => 'wizard_rte2.gif',
						'script'        => 'wizard_rte.php',
					),
				),
			)
		),
		'number' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.number',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'images' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.images',		
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],	
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
				'uploadfolder' => 'uploads/tx_tmcars',
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'used' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:tm_cars/locallang_db.xml:tx_tmcars_vehicle.used',		
			'config' => array (
				'type' => 'check',
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, comment;;;;3-3-3, price_info, price, fuel_con, fuel_in, fuel_out, co2, daten, equipment, description;;;richtext[]:rte_transform[mode=ts], number, images, used')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);
?>