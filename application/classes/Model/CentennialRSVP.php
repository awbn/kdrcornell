<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Model_CentennialRSVP extends ORM {

	// Ticket Prices
	public static $prices = array(
		"Undergraduate" 	=> array(
			"label"		=> "2013 and younger (actives)",
			"price"		=> "$25"
			),
		"2008-2012"			=> array(
			"label"		=> "2012 - 2008",
			"price"		=> "$55"
			),
		"2007 and younger"	=> array(
			"label"		=> "2007 and older",
			"price"		=> "$85"
			)
	);

	public function rules()
	{
		return array(
			'name' => array(
				array('not_empty')
			),
			'email' => array(
				array('not_empty'),
				array('email')
			),
			'year' => array(
				array('numeric'),
				array('exact_length',array(':value',4))
			),
			'phone' => array(
				array('not_empty'),
				array('phone')
			),
			'address1' => array(
				array('not_empty')
			),
			'city' => array(
				array('not_empty')
			),
			'state' => array(
				array('not_empty')
			),
			'zip' => array(
				array('not_empty')
			),
			'fri_guests' => array(
				array('numeric')
			),
			'sat_guests' => array(
				array('numeric')
			)
		);
	}
}