<?php 
$c = oci_pconnect("PROJECT", "1234", "localhost/XE");  
if (!$c) {    
  $e =oci_error();    
  trigger_error('Could not connect to database: '.$e['message'],E_USER_ERROR); 
 } 
 $s = oci_parse($c, "select Customer_Name from M_Customer,M_Order
 where M_Order.Customer_ID = M_Customer.Customer_ID and order_date=(select min(order_date) from  M_Customer, M_Order
 where  M_Order.Customer_ID = M_Customer.Customer_ID )"); 
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
         echo "<h1>SEARCHED TABLE of the customer who order first and show name of the customer </h1>";
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