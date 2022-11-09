<?php 
// The form:
function get_input($oid  = "",$oname = "",$oNO = "",$oemail = "",$oBdate = "") 
{
echo <<<END
<form action="FinalOwnerREG.php" method="post">
<center>
<table>
<tr><td>
Owner_id:</br>
<input type="text" name="oid" value="$oid" ></td></tr>
</br><tr></td>
Owner_name:</br>
<input type="text" name="oname" value="$oname" ></td></tr>
</br><tr></td>
Phone Number:</br>
<input type="text" name="oNO" value="$oNO"></td></tr>
</br><tr></td>
Email:</br>
<input type="text" name="oemail" value="$oemail" ></td></tr>
</br><tr></td>
Date of Birth:</br>
<input type="text" name="oBdate" value="$oBdate"></td></tr>
</br><tr></td>



<tr><td>
<input type="submit" value="Submit"></td></tr></table>
</form>
</center>
END;
}

if(!isset($_REQUEST['oid'])) {
echo "<center><h3>!!Register Here!!</h3></center><p>"; 
get_input();
}
else {
// check whether the input fields are not empty
if (empty($_REQUEST['oid'])) {
echo "<b>Re-enter informations text in both fields:</b><p><br />"; 
get_input($_REQUEST['oid']);
}
else {
$conn = oci_connect("PROJECT", "1234", "localhost/XE");
// Are we connected?
if (!$conn) {
echo( " Unable to locate the table. " );
}
else{
echo( " <i> We are connected ... </i><br />" );
}

// execute the function that calls the stored procedure 
$phys = get_Physicists($conn, $_REQUEST['oid'],$_REQUEST['oname'],$_REQUEST['oNO'],$_REQUEST['oemail'],$_REQUEST['oBdate']);

// display results
print_results($phys, 'Result: Data Inserted:');


// close the database connection
oci_close($conn);
}
} 


// The following functions calls the  procedure that uses a ref cursor 
//to fetch records

function get_Physicists($conn, $oid, $oname, $oNO, $oemail, $oBdate)
{
$sql = "BEGIN O_reg(:oid,:oname,:oNO,:oemail,:oBdate); END;";
$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ':oid', $oid, 50);
oci_bind_by_name($stmt, ':oname', $oname, 50);
oci_bind_by_name($stmt, ':oNO', $oNO, 50);
oci_bind_by_name($stmt, ':oemail', $oemail, 50);
oci_bind_by_name($stmt, ':oBdate', $oBdate, 50);

$refcur = oci_new_cursor($conn);

//oci_bind_by_name($stmt, ':REFCUR', $refcur, -1, OCI_B_CURSOR);
oci_execute($stmt);
oci_free_statement($stmt);
// oci_execute($stmt, OCI_DEFAULT);
oci_execute($refcur, OCI_DEFAULT);
//oci_fetch_all($refcur, $physicistrecords, null, null, OCI_FETCHSTATEMENT_BY_ROW);
//return ($physicistrecords);
}


// To print the results
function print_results($returned_records, $report_title)
{
echo '<h3>'.htmlentities($report_title).'</h3>';
if (!$returned_records) {
echo '<p>Value Updated</p>';

}
else {
echo '<table border="1" cellspacing = "3" cellpadding = "7">';
foreach ($returned_records as $row) {
echo '<tr>';
foreach ($row as $field) {
print '<td>'.
($field ? htmlentities($field) : ' ').'</td>';
}
}
echo '</table>';
}
}

?>
<center><a href="FinalOwner.php">BACK</a></center>