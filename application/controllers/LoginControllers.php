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
		$this->load->helper(array('form', 'url'));
		$this->load->library(['form_validation','session']);
		$this->load->database();
	}


	public function index()
	{
		$this->load->view('login');
	}

	public function login() {
		$this->load->view('main');

		// $this->form_validation->set_rules('username', 'Username', 'required');
		// $this->form_validation->set_rules('password', 'Password', 'required');
		// if ($this->form_validation->run() == FALSE) {
		// $this->load->view('login');
		// } else {

		// $username = $this->input->post('username');
		// $password = $this->input->post('password');

		// $user = $this->db->get_where('tbl_user',['u_username' => $username])->row();

		// if(!$user) {
		// $this->session->set_flashdata('login_error', 'Please check your username or password and try again.', 300);
		// redirect(uri_string());
		// }


		// if(!password_verify($password,$user->password)) {
		// $this->session->set_flashdata('login_error', 'Please check your username or password and try again.', 300);
		// redirect(uri_string());
		// }

		// $data = array(
		// 'u_id' => $user->user_id,
		// 'u_username' => $user->username,
		// );


		// $this->session->set_userdata($data);

		// $this->load->view('main');
		// echo 'Login success!'; exit;

		// }
	}

	public function logout() {

		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		redirect('loginControllers', $data);
		// $this->load->view('login', $data);
	}
}
