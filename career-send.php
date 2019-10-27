<?php
//config variables  $email

$uploaddir = './resumes/';
$our_email = "hr@qualigencehealth.com" ; //info@elitetechindia.com digital@tetramind.in, contactus@tsushyderabad.com,contactus@tsushyderabad.com
$success_page ="index.html";
$error_page = "../erro.php"; 
$from_var = "Qualigance Health";
$server_email = "hr@qualigencehealth.com"; //contactus@tsushyderabad.com
$subject_line ="Job Application - Qualigance";
$turn_on_error_for_numeric = "0";  // 1 is error, 0 is ignore.
//***************End user defined variables::edit past here at your own risk.
//Form fields parsed:
$name       = $_POST['name'];
$email      = $_POST['email'];
$mobile     = $_POST['mobile'];
$country    = $_POST['country'];
$functional    = $_POST['functional'];

$attachment = $_POST['attachment'];

//$chgrade   = $_POST['chgrade'];

//check there is an file attachment else exit
if (empty($attachment)) {
        //redirect to error page	
header("Location: $error_page");
	}

$uploadfile =  basename($_FILES['attachment']['name']);


if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile)) {
    //File is valid, and was successfully uploaded
    $file_name = $_FILES['attachment']['name'] ;
    $file_type = $_FILES['attachment']['type'] ;    	

} else {
   //File was invalid: error out, return to form page
header("Location: $error_page");
}

//set variables for email

        $to = "$name <$our_email>"; 
        $from = "$from_var <$server_email>"; 
        $subject = "$subject_line";     
        $fileatt = "$file_name";
        $fileatttype = "$file_type"; 
        $fileattname = "$file_name";
    
        $headers = "From: $from";
// Send the other data from form submission

$form_fields = "<html>


<head></head>
<body style='background-color:#f0f0f0; padding:40px 0;'>
<table align='center' cellpadding='10' bgcolor='#FFFFFF' cellspacing='0' border='0' bordercolor='#ccc' style='width:100%; max-width:600px; font-family:Arial, Helvetica, sans-serif; font-size:13px; border:3px solid #e2e2e2;'>
    <tr>
        <td colspan='2' align='center' style='font-size:25px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;'><h2>Job Applications from Qualigance Health<h2></td>
    </tr>
    <tr>
        <td width='180' valign='top' style='border-right:1px solid #e2e2e2;border-bottom:1px solid #e2e2e2; border-top:1px solid #e2e2e2;'>Name</td>
        <td valign='top' style='border-bottom:1px solid #e2e2e2;border-top:1px solid #e2e2e2;'> ".$name." </td>
    </tr>
    <tr>
        <td width='180' valign='top' style='border-right:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;'>E-Mail</td>
        <td valign='top' style='border-bottom:1px solid #e2e2e2;'> ".$email." </td>
    </tr>
    <tr>
        <td width='180' valign='top' style='border-right:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;'>Contact No</td>
        <td valign='top' style='border-bottom:1px solid #e2e2e2;'> ".$mobile." </td>
    </tr>

    <tr>
        <td width='180' valign='top' style='border-right:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;'>Country</td>
        <td valign='top' style='border-bottom:1px solid #e2e2e2;'> ".$country." </td>
    </tr>
    <tr>
        <td width='180' valign='top' style='border-right:1px solid #e2e2e2;'>Functional Area</td>
        <td valign='top' style='border-bottom:1px solid #e2e2e2;'> ".$functional." </td>
    </tr>
</table>    

</body>
</html>";

//read file data into a variable    
        $file = fopen( $fileatt, 'rb' ); 
        $data = fread( $file, filesize( $fileatt ) ); 
        fclose( $file );

//Send the message       
       $semi_rand = md5( time() ); 
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
        $headers .= "\nMIME-Version: 1.0\n" . 
                    "Content-Type: multipart/mixed;\n" . 
                    " boundary=\"{$mime_boundary}\"";
        $message = "This is a multi-part message in MIME format.\n\n" . 
                "--{$mime_boundary}\n" . 
                "Content-Type: text/html; charset=\"UTF-8\"\n" . 
                "Content-Transfer-Encoding: 7bit\n\n" . 
                 $form_fields .
                $message . "\n\n";
        $data = chunk_split( base64_encode( $data ) );
        $message .= "--{$mime_boundary}\n" . 
                 "Content-Type: {$fileatttype};\n" . 
                 " name=\"{$fileattname}\"\n" . 
                 "Content-Disposition: attachment;\n" . 
                 " filename=\"{$fileattname}\"\n" . 
                 "Content-Transfer-Encoding: base64\n\n" . 
                 $data . "\n\n" . 
                 "--{$mime_boundary}--\n"; 
        if( mail( $to, $subject, $message, $headers ) ) {
           header("Location: $success_page"); 
        }
        else { 
          header("Location: $error_page");
        }
?>