<?php

class MemberModel extends CI_Model{

    public function MySQL_Date($value) {
        if (!is_null($value) && strpos($value,"/") !== false) {
            $date=explode("/",$value);
            return $date[2]."-".$date[1]."-".$date[0];
        } else
            return "";
    }

    public function get_itemCRUD(){
        if(!empty($this->input->get("search"))){
          $this->db->like('title', $this->input->get("search"));
          $this->db->or_like('description', $this->input->get("search")); 
        }
        $query = $this->db->get("members");
        return $query->result();
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


    public function update_item($id) 
    {
        $data=array(
            'title' => $this->input->post('title'),
            'description'=> $this->input->post('description')
        );
        if($id==0){
            return $this->db->insert('members',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('members',$data);
        }        
    }


    public function find_item($id)
    {
        return $this->db->get_where('members', array('id' => $id))->row();
    }


    public function delete_item($id)
    {
        return $this->db->delete('members', array('id' => $id));
    }
}
?>