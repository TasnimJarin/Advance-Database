<?php 
// The form:
function get_input($e_id = "",$e_name = "",$e_gender = "",$e_email = "",$e_sal = "",$e_city = "",$e_hiresdate = "",$e_job = "",$e_Owner = "") 
{
echo <<<END
<form action="FinalOwner3.php" method="post">
<center>
<table>
<tr><td>
Employee_id:</br>
<input type="text" name="e_id" value="$e_id" ></td></tr>
</br><tr></td>
Employee_name:</br>
<input type="text" name="e_name" value="$e_name" required></td></tr>
</br><tr></td>
Gender:</br>
<input type="text" name="e_gender" value="$e_gender" required></td></tr>
</br><tr></td>
Email:</br>
<input type="text" name="e_email" value="$e_email" required></td></tr>
</br><tr></td>
Employee_sal:</br>
<input type="text" name="e_sal" value="$e_sal" required></td></tr>
</br><tr></td>
Employee_city:</br>
<input type="text" name="e_city" value="$e_city" required></td></tr>
</br><tr></td>
Employee_hiresdate:</br>
<input type="text" name="e_hiresdate" value="$e_hiresdate" required></td></tr>
</br><tr></td>
Employee_job:</br>
<input type="text" name="e_job" value="$e_job" required></td></tr>
</br><tr></td>
Owner Id:</br>
<input type="text" name="e_Owner" value="$e_Owner" required></td></tr>
</br>


<tr><td>
<input type="submit" value="Insert"></td></tr></table>
</form>
</center>
END;
}

if(!isset($_REQUEST['e_id'])) {
echo "<center><h3>!!Add Employee!!</h3></center><p>"; 
get_input();
}
else {
// check whether the input fields are not empty
if (empty($_REQUEST['e_id'])) {
echo "<b>Re-enter informations text in both fields:</b><p><br />"; 
get_input($_REQUEST['e_id']);
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
$phys = get_Physicists($conn, $_REQUEST['e_id'],$_REQUEST['e_name'],$_REQUEST['e_gender'],$_REQUEST['e_email'],$_REQUEST['e_sal'],$_REQUEST['e_city'],$_REQUEST['e_hiresdate'],$_REQUEST['e_job'],$_REQUEST['e_Owner']);

// display results
print_results($phys, 'Result: Data Inserted:');


// close the database connection
oci_close($conn);
}
} 


// The following functions calls the  procedure that uses a ref cursor 
//to fetch records

function get_Physicists($conn, $e_id,$e_name,$e_gender,$e_email,$e_sal,$e_city,$e_hiresdate,$e_job,$e_Owner)
{
$sql = "BEGIN Insert_emp(:e_id,:e_name,:e_gender,:e_email,:e_sal,:e_city,:e_hiresdate,:e_job,:e_Owner); END;";
$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ':e_id', $e_id, 30);
oci_bind_by_name($stmt, ':e_name', $e_name, 30);
oci_bind_by_name($stmt, ':e_gender', $e_gender, 30);
oci_bind_by_name($stmt, ':e_email', $e_email, 30);
oci_bind_by_name($stmt, ':e_sal', $e_sal, 30);
oci_bind_by_name($stmt, ':e_city', $e_city, 30);
oci_bind_by_name($stmt, ':e_hiresdate', $e_hiresdate, 30);
oci_bind_by_name($stmt, ':e_job', $e_job, 30);
oci_bind_by_name($stmt, ':e_Owner', $e_Owner, 30);
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