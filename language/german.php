<?php
/*	Project:	EQdkp-Plus
 *	Package:	Wildstar game package
 *	Link:		http://eqdkp-plus.eu
 *
 *	Copyright (C) 2006-2015 EQdkp-Plus Developer Team
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Affero General Public License as published
 *	by the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Affero General Public License for more details.
 *
 *	You should have received a copy of the GNU Affero General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
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
		'uc_race'					=> 'Rasse',
		'uc_class'					=> 'Klasse',

		// Admin Settings
		'core_sett_fs_gamesettings'	=> 'Wildstar Online Einstellungen',
		'uc_faction'				=> 'Fraktion',
		'uc_faction_help'			=> 'Wähle die Standard-Fraktion',
		
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