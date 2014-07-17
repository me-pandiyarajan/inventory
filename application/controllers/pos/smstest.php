<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Smstest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('sms');
    }

    public function index()
    {
        // send SMS command
        // $this->send();

        // get credit balance
        // $this->get_balance();
    }

    public function send()
    {
        // set text
        $text   = ' Dear Customer, Thank you for being our valued customers. 
                    We are grateful for the pleasure of serving you. 
                    Please visit us again.- Saagars Furnishing';
        
        // set phone (string or array)
        $phone = array('919566200738');
        //$phone = array('919444969600','919566200738','919159251757');
        $response = $this->sms->send($text, $phone);
        print_r($response);
    }

    public function get_balance()
    {
        $response = $this->sms->get_balance();
        print_r($response);
    }

}
/* End of file example.php */
/* Location: ./application/controllers/example.php */


