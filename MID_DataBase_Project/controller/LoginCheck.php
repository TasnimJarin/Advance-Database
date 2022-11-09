<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$c = oci_pconnect("PROJECT", "1234", "localhost/XE");  
if (!$c) {    
  $e =oci_error();    
  trigger_error('Could not connect to database: '.$e['message'],E_USER_ERROR); 
 } 
 $id=$_POST['id'];
 $pass=$_POST['password'];
 $s = oci_parse($c, "select id,password,usertype from users where id='$id' and password='$pass'"); 
 if (!$s) 
 {    
 $e = oci_error($c);    
  trigger_error('Could not parse statement: '. $e['message'], E_USER_ERROR); } 
  $r = oci_execute($s); 
  if(!$r) 
   {    
    $e = oci_error($s);
        trigger_error('Could not execute statement:'. $e['message'], E_USER_ERROR); 
    }
  
    echo"<center>";
     while (($data = oci_fetch_assoc($s)) != false) 
    {
        echo $data["USERTYPE"];
        if($data["USERTYPE"]=='Owner')
        {
              header("location:../view/OwnerHome.php");
        }

        else if($data["USERTYPE"]=='Customer')
        {
              header("location:../view/CustomerHome.php");
        }
		else if($data["USERTYPE"]=='Doctor')
        {
              header("location:../view/DoctorHome.php");
        }
		else if($data["USERTYPE"]=='Employee')
        {
              header("location:../view/EmployeeHome.php");
        }
        
        
        else {
            header("location:error.php");
        }
    }
    
     echo"</center>";

}

?>