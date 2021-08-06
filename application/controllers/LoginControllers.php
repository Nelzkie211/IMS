<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginControllers extends CI_Controller {

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
		ob_start();
		$this->load->helper(array('form', 'url'));
		$this->load->library(['form_validation','session']);
		$this->load->database();

	}


	public function index()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in))
		{
			#user not logged in
			$this->load->view('login');
		}
		else
		{
			redirect('/main');
			#user Logged in
			// $this->load->view("viewname",$data);
		}
		// $this->load->view('login');
	}

	public function login() {

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($username === ""){
			$this->session->set_flashdata('error','Please input the field.');
			redirect('../IMS');
		}else{

			$result = $this->db->get_where('tbl_user',['u_username' => $username])->row();

			if($result != null) {
				if ($result->u_password === $password) {
					$data = array(
						'u_id' => $result->u_id,
						'u_name' => $result->u_name,
						'u_username' => $result->u_username,
						'logged_in' => TRUE
					);


					$this->session->set_userdata($data);
					redirect('/main','refresh');
				}else{
					$this->session->set_flashdata('error','Oops! wrong password.');
					redirect('../IMS');
				}
			}else{
				$this->session->set_flashdata('error','username not found.');
				redirect('../IMS');
			}

		}



	}

	public function logout() {

		$this->load->driver('cache');
		$this->session->sess_destroy();
		$this->cache->clean();
		ob_clean();
		redirect('./');
	}
}
