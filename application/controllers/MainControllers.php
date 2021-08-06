<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainControllers extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct() {
		parent::__construct();


	}
	public function index()
	{
		redirect("/MainControllers/main");
		// $this->load->view('main');
		// redirect("MainControllers","refresh");
		// $this->load->view('error');

	}
	public function main()
	{
		$this->session->set_flashdata('error','');
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in))
		{
			#user not logged in
			// $this->load->view('login');
			redirect('../IMS');

		}
		else
		{
			// redirect('/main');

			$this->load->view('main');
			#user Logged in
			// $this->load->view("viewname",$data);
		}
		// // $this->load->view('login');
		// $this->load->view('main');
	}
	public function home()
	{
		$data = array();
		$data['respond'] = '<div class="container-lg">
		<div class="row d-flex align-items-center">
			<div class="col-md-6">
			</div>
			<div class="col-md-6">
				<h1 class="spacing-1"><span class="text-danger fs-1 fw-bold">I</span>nventory</h1>
				<h1><span class="text-danger fs-1 fw-bold">M</span>anagement</h1>
				<h1><span class="text-danger fs-1 fw-bold">S</span>ystem</h1>
			</div>
		</div>
	</div>;';


		echo json_encode($data);
	}

}
