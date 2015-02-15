<?php
	
	session_start();

	$_SESSION['instansi'] = $_POST['instansi'];
	$_SESSION['email_content'] = $_POST['email_content'];
	$_SESSION['email_subject'] = $_POST['email_subject'];

	//inisialiasi
	$email_message="";
	$email_subject="";
	$emai_to="";
	if(isset($_POST['kirimemail'])){
		function died($error){
			// your error code can go here
 
	        echo "We are very sorry, but there were error(s) found with the form you submitted. ";	 
	        echo "These errors appear below.<br /><br />";	 
	        echo $error."<br /><br />";	 
	        echo "Please go back and fix these errors.<br /><br />";
	        die();	 
		}
		function clean_string($string) {
	      $bad = array("content-type","bcc:","to:","cc:","href");	 
	      return str_replace($bad,"",$string);	 
	    }
	    //get email instansi
		include "db-connector.php";
		$sql="SELECT email FROM instansi where nama_instansi='".$_SESSION['instansi']."'";
		if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
		}
		$result = $con->query($sql);
		
		mysqli_close($con);

		
		$email_to = "chres_tella08@yahoo.com";
		$email_subject = $_SESSION['email_subject'];
	    $email_message .= $_SESSION['email_content'];


	    // create email headers
	    $headers = 'From: '."\r\n".
	    'Reply-To: '."ga ada"."\r\n".
	    'X-Mailer: PHP/' . phpversion();
	    
	    mail($email_to, $email_subject, $email_message);
	    

	    header("Location: confirmation.php");


	   
	}
?>