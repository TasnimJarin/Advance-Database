<?php 
$c = oci_pconnect("PROJECT", "1234", "localhost/XE");  
if (!$c) {    
  $e =oci_error();    
  trigger_error('Could not connect to database: '.$e['message'],E_USER_ERROR); 
 } 
 $s = oci_parse($c, "SELECT Order_ID, Customer_Name, M_Order.Customer_ID, M_Order.Employee_ID FROM Employee, M_Customer, M_Order
 WHERE M_Customer.Address <> Employee.Employee_City
 AND M_Order.Customer_ID = M_Customer.Customer_ID
 AND M_Order.Employee_ID = Employee.Employee_ID"); 
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
         echo "<table border='1'>\n"; $ncols = oci_num_fields($s); 
         echo "<h1>SEARCHED TABLE </h1>";
         echo "<tr>\n"; 
          for ($i = 1; $i <= $ncols; ++$i) 
           { $colname = oci_field_name($s, $i);    
         echo "  <th><b>".htmlentities($colname, ENT_QUOTES)."</b></th>\n"; } 
         echo "</tr>\n"; while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
         {    
          echo "<tr>\n";
 foreach ($row as $item) 
  {        
   echo "<td>".($item!==null?htmlentities($item, ENT_QUOTES):"&nbsp;")."</td>\n"; 
  } 
       echo "</tr>\n"; } echo "</table>\n";
       echo"</center>";
?>
<center><br/><a href="customerDetais.php">BACK</a></center>