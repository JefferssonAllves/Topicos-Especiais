<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		
		if($this->ion_auth->user()->row()){
			$this->load->view('home/index.php');
		}else{
			redirect('/');
		}
	}

}	
