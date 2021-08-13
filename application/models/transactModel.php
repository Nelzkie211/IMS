<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transactModel extends CI_Model {

    // var $table = 'tbl_items';
    var $column_order = array('t.t_id','t.t_qty','t.t_bal','t.t_type', 'i.i_unit', 'i.i_desc'); //set column field database for datatable orderable
    var $column_search = array('t.t_id','t.t_qty','t.t_bal','t.t_type', 'i.i_unit', 'i.i_desc'); //set column field database for datatable searchable
    var $order = array('t_id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('tbl_items as i');
        $this->db->join('tbl_transact as t', 'i.i_id = t.i_id');


        $i = 0;
        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

        // $this->db->select('t.t_id','t.t_qty','t.t_bal','t.t_type', 'i.i_unit', 'i.i_desc');
        // $this->db->from('tbl_transact as t');
        // $this->db->join('tbl_items as i', 'i.i_id = t.i_id','left');
        // $this->db->like('t.t_id', $term);
        // $this->db->like('t.t_qty', $term);
        // $this->db->like('t.t_bal', $term);
        // $this->db->like('t.t_type', $term);
        // $this->db->like('i.i_unit', $term);
        // $this->db->like('i.i_desc', $term);
        // if(isset($_REQUEST['order'])) // here order processing
        // {
        // $this->db->order_by($column[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        // }
        // else if(isset($this->order))
        // {
        // $order = $this->order;
        // $this->db->order_by(key($order), $order[key($order)]);
        // }

    }

    function get_datatables()
    {
        // $term = $_REQUEST['search']['value'];
        $this->_get_datatables_query();
        if($_REQUEST['length'] != -1)
        $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        // $term = $_REQUEST['search']['value'];
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('tbl_transact');
        return $this->db->count_all_results();
    }

}