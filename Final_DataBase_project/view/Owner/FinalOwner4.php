<?php 
// The form:
function get_input($first = "") 
{
echo <<<END
<form action="finalOwner4.php" method="post">
<table><tr><td>
Employee Id:</td><td>
<input type="text" name="first" value="$first"></td></tr>
<tr><td>
<input type="submit" value="Update"></td>
</tr></table>
</form>
END;
}

if(!isset($_REQUEST['first'])) {
echo "<b>Remove Employee : .</b><p><br />"; 
get_input();
}
else {
// check whether the input fields are not empty
if (empty($_REQUEST['first'])) {
echo "<b>Re-enter informations text in both fields:</b><p><br />"; 
get_input($_REQUEST['first']);
}
else {
$conn = oci_connect("PROJECT", "1234", "localhost/XE");
// Are we connected?
if (!$conn) {
echo( " Unable to locate the table Physicists. " );
}
else{
echo( " <i> We are connected ... </i><br />" );
}

// execute the function that calls the stored procedure 
$phys = get_Physicists($conn, $_REQUEST['first']);

// display results
print_results($phys, 'Result: Cow Info:');


// close the database connection
oci_close($conn);
}
} 


// The following functions calls the  procedure that uses a ref cursor 
//to fetch records

function get_Physicists($conn, $firstname )
{
$sql = "BEGIN cow_info(:first_name,:REFCUR, :REFCUR1, :REFCUR2); END;";
$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ':first_name', $firstname, 20);

$refcur = oci_new_cursor($conn);
oci_bind_by_name($stmt, ':REFCUR', $refcur, -1, OCI_B_CURSOR);

oci_execute($stmt);
oci_free_statement($stid);
// oci_execute($stmt, OCI_DEFAULT);
// oci_fetch_all($refcur, $physicistrecords, null, null, OCI_FETCHSTATEMENT_BY_ROW);
// return ($physicistrecords);
}


function print_results($returned_records, $report_title)
{
echo '<h3>'.htmlentities($report_title).'</h3>';
if (!$returned_records) {
    while($row = sqlsrv_fetch_array($result))
    {
        echo $row[0];
    }
    

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
<a href="FinalOwner.php">BACK</a>

