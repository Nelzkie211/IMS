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
		$this->load->database();
		$this->load->model('itemModel');
	}
	public function index()
	{
		redirect("/MainControllers/main");

	}
	public function main()
	{
		$this->session->set_flashdata('error','');
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in != TRUE || empty($logged_in))
		{

			redirect('../IMS');

		}
		else
		{

			$this->load->view('main');

		}
	}

	// ------------------------item--------------------------------------------
	public function addItem()
	{
		if($this->input->post('itemId') !== '' ){
			$data = array(
				'i_desc' => $this->input->post('desc'),
				'i_unit' => $this->input->post('units'),

			);

			$this->db->where('i_id',$this->input->post('itemId'));
			$this->db->update('tbl_items',$data);

			$result = ($this->db->affected_rows() != 1) ? false : true;
			echo json_encode($result);

		}else{
			$data = array(
				'i_desc' => $this->input->post('desc'),
				'i_unit' => $this->input->post('units'),

			);

			$this->db->insert('tbl_items',$data);

			$result = ($this->db->affected_rows() != 1) ? false : true;
			echo json_encode($result);
		}


	}
	public function delItem(){


		$this->db->where('i_id',$this->input->post('itemId'));
		$this->db->delete('tbl_items');

		$result = ($this->db->affected_rows() != 1) ? false : true;
		echo json_encode($result);
	}

	public function getItem()
	{
		$list = $this->itemModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $customers->i_id;
            $row[] = $customers->i_unit;
            $row[] = $customers->i_desc;
            $row[] = '<button class="btn btn-outline-primary itemEditClass bg-gradient btn-sm me-3 rounded-pill" data-id="'.$customers->i_id.'" data-unit="'.$customers->i_unit.'" data-desc="'.$customers->i_desc.'"><i class="fas fa-pen"></i></button><button class="btn btn-outline-danger itemDeleteClass bg-gradient btn-sm rounded-pill" data-id="'.$customers->i_id.'"><i class="fas fa-trash"></i></button>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->itemModel->count_all(),
                        "recordsFiltered" => $this->itemModel->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
	}
	// ------------------------item--------------------------------------------

}
