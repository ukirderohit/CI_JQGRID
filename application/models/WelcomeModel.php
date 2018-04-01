<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class WelcomeModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAllCustomerListCount($search_field, $search_string,$lid,$lto)
    {
        $this->db->select('id','first_name','last_name','email','gender','ip_address','birth_date');
        $this->db->from('mock_data');
        if(!empty($lid)){
//            $where = "id IN $lid";
            $this->db->where_in('id',$lid);
        }
        if(!empty($lto)){
            $this->db->where('gender',$lto);
        }
//        $this->db->where_in('id ', array($lid));

        if($search_field == 'id') { $this->db->like('id', $search_string); }
//        if($search_field == 'first_name') { $this->db->like('first_name', $search_string); }
//        if($search_field == 'last_name') { $this->db->like('last_name', $search_string); }
//        if($search_field == 'email') { $this->db->like('email', $search_string); }
//        if($search_field == 'gender') { $this->db->like('gender', $search_string); }
//        if($search_field == 'ip_address') { $this->db->like('ip_address', $search_string); }
//        if($search_field == 'birth_date') { $this->db->like('birth_date', $search_string); }
//        if($search_field == 'customer_name') { $this->db->like('BaseTbl.customer_name', $search_string); }

        $query = $this->db->get();
        return count($query->result());
    }
    /**
     * This function used to get all customers list,
     * $sidx : This is the field name which you want to sort
     * $sord : This is the order of sorting ASC or DESC
     * $start : This is starting record of the page
     * $limit : This is limit how many records per page 10 or 20 or 30 as you wish
     * $search_field : The searching field title, where you want to search
     * $search_string : The searching input string
     */
    public function getAllCustomersList($sidx, $sord, $start, $limit, $search_field, $search_string,$lid,$lto)
    {
//        $this->db->select('BaseTbl.customer_id, BaseTbl.customer_name,
//tbl_state.state_name, tbl_dist.dist_name, tbl_city.city_name,
//BaseTbl.approval_status');
//        $this->db->from('tbl_customer as BaseTbl');


        $this->db->select('id');
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('email');
        $this->db->select('gender');
        $this->db->select('id');
        $this->db->select('ip_address');
        $this->db->select('birth_date');
        $this->db->from('mock_data');
        if(!empty($lid)){
//            $where = "id IN $lid";
            $this->db->where_in('id',$lid);
        }
        if(!empty($lto)){
            $this->db->where('gender',$lto);
        }
//        $this->db->where_in('id',array($lid));
        if($sidx == 'id') { $this->db->order_by('id', $sord); }
//        else if($sidx == 'first_name') { $this->db->order_by('first_name', $sord); }
//        else if($sidx == 'last_name') { $this->db->order_by('last_name', $sord); }
//        else if($sidx == 'email') { $this->db->order_by('email', $sord); }
//        else if($sidx == 'gender') { $this->db->order_by('gender', $sord); }
//        else if($sidx == 'ip_address') { $this->db->order_by('ip_address', $sord); }
//        else { $this->db->order_by('birth_date', $sord); }

        if($search_field == 'id') { $this->db->like('id', $search_string); }
//        if($search_field == 'first_name') { $this->db->like('first_name', $search_string); }
//        if($search_field == 'last_name') { $this->db->like('last_name', $search_string); }
//        if($search_field == 'email') { $this->db->like('email', $search_string); }
//        if($search_field == 'gender') { $this->db->like('gender', $search_string); }
//        if($search_field == 'ip_address') { $this->db->like('ip_address', $search_string); }
//        if($search_field == 'birth_date') { $this->db->like('birth_date', $search_string); }
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
}
