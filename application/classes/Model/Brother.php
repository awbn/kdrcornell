<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Model_Brother extends ORM {

	// To fix
	public $image_thumbnail = "/media/img/tn_1.jpg";
	public $image = "/media/img/1.jpg";
	public $about = "Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat.";
	public $hometown = "Anywhere, USA";
	public $major = "Comp Sci";
	public $pledge_class = "alphaalphaalpha";

	protected $_has_many = array(
		'offices' => array(
			'model'   => 'Office',
			'through' => 'brother_office',
		),
	);

	public function informal_name()
	{
		$name_parts = explode(" ",$this->name);
		return $name_parts[0];
	}

}