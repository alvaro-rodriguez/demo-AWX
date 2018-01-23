<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('rim_parametro');
    $xcrud->unset_title();
    $xcrud->relation('padre', 'rim_parametro', 'id', 'valor');
    $xcrud->relation('proyecto', 'rim_proyecto', 'id', 'alias');
    $xcrud->validation_required('proyecto,clave,valor');
    echo $xcrud->render();
?>
