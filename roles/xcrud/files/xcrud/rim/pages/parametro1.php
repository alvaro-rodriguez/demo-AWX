<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('rim_parametro1');
    $xcrud->unset_title();
    $xcrud->relation('proyecto', 'rim_proyecto', 'id', 'alias');
    echo $xcrud->render();
?>
