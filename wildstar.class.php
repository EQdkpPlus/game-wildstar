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

if(!class_exists('wildstar')) {
	class wildstar extends game_generic {
		public $version			= '0.3';
		protected $this_game	= 'wildstar';
		protected $types		= array('faction','classes', 'races', 'roles');
		protected $classes		= array();
		protected $races		= array();
		protected $roles		= array();
		protected $factions		= array();
		protected $filters		= array();
		public $langs			= array('english', 'german');

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
		
		
		/**
		* Initialises filters
		*
		* @param array $langs
		*/
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
					'size'			=> 40,
					'undeletable'	=> true,
				)
			);
			return $xml_fields;
		}

		public function get_OnChangeInfos($install=false){
			$info['aq'] = array();

			//Do this SQL Query NOT if the Eqdkp is installed -> only @ the first install
			#if($install){
			#}
			return $info;
		}
	}
}
?>