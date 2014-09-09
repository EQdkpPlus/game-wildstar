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
$english_array =  array(
	'factions' => array(
		'exile'		=> 'Exile',
		'dominion'	=> 'Dominion'
	),
	'classes' => array(
		0	=> 'Unknown',
		1	=> 'Warrior',
		2	=> 'Spellslinger',
		3	=> 'Stalker',
		4	=> 'Esper',
		5	=> 'Medic',
		6	=> 'Engineer',
	),
	'races' => array(
		0	=> 'Unknown',
		1	=> 'Human',
		2	=> 'Cassian',
		3	=> 'Granok',
		4	=> 'Draken',
		5	=> 'Aurin',
		6	=> 'Mechari',
		7	=> 'Mordesch',
		8	=> 'Chua',
	),
	'roles' => array(
		1	=> 'Healer',
		2	=> 'Tank',
		3	=> 'Damage Dealer',
	),

	'lang' => array(
		'wildstar'					=> 'Wildstar Online',
		'game_language'				=> 'Game language',
		'heavy'						=> 'Heavy Armour',
		'medium'					=> 'Medium Armour',
		'light'						=> 'Light Armour',

		// Profile information
		'uc_path'					=> 'Path',
		'uc_gender'					=> 'Gender',
		'uc_male'					=> 'Male',
		'uc_female'					=> 'Female',
		'uc_guild'					=> 'Guild',
		'uc_race'					=> 'Race',
		'uc_class'					=> 'Class',

		// Admin Settings
		'core_sett_fs_gamesettings'	=> 'Wildstar Online Settings',
		'uc_faction'				=> 'Faction',
		'uc_faction_help'			=> 'Select the default faction',
		
		// Pfade
		'uc_path_0'					=> '-',
		'uc_path_1'					=> 'Explorer',
		'uc_path_2'					=> 'Scientist',
		'uc_path_3'					=> 'Soldier',
		'uc_path_4'					=> 'Settler',
		
		// events
		'wildstar_event_warplots'	=> 'Warplots (PVP)',
		'wildstar_event_adventure'	=> 'Adventure (5 persons)',
	),
);

?>