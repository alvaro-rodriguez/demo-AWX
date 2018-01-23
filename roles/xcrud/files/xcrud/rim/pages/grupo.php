<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('rim_grupo');
    $xcrud->unset_title();
    $xcrud->order_by('alias', 'asc');
    //$xcrud->limit(10);
    $xcrud->relation('proyecto', 'rim_proyecto', 'id', 'alias');
	$xcrud->validation_required('alias');
	//$xcrud->validation_required('proyecto,alias');
    echo $xcrud->render();
?>