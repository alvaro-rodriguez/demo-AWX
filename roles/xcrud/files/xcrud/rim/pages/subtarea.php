<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('rim_subtarea');
    $xcrud->unset_title();
    $xcrud->order_by('nombre', 'asc');
    //$xcrud->limit(10);
    $xcrud->relation('tarea', 'rim_tarea', 'id', 'nombre');
    $xcrud->relation('grupo', 'rim_grupo', 'id', 'alias');
	$xcrud->validation_required('nombre,tarea,grupo');
    echo $xcrud->render();
?>