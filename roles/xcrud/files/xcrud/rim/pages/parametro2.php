<?php
    $xcrud = Xcrud::get_instance();
    $xcrud->table('rim_parametro2');
    $xcrud->unset_title();
    $xcrud->relation('parametro', 'rim_parametro1', 'id', 'valor');
    echo $xcrud->render();
?>
