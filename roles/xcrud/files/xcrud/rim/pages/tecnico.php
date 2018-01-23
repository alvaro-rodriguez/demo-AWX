<?php
    $xcrud = Xcrud::get_instance();

    $xcrud->table('rim_tecnico');
    $xcrud->unset_title();
    $xcrud->order_by('usuario', 'asc');

    $xcrud->relation('grupo', 'rim_grupo', 'id', 'alias');
    $xcrud->change_type('clave', 'password', 'md5', 16);

    $xcrud->columns('clave', true);
    //$xcrud->limit(10);

	$xcrud->validation_required('usuario');
	$xcrud->validation_required('clave');
	$xcrud->validation_required('nombre');
	$xcrud->validation_required('apellidos');
	$xcrud->validation_required('email');
	$xcrud->validation_required('grupo');

  	if ($_SESSION['usuario_admin'] == 0) {
  		$xcrud->where('id =', $_SESSION['usuario_id']);
  		$xcrud->unset_add();
		$xcrud->unset_remove();
		$xcrud->unset_limitlist();
		$xcrud->unset_numbers();
		$xcrud->unset_pagination();
		$xcrud->unset_search();
	    $xcrud->unset_sortable();
		$xcrud->readonly('usuario,nombre,apellidos,email', 'edit');
		$xcrud->disabled('grupo,administrador,activo', 'edit');
  	}

  	$xcrud->validation_required('usuario,clave,nombre,apellidos,email,grupo,administrador,activo');

    echo $xcrud->render();
?>