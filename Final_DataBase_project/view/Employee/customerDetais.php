<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer Home  PAGE</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    
    </head>
<body style="background-color:rgb(170, 237, 250);">
    <form>
     
    <center><h1>Customer Details</h1>
     <a href="../EmployeeHome.php"><h3>Back</h3></a></center> 
       
   </form>
   <form action="cus1.php">
    <input type="submit" value="1. Find those customers who are not located in the same city as the Employee.Return Order_ID, Customer_Name, Customer_ID (M_Order table), Employee_ID (M_Order table)" />
    </form>
    <form action="cus2.php">
    </br><input type="submit" value="2.Find customer who never order. " />
    </form>
    <form action="cus3.php">
    </br><input type="submit" value="2.Find customer who order first and show all details of this customer. " />
    </form>


</body>

</html>