<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('rim_tarea');
    $xcrud->unset_title();
    $xcrud->order_by('nombre', 'asc');
    //$xcrud->limit(10);
    $xcrud->relation('proyecto', 'rim_proyecto', 'id', 'alias');
	$xcrud->validation_required('nombre,proyecto');
    echo $xcrud->render();
?>