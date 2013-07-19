<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Pages extends Controller_Template {

	public function before()
	{
		parent::before();

		$this->template->nav = View::factory('components/nav');
		$this->template->description = Kohana::message('app', 'description');
	}

	public function action_home()
	{
		$this->template->content = View::factory('pages/home');
		$this->template->title = "Home";
	}

	public function action_about()
	{
		$this->template->content = View::factory('pages/about');
		$this->template->title = "About";
	}

	public function action_history()
	{
		$this->template->content = View::factory('pages/history');
		$this->template->title = "History";
	}

	public function action_contact()
	{
		$this->template->content = View::factory('pages/contact');
		$this->template->title = "Contact Us";
	}

	public function action_rush()
	{
		$this->template->content = View::factory('pages/rush');
		$this->template->title = "Join &Kappa;&Delta;&Rho;";
	}

	public function action_donate()
	{
		$this->template->content = View::factory('pages/donate');
		$this->template->title = "Donate";
	}

	public function action_confirm()
	{
		$this->template->content = View::factory('pages/donate_confirm');
		$this->template->title = "Donatation Confirmation";
	}

	public function action_brotherhood()
	{
		$this->template->title = "Brotherhood";

		// Get brotherhood
		$brothers = ORM::factory('Brother')
			->where('status', '=', 'active')
			->find_all();

		$this->template->content = View::factory('pages/brothers')
			->set('brothers', $brothers);
	}

	public function action_brother_detail()
	{
		$brother = ORM::factory('Brother')
			->where("slug", '=', $this->request->param('slug'))
			->find();

		if ( ! $brother->loaded())
		{
			throw HTTP_Exception::factory(404, "Brother ':brother' not found", array(":brother" => $this->request->param('slug')));
		}

		$this->template->title = $brother->name;

		$view = View::factory('pages/brother_detail')
			->set('brother', $brother)
			->set('offices', $brother->offices->order_by('rank')->find_all())
			->set('ajax', Request::current()->is_ajax());

		if (Request::current()->is_ajax()) {
			$this->auto_render = FALSE;
			$this->response->body($view->render());
		} else {
			$this->template->content = $view;
		}	
	}

	public function action_multimedia()
	{
		
		if( ! $facebook_data = Cache::instance()->get('facebook_album_data', FALSE)){

			$token = "BAAHaYQXUuDUBABGiY9ZAoRGaDwTMh32wQX8tLHX44ylV4ei2ugPN5LXxw6aBNeRq7ZCbpWPxkDNiMQDIigWEEzdiywUFuszSZA56M8C8qdmFDW0Po9C0kajWEY4JoijKelPOTL8QqRsW6TJsi8KWMHqaMCaT1bXjzZACCB7g0azk2M5viWfoJEF5aJvbw1cZD";
			$url = "https://graph.facebook.com/121066925714/albums?fields=photos.limit(25).fields(picture,source,name),count,name,description,link&access_token=".$token;
			
			$response = Request::factory('https://graph.facebook.com/121075995714?fields=photos.fields(id,name,picture,source),name,count&access_token='.$token)->headers('Content-Type', 'application/json')->execute();
			
			//Need to verify response!
			if($response->status() != 200)
			{
				/*
				try{
					$body = json_decode($response->body());
					$error = $body->data->error->message;
				}catch(){};

				throw new Exception()
			*/
			}

			$facebook_data = json_decode($response->body());

			Cache::instance()->set('facebook_album_data', $facebook_data, 3600);
		}

		$this->template->content = View::factory('pages/multimedia')
			->set('data', $facebook_data);
		$this->template->title = "Multimedia";
	}

	public function after()
	{
		$this->template->title = $this->template->title . " | " . Kohana::message('app', 'title');

		parent::after();
	}

}