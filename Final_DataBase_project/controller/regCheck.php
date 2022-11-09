<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $NameErr = $idErr = $unwordErr = $passErr = $userErr = "" ;

    $id = ""; 
    $userName= "";
    $Password= "";
    $user = ""; 
$c = oci_pconnect("PROJECT", "1234", "localhost/XE");  
if (!$c) {    
  $e =oci_error();    
  trigger_error('Could not connect to database: '.$e['message'],E_USER_ERROR); 
 }
 if(isset($_POST["submit"]))
 {
    $id=$_REQUEST['id'];
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password' ];
    $usertype=$_REQUEST['usertype'];

     if(empty($id)) 
     {
       $idErr = "Please fill up your Id properly";
     }
     else
     {
       $uid= $id;
     }
     if(empty($username)) 
     {
        $unwordErr = "Please fill up your UserName properly";
     }
     else
     {
        $userName= $username;
     }
     if(empty($password)) 
     {
        $passErr = "Please fill up your Password properly";
     }
     else
     {
        $password= $password;
     }
   
    if($username!= "" )
        {
			if($id != "" )
            {
                if($password != "" )
                   {
                    if(isset($usertype) )
                     {
			       
    $s = oci_parse($c, "insert into users(id,username,password,usertype) values ('$id','$username','$password','$usertype')"); 
$result = oci_execute($s);
if ($result) {
    header("location:../view/Login.html");
    exit();
}
else{
echo "Error !";
    exit();
}
                      
                     }
                   }
                }
        }

 
}
}

?>





