<?php
 /*
 * Project:		EQdkp-Plus
 * License:		Creative Commons - Attribution-Noncommercial-Share Alike 3.0 Unported
 * Link:		http://creativecommons.org/licenses/by-nc-sa/3.0/
 * -----------------------------------------------------------------------
 * Began:		2011
 * Date:		$Date$
 * -----------------------------------------------------------------------
 * @author		$Author$
 * @copyright	2006-2011 EQdkp-Plus Developer Team
 * @link		http://eqdkp-plus.com
 * @package		eqdkp-plus
 * @version		$Rev$
 * 
 * $Id$
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}
$german_array = array(
	'factions' => array(
		'exile' 	=> 'Die Verbannten',
		'dominion' 	=> 'Das Dominion'
	),
	'classes' => array(
		0	=> 'Unbekannt',
		1	=> 'Krieger',
        2	=> 'Arkanschütze',
		3	=> 'Meuchler',
		4	=> 'Esper',
		5	=> 'Sanitäter',
		6	=> 'Techpionier',
	),
	'races' => array(
		0	=> 'Unknown',
		1	=> 'Mensch',
		2	=> 'Cassianer',
		3	=> 'Granok',
		4	=> 'Draken',
		5	=> 'Aurin',
		6	=> 'Mechari',
		7	=> 'Mordesch',
		8	=> 'Chua',
	),
	'roles' => array(
		1	=> 'Heiler',
		2	=> 'Tank',
		3	=> 'Damage Dealer',
	),

	'lang' => array(
		'wildstar'					=> 'Wildstar Online',
		'game_language'				=> 'Spielsprache',
		'heavy'						=> 'Schwere Rüstung',
		'medium'					=> 'Mittlere Rüstung',
		'light'						=> 'Leichte Rüstung',

		// Profile information
		'uc_path'					=> 'Pfad',
		'uc_gender'					=> 'Geschlecht',
		'uc_male'					=> 'Männlich',
		'uc_female'					=> 'Weiblich',
		'uc_guild'					=> 'Gilde',
		
		// Pfade
		'uc_path_0'					=> '-',
		'uc_path_1'					=> 'Kundschafter',
		'uc_path_2'					=> 'Wissenschaftler',
		'uc_path_3'					=> 'Soldat',
		'uc_path_4'					=> 'Siedler',
		
		// events
		'wildstar_event_warplots'	=> 'Warplots (PVP)',
		'wildstar_event_adventure'	=> 'Abenteuer (5 Personen)',
	),
);

?>