<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

			//Load composer's autoloader
			require 'vendor/autoload.php';


defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{



	public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('details_model');
        $this->load->helper('url');
        $this->load->library('session');
        date_default_timezone_set('Asia/Karachi');

        if($this->session->has_userdata('name'))
        {
        	redirect("/user/profile" , "refresh");
        }
    }





	public function index()
	{
		$this->load->view('login/login');
	}




	public function login()
	{	
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if($email == null || $password == null)
		{
			redirect("/welcome/index" , "refresh");
		}


		$password = md5($password);

		$temp = $this->user_model->find($email);
		if($temp == null)
		{
			echo "error";    //user not exist
		}
		else
		{
			if($temp[0]->password == $password)
			{
				$this->session->set_userdata('name', $temp[0]->name);
				$this->session->set_userdata('email', $temp[0]->email);

				$date = date('M d, Y (l)');
				$time = date('h:i:s A');
				$this->details_model->insert_details($temp[0]->id , $date , $time);
				echo 'success';
			}
			else
			{
				echo "error";   //wrong password
			}
		}
	}





	public function signup()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if($name == null || $email == null || $password == null)
		{
			redirect("/welcome/index" , "refresh");
		}

		$temp = $this->user_model->find($email);
		if($temp == null)
		{
			
			$mail = new PHPMailer;

			//Enable SMTP debugging. 
			$mail->SMTPDebug = 3;                               
			//Set PHPMailer to use SMTP.
			$mail->isSMTP();            
			//Set SMTP host name                          
			$mail->Host = "smtp.gmail.com";
			//Set this to true if SMTP host requires authentication to send email
			$mail->SMTPAuth = true;                          
			//Provide username and password     
			$mail->Username = "tasawwarali4774@gmail.com";                 
			$mail->Password = "Mirror1331";                           
			//If SMTP requires TLS encryption then set it
			$mail->SMTPSecure = "tls";                           
			//Set TCP port to connect to 
			$mail->Port = 587;                                   


			$mail->From = "tasawwarali4774@gmail.com";
			$mail->FromName = "Tasawwar Ali";

			$mail->addAddress($email, $name);

			$mail->isHTML(true);

			$mail->Subject = "YOLO";
			$mail->Body = "<h1>Welcome To This Site</h1>";
			$mail->AltBody = "This is the plain text version of the email content";

			if(!$mail->send()) 
			{
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} 
			else 
			{
			    echo "Message has been sent successfully";
			}

			$this->user_model->insert_user($name , $email , $password);

			$this->session->set_userdata('name', $name);
			$this->session->set_userdata('email', $email);

			$date = date('M d, Y (l)');
			$time = date('h:i:s A');
			$this->details_model->insert_details($this->user_model->get_id($email) , $date , $time);
			echo 'success';
		}
		else
		{
			echo 'not';
		}
		
	}


}
