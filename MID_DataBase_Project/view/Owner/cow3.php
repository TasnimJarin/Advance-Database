<?php 
$c = oci_pconnect("PROJECT", "1234", "localhost/XE");  
if (!$c) {    
  $e =oci_error();    
  trigger_error('Could not connect to database: '.$e['message'],E_USER_ERROR); 
 } 
 $s = oci_parse($c, "select sum(Unit_Stock) as Total_Stock_Amount
 from Milk_Sale Where Sales_Date between '01-Jan-2022' and '31-Dec-2022' and Unit_Stock>800"); 
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
<center><br/><a href="../See_cowP.php">BACK</a></center>