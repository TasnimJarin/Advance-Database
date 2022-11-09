<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$c = oci_pconnect("PROJECT", "1234", "localhost/XE");  
if (!$c) {    
  $e =oci_error();    
  trigger_error('Could not connect to database: '.$e['message'],E_USER_ERROR); 
 } 
    $id=$_REQUEST['id'];
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password' ];
    $usertype=$_REQUEST['usertype'];
    
    $s = oci_parse($c, "insert into users(id,username,password,usertype) values ('$id','$username','$password','$usertype')"); 
$result = oci_execute($s);
if ($result) {
    echo "Data added Successfully !";
    exit();
}
else{
echo "Error !";
    exit();
}

}
?>





