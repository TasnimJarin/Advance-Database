<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REGSTRATION PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:rgb(172, 239, 253);">

	<form name="myform"  method="post"   action="../controller/regCheck.php" >
		<div id="d1">
            
			
       </div>
             <div id="d3" >
	             <div class="c2">
		

                       <center> <legend><h2>REGSTRATION</h2></legend></center> <br/>	
					           <b>Id:</b><br/>
							   <input type="text" name="id"  value="" placeholder="Enter Id"> <br/>	 <br/>	
                               <b>Username:</b><br/>
							   <input type="text" name="username"  value="" placeholder="Enter Username"> <br/>	 <br/>	
							   <b>Password:</b><br/>
                               <input type="password" name="password" id="password" value="" placeholder="Enter Your Password" ><br/><br/>				   						   
							   <b>User Type:</b><br/>
                               <input type="radio" name="usertype" value="Owner"><b>Owner</b><br/>
                               <input type="radio" name="usertype"  value="Customer"><b>Customer</b><br/> 
							   <input type="radio" name="usertype"  value="Doctor"><b>Doctor</b><br/> 
							   <input type="radio" name="usertype"  value="Employee"><b>Employee</b><br/><br/> 
							   
							   
								

							  <input type="submit" name="submit" value="Submit" ><br/><br/> 	
							  Back to <a href="login.html">Login</a> Page

                              

				 </div>
			 </div>
			 
			 
                           
	</form>




</body>
</html>


