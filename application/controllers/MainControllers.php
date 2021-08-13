<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
		$this->load->model('transactModel');
	}
	public function spreadSheetFormatIn(){
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="inocIn.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', '#');
		$sheet->setCellValue('B1', 'Qty');
		$sheet->setCellValue('C1', 'Unit');
		$sheet->setCellValue('D1', 'Balance');
		$sheet->setCellValue('E1', 'Type');
		$sheet->setCellValue('F1', 'Description');
		$sheet->setCellValue('G1', 'Location');
		$sheet->setCellValue('H1', 'Requested by');

		$query = $this->db->query('SELECT * from tbl_transact as t JOIN tbl_items as i on i.i_id = t.i_id WHERE t.t_type = "depo"')->result();

		$count = 2;

		foreach($query as $row)
		{
			if ($row->t_type === 'withdraw'){
				$type = 'OUT';
			}elseif($row->t_type === 'depo'){
				$type = 'IN';
			}else{
				$type = 'NEW';
			}
			$sheet->setCellValue('A' . $count, $row->t_id);

			$sheet->setCellValue('B' . $count, $row->t_qty);

			$sheet->setCellValue('C' . $count, $row->i_unit);

			$sheet->setCellValue('D' . $count, $row->t_bal);

			$sheet->setCellValue('E' . $count, $type);

			$sheet->setCellValue('F' . $count, $row->i_desc);

			$sheet->setCellValue('G' . $count, $row->t_location);

			$sheet->setCellValue('H' . $count, $row->t_requestedby);


			$count++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
	public function spreadSheetFormatOut(){
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="inocOut.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', '#');
		$sheet->setCellValue('B1', 'Qty');
		$sheet->setCellValue('C1', 'Unit');
		$sheet->setCellValue('D1', 'Balance');
		$sheet->setCellValue('E1', 'Type');
		$sheet->setCellValue('F1', 'Description');
		$sheet->setCellValue('G1', 'Location');
		$sheet->setCellValue('H1', 'Requested by');

		$query = $this->db->query('SELECT * from tbl_transact as t JOIN tbl_items as i on i.i_id = t.i_id WHERE t.t_type = "withdraw" ')->result();

		$count = 2;

		foreach($query as $row)
		{
			if ($row->t_type === 'withdraw'){
				$type = 'OUT';
			}elseif($row->t_type === 'depo'){
				$type = 'IN';
			}else{
				$type = 'NEW';
			}
			$sheet->setCellValue('A' . $count, $row->t_id);

			$sheet->setCellValue('B' . $count, $row->t_qty);

			$sheet->setCellValue('C' . $count, $row->i_unit);

			$sheet->setCellValue('D' . $count, $row->t_bal);

			$sheet->setCellValue('E' . $count, $type);

			$sheet->setCellValue('F' . $count, $row->i_desc);

			$sheet->setCellValue('G' . $count, $row->t_location);

			$sheet->setCellValue('H' . $count, $row->t_requestedby);

			$count++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
	public function spreadSheetFormatAll(){
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="inocAll.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', '#');
		$sheet->setCellValue('B1', 'Qty');
		$sheet->setCellValue('C1', 'Unit');
		$sheet->setCellValue('D1', 'Balance');
		$sheet->setCellValue('E1', 'Type');
		$sheet->setCellValue('F1', 'Description');
		$sheet->setCellValue('G1', 'Location');
		$sheet->setCellValue('H1', 'Requested by');

		$query = $this->db->query('SELECT * from tbl_transact as t JOIN tbl_items as i on i.i_id = t.i_id WHERE t.t_type = "withdraw"  or t.t_type = "depo"')->result();

		$count = 2;

		foreach($query as $row)
		{
			if ($row->t_type === 'withdraw'){
				$type = 'OUT';
			}elseif($row->t_type === 'depo'){
				$type = 'IN';
			}else{
				$type = 'NEW';
			}
			$sheet->setCellValue('A' . $count, $row->t_id);

			$sheet->setCellValue('B' . $count, $row->t_qty);

			$sheet->setCellValue('C' . $count, $row->i_unit);

			$sheet->setCellValue('D' . $count, $row->t_bal);

			$sheet->setCellValue('E' . $count, $type);

			$sheet->setCellValue('F' . $count, $row->i_desc);

			$sheet->setCellValue('G' . $count, $row->t_location);

			$sheet->setCellValue('H' . $count, $row->t_requestedby);

			$count++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
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
			$this->db->trans_begin();

			$data = array(
				'i_desc' => $this->input->post('desc'),
				'i_unit' => $this->input->post('units'),

			);

			$first = $this->db->insert('tbl_items',$data);

			$insert_id = $this->db->insert_id();

			$data1 = array(
				't_type' 		=> 'new',
				't_qty' 		=> '0',
				't_bal' 		=> '0',
				't_enteredby' 	=> $this->session->userdata('u_name'),
				'i_id' 			=> $insert_id,
			);
			$second = $this->db->insert('tbl_transact',$data1);

			if($this->db->trans_status() === FALSE || !isset($first) || !isset($second)){
				$this->db->trans_rollback();
			 }else{
				$this->db->trans_commit();
			 }

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
            $row[] = '
			<button class="btn btn-outline-primary itemEditClass bg-gradient btn-sm mx-2 rounded-pill" data-id="'.$customers->i_id.'" data-unit="'.$customers->i_unit.'" data-desc="'.$customers->i_desc.'"><i class="fas fa-pen"></i></button>
			';

            $data[] = $row;
        }
		// <button class="btn btn-outline-danger itemDeleteClass bg-gradient btn-sm rounded-pill" data-id="'.$customers->i_id.'"><i class="fas fa-trash"></i></button>
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->itemModel->count_all(),
                        "recordsFiltered" => $this->itemModel->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
	}
	// ------------------------item--------------------------------------------


	// ------------------------transact----------------------------------------
	public function getTransactItem()
	{
		$list = $this->transactModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $transact) {
            $no++;
            $row = array();
            $row[] = $transact->t_id;
            $row[] = $transact->t_qty;
            $row[] = $transact->t_bal;

			if($transact->t_type === 'new'){
				$row[] = ' <span class="text-success bg-gradient fw-normal"> + new</span>';
			}elseif($transact->t_type ==='depo'){
				$row[] = '<span class="text-primary bg-gradient fw-normal"> ↑ in</span>';
			}elseif($transact->t_type ==='withdraw'){
				$row[] = '<span class="text-danger bg-gradient fw-normal"> ↓ out</span>';
			}

            $row[] = $transact->i_unit;
            $row[] = $transact->i_desc;

			if($transact->t_ident === 'y'){
				$row[] = '<button class="btn btn-outline-primary itemDepoClass bg-gradient btn-sm me-2 rounded-pill" data-id="'.$transact->i_id.'" data-unit="'.$transact->i_unit.'" data-desc="'.$transact->i_desc.'" data-bal="'.$transact->t_bal.'" data-ident="'.$transact->t_ident.'"><i class="fas fa-plus"></i></button>
					<button class="btn btn-outline-danger itemWithdrawClass bg-gradient btn-sm rounded-pill" data-id="'.$transact->i_id.'" data-unit="'.$transact->i_unit.'" data-desc="'.$transact->i_desc.'"  data-bal="'.$transact->t_bal.'"  data-ident="'.$transact->t_ident.'"><i class="fas fa-minus"></i></button>';
			}else{
				$row[] = '';
			}

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->transactModel->count_all(),
                        "recordsFiltered" => $this->transactModel->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
	}


	public function iNew(){
		$this->db->trans_begin();

		$data = array(
			'i_desc' => $this->input->post('desc'),
			'i_unit' => $this->input->post('unit'),

		);

		$first = $this->db->insert('tbl_items',$data);

		$insert_id = $this->db->insert_id();

		if($this->input->post('qty') === '0' || $this->input->post('qty') === ''){
			$type = 'new';
		}else{
			$type = 'depo';
		}
		$data = array(
			't_type' 		=> $type,
			't_qty' 		=> $this->input->post('qty'),
			't_bal' 		=> $this->input->post('qty'),
			't_enteredby' 	=> $this->session->userdata('u_name'),
			't_ident' 		=> 'y',
			'i_id' 			=> $insert_id,
		);

		$second = $this->db->insert('tbl_transact',$data);

		if($this->db->trans_status() === FALSE || !isset($first) || !isset($second)){
			$this->db->trans_rollback();
		 }else{
			$this->db->trans_commit();
		 }

		$result = ($this->db->affected_rows() != 1) ? false : true;
		echo json_encode($result);

	}
	public function iDeposit(){
		$this->db->trans_begin();

		$first = $this->db->query('UPDATE tbl_transact set t_ident = "" where i_id = "'.$this->input->post('itemId').'" AND t_ident = "y" ');

		$data = array(
			't_type' 		=> 'depo',
			't_qty' 		=> $this->input->post('qty'),
			't_bal' 		=> $this->input->post('latestBal'),
			't_enteredby' 	=> $this->session->userdata('u_name'),
			't_ident' 		=> 'y',
			'i_id' 			=> $this->input->post('itemId'),
		);

		$second = $this->db->insert('tbl_transact',$data);

		if($this->db->trans_status() === FALSE || !isset($first) || !isset($second)){
			$this->db->trans_rollback();
		 }else{
			$this->db->trans_commit();
		 }

		$result = ($this->db->affected_rows() != 1) ? false : true;
		echo json_encode($result);

	}
	public function iWithdraw(){

		$this->db->trans_begin();

		$first = $this->db->query('UPDATE tbl_transact set t_ident = "" where i_id = "'.$this->input->post('itemId').'" AND t_ident = "y" ');

		$data = array(
			't_type' 		=> 'withdraw',
			't_qty' 		=> $this->input->post('qty'),
			't_bal' 		=> $this->input->post('latestBal'),
			't_enteredby' 	=> $this->session->userdata('u_name'),
			't_ident' 		=> 'y',
			'i_id' 			=> $this->input->post('itemId'),
		);

		$second = $this->db->insert('tbl_transact',$data);

		if($this->db->trans_status() === FALSE || !isset($first) || !isset($second)){
			$this->db->trans_rollback();
		 }else{
			$this->db->trans_commit();
		 }

		$result = ($this->db->affected_rows() != 1) ? false : true;
		echo json_encode($result);
	}
	// ------------------------transact----------------------------------------

}
