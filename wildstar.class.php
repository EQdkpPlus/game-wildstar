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
		public static $shortcuts = array('config');

		protected $this_game	= 'wildstar';
		protected $types		= array('classes', 'races', 'roles');
		public $icons			= array('classes', 'classes_big', 'events');
		protected $classes		= array();
		protected $races		= array();
		protected $roles		= array();
		protected $factions		= array();
		protected $filters		= array();
		public $langs			= array('english', 'german');

		protected $glang		= array();
		protected $lang_file	= array();
		protected $path			= false;
		public $lang			= false;
		public $version			= '0.2';
		
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

		public function get_OnChangeInfos($install=false){
			//classcolors
			$info['class_color'] = array(
				1	=> '#e1202d',
				2	=> '#11d328',
				3	=> '#d311b1',
				4	=> '#ebb614',
				5	=> '#ebb614',
				6	=> '#ebb614',
			);
			
			$info['aq'] = array();

			//Do this SQL Query NOT if the Eqdkp is installed -> only @ the first install
			#if($install){
			#}
			return $info;
		}
	}
}
if(version_compare(PHP_VERSION, '5.3.0', '<')) registry::add_const('short_wildstar', wildstar::$shortcuts);
?>