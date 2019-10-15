<?php


class Profile_model extends CI_Model
{
	
      
	public function find_profile($email)
	{
		$query = $this->db->query("SELECT user_profile.id , user_profile.dob , user_profile.job , user_profile.school , user_profile.portfolio  FROM user_profile INNER JOIN users ON user_profile.user_id = users.id WHERE users.email = '".$email."'");
        return $query->result();
	}




	public function insert_profile($data)
    {
        $this->db->insert('user_profile', $data);
    }




    public function update_profile($id,$data)
    {
        $this->db->update('user_profile', $data, array('id' => $id));
    }





}

?>