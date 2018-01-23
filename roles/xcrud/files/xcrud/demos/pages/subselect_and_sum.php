<?php
	$xcrud = Xcrud::get_instance();
    $xcrud->table('customers');
    $xcrud->columns('customerName,city,creditLimit,Paid,Profit'); // specify only some columns
    $xcrud->subselect('Paid','SELECT SUM(amount) FROM payments WHERE customerNumber = {customerNumber}'); // other table
    $xcrud->subselect('Profit','{Paid}-{creditLimit}'); // current table
    $xcrud->sum('creditLimit,Paid,Profit'); // sum row(), receives data from full table (ignores pagination)
    echo $xcrud->render();
?>