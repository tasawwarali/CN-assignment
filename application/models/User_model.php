<?php

class User_model extends CI_Model
{
	
      
	public function find($email)
	{
		$query = $this->db->query("SELECT * FROM USERS WHERE EMAIL = '" . $email . "'");
        return $query->result();
	}

    public function get_id($email)
    {
        $query = $this->db->query("SELECT id FROM USERS WHERE EMAIL = '" . $email . "'");
        $t = $query->result();
        return $t[0]->id;
    }




    public function insert_user($n , $e , $p)
    {
        $p = md5($p);

        $data = array(
            'name'=>$n,
            'email'=>$e,
            'password'=>$p
        );

        $this->db->insert('users', $data);
    }

    public function update_user($id , $n , $e , $p)
    {
        $p = md5($p);
        $data = array(
            'name'=>$n,
            'email'=>$e,
            'password'=>$p
        );

        $this->db->update('users', $data, array('id' => $id));
    }

}



