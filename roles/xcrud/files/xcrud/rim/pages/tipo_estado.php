<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('rim_tipo_estado');
    $xcrud->unset_title();
    $xcrud->order_by('nombre', 'asc');
    //$xcrud->limit('all');
	$xcrud->validation_required('nombre');
    echo $xcrud->render();
?>