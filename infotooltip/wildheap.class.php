<?php
 /*
 * Project:		EQdkp-Plus
 * License:		Creative Commons - Attribution-Noncommercial-Share Alike 3.0 Unported
 * Link:		http://creativecommons.org/licenses/by-nc-sa/3.0/
 * -----------------------------------------------------------------------
 * Began:		2010
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

if(!class_exists('wildheap')) {
	class wildheap extends itt_parser {
		public static $shortcuts = array('puf' => 'urlfetcher', 'pfh' => array('file_handler', array('infotooltips')));

		public $supported_games = array('wildstar');
		public $av_langs = array('en' => 'en', 'de' => 'de', 'fr' => 'fr');

		public $settings = array(
			'itt_icon_loc' => array(
				'type' => 'hidden',
				'default' => ''),
			'itt_icon_ext' => array(
				'type' => 'hidden',
				'default' => ''),
			'itt_default_icon' => array(
				'type' => 'text',
				'default' => 'inv_misc_questionmark')
		);

		private $searched_langs = array();

		public function __destruct(){
			unset($this->searched_langs);
			parent::__destruct();
		}


		private function getItemIDfromUrl($itemname, $lang){
			$encoded_name			= urlencode($itemname);
			$link					= 'http://wildheap.com/en/complete?q='.$encoded_name;
			$data					= json_decode($this->puf->fetch($link), true);
			$itemID					= $data[0]['id'];
			$this->searched_langs[]	= $lang;
			return array($itemID);
		}

		protected function searchItemID($itemname, $lang){
			return $this->getItemIDfromUrl($itemname, $lang);
		}

		protected function getItemData($item_id, $lang, $itemname='', $type='items'){
			$item			= array('id' => $item_id);
			if(!$item_id) return null;

			$url			= 'http://wildheap.com/'.$lang.'/item/t/'.$item['id'];
			$item['link']	= $url;
			
			$data = json_decode($this->puf->fetch($url), true);
			if(isset($data['body'])){
				$content		= $data['body'];
				$template_html	= trim(file_get_contents($this->root_path.'infotooltip/includes/parser/templates/wildstar_popup.tpl'));
				$template_html	= str_replace('{ITEM_HTML}', $content, $template_html);
				$item['html']	= $template_html;
				$item['lang']	= $lang;
				$item['icon']	= $data['icon'];
				$item['color']	= $data['quality'];
				$item['name']	= $data['name'];
			}else{
				$item['baditem'] = true;
			}
			return $item;
		}
	}
}
?>