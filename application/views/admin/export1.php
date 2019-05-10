<?php
// The function header by sending raw excel
header("Content-type: application/json");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=Sources_1.xls");
 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1">
    <tr>
    	<th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>others</th>
	</tr>
    <tr>
    	<td>John Doe</td>
    	<td>America</td>
    	<td>333-230-677</td>
    	<td>asfsdfsdf</td>
    </tr>
</table>