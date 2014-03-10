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
		'exile' 	=> 'Exile',
		'dominion' 	=> 'Dominion'
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
		1 => array(2,4,5),	# healer
		2 => array(1,3,6),	# tank
		3 => array(1,2,3,4,5,6),	# DD
	),

	'lang' => array(
		'wildstar'	=> 'Wildstar Online',
		'heavy' => 'Heavy Armour',
		'medium' => 'Medium Armour',
		'light' => 'Light Armour',
		'role1' => 'Healer',
		'role2' => 'Tank',
		'role3' => 'Damage Dealer',		

		// Profile information
		'uc_path'					=> 'Path',
		'uc_gender'					=> 'Gender',
		'uc_male'					=> 'Male',
		'uc_female'					=> 'Female',
		'uc_guild'					=> 'Guild',
		
		// Pfade
		'uc_path_0' => '-',
		'uc_path_1' => 'Explorer',
		'uc_path_2' => 'Scientist',
		'uc_path_3' => 'Soldier',
		'uc_path_4' => 'Settler',
	),
);

?>