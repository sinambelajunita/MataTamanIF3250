<?php
	
	// session_start();

	// // $_SESSION['instansi'] = $_POST['instansi'];
	// $_SESSION['email_content'] = $_POST['email_content'];
	// $_SESSION['email_subject'] = $_POST['email_subject'];
	// // $nama_instansi = $_POST['instansi'];

	// //inisialiasi
	// $email_message="";
	// $email_subject="";
	// $emai_to="";
	// if(isset($_POST['kirimemail'])){
	// 	function died($error){
	// 		// your error code can go here
	//         echo "We are very sorry, but there were error(s) found with the form you submitted. ";	 
	//         echo "These errors appear below.<br /><br />";	 
	//         echo $error."<br /><br />";	 
	//         echo "Please go back and fix these errors.<br /><br />";
	//         die();	 
	// 	}
	// 	function clean_string($string) {
	//       $bad = array("content-type","bcc:","to:","cc:","href");
	//       return str_replace($bad,"",$string);	 
	//     }

	//     // echo "nama instansi : ";
	//     // echo $_POST['nama_instansi'];

	//     //get email instansi
	// 	include "db-connector.php";
	// 	// $sql="SELECT email FROM instansi where nama_instansi='".$nama_instansi."'";
	// 	// if (!mysqli_query($con,$sql)) {
	// 	//   die('Error: ' . mysqli_error($con));
	// 	// }
	// 	// $result = $con->query($sql);
		
		

	// 	// $row = mysql_fetch_array($result);
	// 	// $email_to = $row['email'];
	// 	$email_to = "chres_tella08@yahoo.com";

	// 	$email_subject = $_SESSION['email_subject'];
	//     $email_message .= $_SESSION['email_content'];


	//     // create email headers
	//     $headers = 'From: '."\r\n".
	//     'Reply-To: '."-"."\r\n".
	//     'X-Mailer: PHP/' . phpversion();
	    
	//     mail($email_to, $email_subject, $email_message);
	    

	//  //    //ubah status aduan
	//  //    $sql="UPDATE pengaduan set status='terkirim' WHERE id_pengaduan='".$_POST['aduan_id']."'";
	//  //    if (!mysqli_query($con,$sql)) {
	// 	//   die('Error: ' . mysqli_error($con));
	// 	// }
	// 	// $result = $con->query($sql);
	    
	// 	// echo $email_to;
	// 	// echo $_POST['aduan_id'];
	// 	// echo $_POST['instansi'];

	//     mysqli_close($con);
	//     // header("Location: confirmation.php");
	//     echo "email terkirim";

	   
	// }
?>


<?php
	
	session_start();

	// $_SESSION['instansi'] = $_POST['instansi'];
	$_SESSION['email_content'] = $_POST['email_content'];
	$_SESSION['email_subject'] = $_POST['email_subject'];
	// $nama_instansi = $_POST['instansi'];

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

	    echo "nama instansi : ";
	    echo $_POST['instansi'];
	    echo "\n";

	    //get email instansi
		include "db-connector.php";
		$sql="SELECT email FROM instansi where nama_instansi='".$_POST['instansi']."'";
		echo $sql;
		$result = mysqli_query($con, $sql);

		$row = mysqli_fetch_array($result);

		$email_to = $row['email'];
		echo "emailnya : ";
		echo $email_to;
		echo "\n";
		// $email_to = "chres_tella08@yahoo.com";

		$email_subject = $_SESSION['email_subject'];
	    $email_message .= $_SESSION['email_content'];


	    // create email headers
	    $headers = 'From: '."\r\n".
	    'Reply-To: '."-"."\r\n".
	    'X-Mailer: PHP/' . phpversion();
	    
	    mail($email_to, $email_subject, $email_message);
	    
	    // echo $_POST['id_aduan'];

	    //ubah status aduan


	    $sql="UPDATE pengaduan set status='terkirim' WHERE id_pengaduan='".$_POST['id_aduan']."'";
	    if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
		}
		$result = $con->query($sql);


	    mysqli_close($con);
	    header("Location: confirmation.php");
	    // echo "email terkirim";

	   
	}
?>