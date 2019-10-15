<?php

class User extends CI_Controller
{  

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('profile_model');
        $this->load->model('user_model');
        $this->load->model('details_model');
        if(!$this->session->has_userdata('name'))
        {
        	redirect("/welcome/index" , "refresh");
        }
    }





    public function profile()
    {
    	
    	$temp = $this->profile_model->find_profile($this->session->userdata('email'));
    	if($temp == null)
    	{
    		$data =  array('first' => 'yes');
    	}
    	else
    	{
    		$data =  array('first' => 'no',
    				'profile' => $temp[0]
    			);
    	}

    	$this->load->view('user/profile' , $data);
    }







    public function profile_update()
    {	
    	$job = $this->input->post("job");
    	$school = $this->input->post("school");
    	$dob = $this->input->post("dob");
    	$portfolio = $this->input->post("portfolio");

    	if($job == null || $school == null || $dob == null)
    	{
    		echo "error";
    		return;
    	}

    	date_default_timezone_set('Asia/Karachi');

    	$temp = $this->profile_model->find_profile($this->session->userdata('email'));

    	$user_id = $this->user_model->get_id($this->session->userdata('email'));

    	if($temp == null)
    	{
    		$created_at = date('Y-m-d h:i:s');
    		$updated_at = date('Y-m-d h:i:s');
    		$data = array('job' => $job,
			    		'school' => $school,
			    		'dob' => $dob,
			    		'portfolio' => $portfolio,
			    		'created_at' => $created_at,
			    		'updated_at' => $updated_at,
			    		'user_id' => $user_id
			    		 );
    		$this->profile_model->insert_profile($data);
    		echo 'submitted';
    	}
    	else
    	{
    		$updated_at = date('Y-m-d h:i:s');
    		$data = array('job' => $job,
			    		'school' => $school,
			    		'dob' => $dob,
			    		'portfolio' => $portfolio,
			    		'updated_at' => $updated_at,
			    		
			    		 );

    		$this->profile_model->update_profile($temp[0]->id, $data);
    		echo 'updated';
    	}

    }









    public function details()
    {
    	$temp = $this->details_model->get_all($this->user_model->get_id($this->session->userdata('email')));
    	$data = array('details' => $temp);
    	$this->load->view('user/details' , $data);
    }







    
    public function logout()
    {
   		$this->session->sess_destroy();
    	redirect("/welcome/index" , "refresh");
    }

}



?>