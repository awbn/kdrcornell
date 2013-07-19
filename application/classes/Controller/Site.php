<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Site extends Controller_Ajax {

	protected $_content_types = array(
		"txt"	=>	"text/plain",
		"xml"	=>	"application/xml",
		"json"	=>	"application/json"
	);

	public function before()
	{
		parent::before();
		
		$content_type = ($this->_content_types[$this->request->param('ext')]) ? $this->_content_types[$this->request->param('ext')] : $this->_content_types["txt"];

		$this->response->headers('Content-Type', $content_type);
	}

	public function action_sitemap()
	{
		// For now, this is just a static list
		$this->response->body(View::factory('site/sitemap')->render());
	}

	public function action_humans()
	{
		$this->response->body(View::factory('site/humans')->render());
	}

	public function action_robots()
	{
		$this->response->body(View::factory('site/robots')->render());
	}

	public function action_build()
	{
		$build_info = array(
			"type"				=>	"manual",
			"date"				=>	"date",
			"source"			=>	"git repo",
			"commit"			=>	"",
			"by"				=>	""
		);

		$this->response->body(json_encode($build_info));
	}

	public function after()
	{
		// Empty, to supress template
	}

}