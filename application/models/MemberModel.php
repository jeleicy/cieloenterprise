<?php

class MemberModel extends CI_Model{

    public function MySQL_Date($value) {
        if (!is_null($value) && strpos($value,"/") !== false) {
            $date=explode("/",$value);
            return $date[2]."-".$date[1]."-".$date[0];
        } else
            return "";
    }

    public function insert_item()
    {    
        $dob=$this->input->post('dob');
        $dob=$this->MySQL_Date($dob);

        $data = array(
            'name' => $this->input->post('name'),
            'dob' => $dob,
            'email' => $this->input->post('email'),
            'favoritecolor' => $this->input->post('favoritecolor')
        );
        return $this->db->insert('members', $data);
    }

}
?>