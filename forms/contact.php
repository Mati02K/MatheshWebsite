<?php 
    
    function inserti(){
    
    include_once("config.php");
    include_once("err_rep.php");
    
    if(
        isset($_POST['email']) &&
        isset($_POST['name']) &&
        isset($_POST['subject']) &&
        isset($_POST['mobno'])&& 
        isset($_POST['message']) 
        )
        {
            $mail = $_POST['email'];
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $mobile=$_POST['mobno'];
            $count=0;
            $form_errors=array();
            $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
            preg_match($email_pattern, $mail, $email_matches);
            if (!$email_matches[0]){
              $form_errors['email']= "Error in mail ID";
            }
            else{
              $count=$count+1;
            }
            if(strlen($name)==0)
            {
              $form_errors['name']= "Error in Name";
            }
            else{
              $count=$count+1;
            }
            if(strlen($subject)==0)
            {
              $form_errors['subject']= "Error in subject";
            }
            else{
              $count=$count+1;
            }
            if(strlen($message)==0)
            {
              $form_errors['msg']= "Error in Message";
            }
            else{
              $count=$count+1;
            }
           
            if(strlen($mobile)!=10)
            {
              $form_errors['mobile']= "Error in MobileNo";
            }
            else{
              $count=$count+1;
            }
           
           
            $mail = htmlspecialchars(strip_tags($mail));
            $mail =  mysqli_real_escape_string($conn, $mail);
            
            $name = htmlspecialchars(strip_tags($name));
            $name =  mysqli_real_escape_string($conn, $name);

            $subject = htmlspecialchars(strip_tags($subject));
            $subject =  mysqli_real_escape_string($conn, $subject);

            $message = htmlspecialchars(strip_tags($message));
            $message =  mysqli_real_escape_string($conn, $message);
            
           
            $mobile = htmlspecialchars(strip_tags($mobile));
            $mobile =  mysqli_real_escape_string($conn, $mobile);
           
            if($count==5){
            if($conn == TRUE)
           {
            $sql = "INSERT INTO queries(name,Email,Subject,Message,MobileNo) VALUES ('$name','$mail','$subject','$message','$mobile')";
            $sqlresult = mysqli_query($conn,$sql);
            echo "<script>window.alert('Thanks for the Enquiry Will Contact You soon.');</script>";
            echo "<script>window.location.reload();</script>";
            
           }
        else{
            echo "<script>window.alert('Problem in database');</script>";
        }
      
      }
        
        else
        {
          echo "<script>window.alert('Enter Valid Details');</script>";
         }
    

      
           
             
}}

?>