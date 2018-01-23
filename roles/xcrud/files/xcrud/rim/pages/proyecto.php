<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('rim_proyecto');
    $xcrud->unset_title();
    $xcrud->order_by('alias', 'asc');
	$xcrud->unset_remove(true, 'alias', '=', 'RIM');
	$xcrud->condition('alias', '=', 'RIM', 'readonly', 'alias');
	$xcrud->columns('detalle', true);
    //$xcrud->limit('all');
	$xcrud->validation_required('alias,activo');
    echo $xcrud->render();
?>