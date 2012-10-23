<?php
/**
* Facebook.Connect
* Uses the Facebook Connect API to log in a user through the Auth Component.
*
* The user MUST create a new field in their user model called 'facebook_id'
*
* @author Nick Baker <nick [at] webtechnick [dot] come>
* @link http://www.webtechnick.com
* @since 3.1.0
* @license MIT
*/
App::uses('FB', 'Facebook.Lib');
App::uses('FacebookInfo', 'Facebook.Lib');
class MetaComponent extends Component {
/**
	* Initialize, load the api, decide if we're logged in
	* Sync the connected Facebook user with your application
	* @param Controller object to attach to
	* @param settings for Connect
	* @return void
	* @access public
	*/
	public function initialize(&$Controller, $settings = array()){
		$this->Controller = $Controller;
		$this->_set($settings);
		$this->FB = new FB();
		$this->uid = $this->FB->getUser();
	}
	
	public function startup() {
    $this->Controller->set('facebook_meta', array(
		  'title' => '',
		  'description' => '',
		  'url' => '',
		  'image' => '',
		  'type' => '',
		  'site_name' => 'EDMup',
		  'locale' => 'en_US',
		));
	}
	
	public function addMeta($array = array()) {
  	$facebook_meta = $this->Controller->viewVars['facebook_meta'];
  	$facebook_meta = array_merge($facebook_meta, $array);
  	$this->set('facebook_meta', $facebook_meta);
  	return $this;
	}
  
}