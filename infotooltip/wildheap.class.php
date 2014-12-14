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