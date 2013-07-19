<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Centennial extends Controller_Template {

    public function before()
    {
        parent::before();

        $this->template->nav = View::factory('components/nav');
        $this->template->description = Kohana::message('app', 'description');
        $this->template->kdr = Kohana::message('app', 'greek_letters');

        $this->template->title = "Beta Chapter Centennial";

        $this->facebook_link = "https://www.facebook.com/events/337450686359692/";
    }

    // Main page
    public function action_index()
    {
        // Deal with posted data
        if($_POST){
            try
            {
                $rsvp = ORM::factory("CentennialRSVP")->values($_POST);
                $rsvp->transaction_id = md5($_SERVER['REQUEST_TIME'] . $_POST['email']);
                $rsvp->ip = $_SERVER["REMOTE_ADDR"];
                $rsvp->timestamp = time();
                $rsvp->save();

                // Send Mail?
                
                $this->redirect('centennial/purchase', 302);
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors('models');
            }
        }


        $this->template->content = View::factory("pages/centennial/main")
            ->set('facebook_link', $this->facebook_link)
            ->set('prices', Model_CentennialRSVP::$prices)
            ->set('form_action', URL::site('centennial'))
            ->set('attending_link', URL::site('centennial/attending'))
            ->bind('errors', $errors);
    }

    // Purchase Tickets
    public function action_purchase()
    {

    }

    // Confirm purchase
    public function action_confirm()
    {

    }

    // Who is attending
    public function action_attending()
    {
        $attendees = ORM::factory("CentennialRSVP")
            ->where("share", "!=", "No")
            ->order_by("year", "ASC")
            ->find_all();

        $this->template->content = View::factory("pages/centennial/attending")
            ->set('attendees', $attendees)
            ->set('facebook_link', $this->facebook_link);
    }

    // Paypal postback target
    public function action_postback()
    {

    }

    // Private list of attendees
    public function action_csv()
    {

    }

    public function after()
    {
        $this->template->title = $this->template->title . " | " . Kohana::message('app', 'title');

        parent::after();
    }

}