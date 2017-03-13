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

if(!class_exists('wildstar')) {
	class wildstar extends game_generic {
		protected static $apiLevel	= 20;
		public $version				= '1.0.2';
		protected $this_game		= 'wildstar';
		protected $types			= array('factions','classes', 'races', 'roles');
		protected $classes			= array();
		protected $races			= array();
		protected $roles			= array();
		protected $factions			= array();
		protected $filters			= array();
		public $langs				= array('english', 'german');

		protected $class_dependencies = array(
			array(
				'name'		=> 'faction',
				'type'		=> 'factions',
				'admin' 	=> true,
				'decorate'	=> false,
				'parent'	=> false,
			),
			array(
				'name'		=> 'race',
				'type'		=> 'races',
				'admin'		=> false,
				'decorate'	=> true,
				'parent'	=> array(
					'faction' => array(
						'exile'		=> array(0,1,3,5,7),
						'dominion'	=> array(0,2,4,6,8),
					),
				),
			),
			array(
				'name'		=> 'class',
				'type'		=> 'classes',
				'admin'		=> false,
				'decorate'	=> true,
				'primary'	=> true,
				'colorize'	=> true,
				'roster'	=> true,
				'recruitment' => true,
				'parent'	=> array(
					'race' => array(
						0 	=> 'all',				// Unknown
						1 	=> array(1,2,3,4,5,6),	// Human
						2 	=> array(1,2,3,4,5,6),	// Cassian
						3 	=> array(1,5,6),		// Granok
						4 	=> array(1,2,3),		// Draken
						5 	=> array(2,3,4),		// Aurin
						6 	=> array(1,3,5,6),		// Mechari
						7 	=> array(1,2,3,5,6),	// Mordesch
						8 	=> array(2,4,5,6),		// Chua
					),
				),
			)
		);

		public $default_roles = array(
			1 => array(2,4,5),			# healer
			2 => array(1,3,6),			# tank
			3 => array(1,2,3,4,5,6),	# DD
		);

		protected $class_colors = array(
			1	=> '#CC0000',
			2	=> '#0066FF',
			3	=> '#FF00CC',
			4	=> '#33FFFF',
			5	=> '#FFCC00',
			6	=> '#66CC00',
		);

		protected $glang		= array();
		protected $lang_file	= array();
		protected $path			= '';
		public $lang			= false;

		protected function load_filters($langs){
			if(empty($this->classes)) {
				$this->load_type('classes', $langs);
			}
			foreach($langs as $lang) {
				$names = $this->classes[$lang];
				$this->filters[$lang][] = array('name' => '-----------', 'value' => false);
				foreach($names as $id => $name) {
					$this->filters[$lang][] = array('name' => $name, 'value' => array($id => 'class'));
				}
				$this->filters[$lang] = array_merge($this->filters[$lang], array(
					array('name' => '-----------', 'value' => false),
					array('name' => $this->glang('heavy', true, $lang), 'value' => array(1 => 'class')),
					array('name' => $this->glang('medium', true, $lang), 'value' => array(1 => 'class', 3 => 'class')),
					array('name' => $this->glang('light', true, $lang), 'value' => array(2 => 'class', 3 => 'class', 4 => 'class')),
				));
			}
		}

		public function profilefields(){
			$xml_fields = array(
				'path_class'	=> array(
					'type'			=> 'dropdown',
					'category'		=> 'character',
					'lang'			=> 'uc_path',
					'options'		=> array('-' => 'uc_path_0', 'Kundschafter'	=>	'uc_path_1', 'Wissenschaftler'	=>	'uc_path_2', 'Soldat'	=>	'uc_path_3', 'Siedler' =>	'uc_path_4'),
					'undeletable'	=> true,
					'tolang'		=> true,
				),
				'gender'	=> array(
					'type'			=> 'dropdown',
					'category'		=> 'character',
					'lang'			=> 'uc_gender',
					'options'		=> array('Male' => 'uc_male', 'Female' => 'uc_female'),
					'undeletable'	=> true,
					'tolang'		=> true
				),
				'guild'	=> array(
					'type'			=> 'text',
					'category'		=> 'character',
					'lang'			=> 'uc_guild',
					'size'			=> 32,
					'undeletable'	=> true,
				)
			);
			return $xml_fields;
		}

		public function install($install=false){
			$this->game->resetEvents();

			$arrEventIDs = array();
			$arrEventIDs[] = $this->game->addEvent($this->glang('wildstar_event_warplots'), 0, "warplot.png");
			$arrEventIDs[] = $this->game->addEvent($this->glang('wildstar_event_adventure'), 0, "raid.png");

			$this->game->resetMultiDKPPools();
			$this->game->resetItempools();
			$intItempoolID = $this->game->addItempool("Default", "Default Itempool");

			$this->game->addMultiDKPPool("Default", "Default MultiDKPPool", $arrEventIDs, array($intItempoolID));
		}
		//Guildbank
		public function guildbank_money(){
		return 	$money_data = array(
		'diamond'		=> array(
			'icon'			=> array(
				'type'		=> 'default',
				'name'		=> 'platin'
			),
			'factor'		=> 1000000,
			'size'			=> 'unlimited',
			'language'		=> $this->user->lang(array('gb_currency', 'platin')),
			'short_lang'	=> $this->user->lang(array('gb_currency', 'platin_s')),
		),
		'gold'		=> array(
			'icon'			=> array(
				'type'		=> 'default',
				'name'		=> 'gold'
			),
			'factor'		=> 10000,
			'size'			=> 2,
			'language'		=> $this->user->lang(array('gb_currency', 'gold')),
			'short_lang'	=> $this->user->lang(array('gb_currency', 'gold_s')),
		),
		'silver'	=> array(
			'icon'			=> array(
				'type'		=> 'default',
				'name'		=> 'silver'
			),
			'factor'		=> 100,
			'size'			=> 2,
			'language'		=> $this->user->lang(array('gb_currency', 'silver')),
			'short_lang'	=> $this->user->lang(array('gb_currency', 'silver_s')),
		),
		'copper'	=> array(
			'icon'			=> array(
				'type'		=> 'default',
				'name'		=> 'bronze'
			),
			'factor'		=> 1,
			'size'			=> 2,
			'language'		=> $this->user->lang(array('gb_currency', 'copper')),
			'short_lang'	=> $this->user->lang(array('gb_currency', 'copper_s')),
		)
	);}
	}
}
?>
