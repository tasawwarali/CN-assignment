<?php

class Details_model extends CI_Model
{
	public function insert_details($user_id , $date , $time)
	{
		$data = array(
				'user_id' => $user_id,
				'date' => $date,
				'time' => $time
			);
		$this->db->insert('details', $data);
	}


	public function get_all($user_id)
	{
		$query = $this->db->query("SELECT * FROM details WHERE user_id = ".$user_id);
        return $query->result();
	}
}


?>