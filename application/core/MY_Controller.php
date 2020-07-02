<?php
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('model_m'));
        $this->load->model(array('link'));
    }
}
