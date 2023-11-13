<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$this->load->view('login/index');
	}
    public function logar(){
        if(!$this->input->post()){
            redirect('/');
        }
        $identity = $this->input->post()['identity'];
        $password = $this->input->post()['password'];
        $remember = FALSE;

        if($this->ion_auth->login($identity, $password, $remember)){
            $this->load->view('home/index.php');
        }else{
            redirect('/');
        }
    }
    public function logout(){
        $this->ion_auth->logout();
        redirect('/');
    }
}	
