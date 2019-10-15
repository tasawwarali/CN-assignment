<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

			//Load composer's autoloader
			require 'vendor/autoload.php';


   class Test extends CI_Controller {  
	

   	    public function __construct()
        {
                parent::__construct();
                echo "constructor<hr>";
                $this->load->model('user_model');
        }


      public function index() { 
      	//$user_id = $this->user_model->get_id('tasawwarali4774@gmail.com');

date_default_timezone_set('Asia/Karachi');
      	
         echo "This is default function.<hr> " . date('M d, Y (l)').'<hr>'. date('h:i:s A') ;
        // print_r($user_id);
         
      } 
  
      public function hello($id,$f,$r) { 
         echo "<h1>ID : ".$id."</h1>"; 
         echo "<h1>ID : ".$f."</h1>"; 
         echo "<h1>ID : ".$r."</h1>"; 
         echo "This is hello function."; 

      } 



		public function send_email()
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

			$mail->addAddress("tasawwarali1331@gmail.com", "Recepient Name");

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
		}
   } 
?>