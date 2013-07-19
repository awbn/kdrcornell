<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Model_Office extends ORM {

	protected $_has_one = array(
		'holder' => array(
			'model'   => 'Brother',
			'through' => 'brother_office',
		),
	);
	
}