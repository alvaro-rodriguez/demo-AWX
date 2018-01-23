<?php
    $xcrud = Xcrud::get_instance();

    $xcrud->table('rim_actividad');
    $xcrud->order_by('fecha_inicio_evento', 'desc');
    //$xcrud->join('id', 'rim_actuacion', 'actividad');

    $xcrud->relation('proyecto', 'rim_proyecto', 'id', 'alias', 'activo = 1');
    $xcrud->relation('tipo_evento', 'rim_tipo_evento', 'id', 'nombre');
    //$xcrud->relation('grupo_evento', 'rim_grupo', 'id', 'alias', 'proyecto = 0 or proyecto = \''.$xcrud->get_var('proyecto')."\'", '', '', ' ', '', 'proyecto', 'proyecto');
    $xcrud->relation('grupo_interno_contacto', 'rim_grupo', 'id', 'alias', 'proyecto is null');
    $xcrud->relation('grupo_externo_contacto', 'rim_grupo', 'id', 'alias', '', '', '', ' ', '', 'proyecto', 'proyecto');

    $xcrud->relation('estado_ticket', 'rim_tipo_estado', 'id', 'nombre');

    $xcrud->relation('ineco_origen', 'rim_parametro', 'id', 'valor', 'clave=\'ineco_origen\'', '', '', ' ', '', 'proyecto', 'proyecto');
    $xcrud->relation('ineco_grupo', 'rim_parametro', 'id', 'valor', 'clave=\'ineco_grupo\'', '', '', ' ', '', 'padre', 'ineco_origen');
    $xcrud->relation('ineco_torre', 'rim_parametro', 'id', 'valor', 'clave=\'ineco_torre\'', '', '', ' ', '', 'padre', 'ineco_grupo');
    //$xcrud->relation('ineco_proyecto', 'rim_parametro1', 'id', 'valor', '', '', '', ' ', '', 'proyecto', 'proyecto');
    //$xcrud->relation('ineco_torre_tecnica', 'rim_parametro2', 'id', 'valor', '', '', '', ' ', '', 'parametro', 'ineco_proyecto');

    $xcrud->relation('persan_solicitante', 'rim_parametro', 'id', 'valor', 'clave = \'persan_solicitante\'', '', '', ' ', '', 'proyecto', 'proyecto');
    $xcrud->relation('persan_tecnologia', 'rim_parametro', 'id', 'valor', 'clave = \'persan_tecnologia\'', '', '', ' ', '', 'proyecto', 'proyecto');
    $xcrud->relation('persan_origen_recurso', 'rim_parametro', 'id', 'valor', 'clave = \'persan_origen_recurso\'', '', '', ' ', '', 'proyecto', 'proyecto');
    $xcrud->relation('persan_tipo_actuacion', 'rim_parametro', 'id', 'valor', 'clave = \'persan_tipo_actuacion\'', '', '', ' ', '', 'proyecto', 'proyecto');
    $xcrud->relation('persan_canal', 'rim_parametro', 'id', 'valor', 'clave = \'persan_canal\'', '', '', ' ', '', 'proyecto', 'proyecto');

    $xcrud->relation('tecnico_actuacion', 'rim_tecnico', 'id', array('nombre', 'apellidos'), 'grupo = 1 and activo = 1');
    //$xcrud->relation('procedimiento_actuacion', 'rim_procedimiento', 'id', 'nombre');
    $xcrud->relation('grupo_interno_actuacion', 'rim_grupo', 'id', 'alias', 'proyecto is null');
    $xcrud->relation('grupo_externo_actuacion', 'rim_grupo', 'id', 'alias', '', '', '', ' ', '', 'proyecto', 'proyecto');

    //$xcrud->table_name('Actividad 24x7');
    $xcrud->unset_title();

    $xcrud->columns('proyecto,evento,tipo_evento,fecha_inicio_evento,fecha_fin_evento,cobertura_evento,incidencia_evento,seguimiento,ticket,estado_ticket,tecnico_actuacion');
	$xcrud->column_name('tipo_evento', 'Tipo');
    $xcrud->column_name('fecha_inicio_evento', 'Inicio');
    $xcrud->column_name('fecha_fin_evento', 'Fin');
	$xcrud->column_name('cobertura_evento', 'Cobertura');
	$xcrud->column_name('incidencia_evento', 'Inc.');
	$xcrud->column_name('seguimiento', 'Seg.');
	$xcrud->column_name('estado_ticket', 'Estado');
	$xcrud->column_name('tecnico_actuacion', 'Tecnico');
	//$xcrud->column_tooltip('duracion_actuacion', 'Duracion en minutos');

	//$xcrud->highlight('tipo_incidencia', '=', '24x7', 'red');
	//$xcrud->modal('evento,actuacion');
	//$xcrud->modal('evento', 'icon-user');
	//$xcrud->modal('actuacion', 'icon-user');

	$xcrud->fields('proyecto,tipo_evento,evento,detalle_evento,incidencia_evento,cobertura_evento,fecha_inicio_evento,fecha_fin_evento', false, 'Origen');
	$xcrud->fields('contacto,telefono_contacto,email_contacto,grupo_interno_contacto,grupo_externo_contacto', false, 'Contacto');
	$xcrud->fields('ticket,estado_ticket,fecha_registro_ticket,fecha_cierre_ticket,resolucion_ticket', false, 'Helpdesk');
	$xcrud->fields('seguimiento,detalle_seguimiento', false, 'Seguimiento');
	$xcrud->fields('ineco_origen,ineco_grupo,ineco_torre,ineco_email_asunto,ineco_zabbix_host,ineco_zabbix_issue,ineco_zabbix_age', false, 'INECO');
	$xcrud->fields('persan_solicitante,persan_tecnologia,persan_origen_recurso,persan_tipo_actuacion,persan_canal', false, 'PERSAN');
	$xcrud->fields('tecnico_actuacion,actuacion,fecha_inicio_actuacion,duracion_actuacion,contacto_actuacion,grupo_interno_actuacion,grupo_externo_actuacion,guardia_actuacion', false, 'Actuacion inicial');

    //$xcrud->fields('fecha_modificacion', true);
    //$xcrud->disabled('fecha_modificacion', 'create,edit');

	$xcrud->field_tooltip('proyecto', 'Proyecto relacionado.');
	$xcrud->change_type('evento', 'textarea');
	$xcrud->field_tooltip('evento', 'Descripcion del evento de origen, como se detecta o produce, etc.');
	$xcrud->no_editor('detalle_evento');
	$xcrud->label('detalle_evento', 'Datos adicionales');
	$xcrud->field_tooltip('detalle_evento', 'Detalle y/o datos adicionales del evento de origen.');
	$xcrud->label('tipo_evento', 'Tipo');
	$xcrud->field_tooltip('tipo_evento', 'Tipo de evento de origen.');
	$xcrud->label('incidencia_evento', 'Incidencia');
	$xcrud->field_tooltip('incidencia_evento', '¿El evento refleja una incidencia o una posible incidencia?');
	$xcrud->label('cobertura_evento', 'Cobertura');
	$xcrud->field_tooltip('cobertura_evento', 'Cobertura de servicio que tiene el procedimiento asociado al evento (alerta, etc.).');
	$xcrud->label('fecha_inicio_evento', 'Fecha/hora inicio');
	$xcrud->field_tooltip('fecha_inicio_evento', 'Fecha/hora de inicio del evento, como por ejemplo, de la alerta en el sistema de monitorizacion, de la llamada, del email, etc.');
	$xcrud->label('fecha_fin_evento', 'Fecha/hora fin');
	$xcrud->field_tooltip('fecha_fin_evento', 'Fecha/hora de fin del evento. Aplica por ejemplo, para las alertas (cuando se recupera la alerta en el sistema de monitorizacion).');

	$xcrud->label('contacto', 'Persona de contacto');
	$xcrud->field_tooltip('contacto', 'Persona que realiza la llamada entrante, remitente del email entrante, etc.');
	$xcrud->label('telefono_contacto', 'Telefono');
	$xcrud->field_tooltip('telefono_contacto', 'Telefono de contacto de la persona que realiza la llamada entrante, etc.');
	$xcrud->label('email_contacto', 'E-mail');
	$xcrud->field_tooltip('email_contacto', 'E-mail de contacto de la persona que realiza la llamada entrante, etc.');
	$xcrud->label('grupo_interno_contacto', 'Grupo interno');
	$xcrud->field_tooltip('grupo_interno_contacto', 'Grupo interno RIM al que pertenece la persona que realiza la llamada entrante, etc. Por ejemplo, llamada del tecnico de Guardia de un grupo de N2 del RIM (UAB).');
	$xcrud->label('grupo_externo_contacto', 'Grupo externo');
	$xcrud->field_tooltip('grupo_externo_contacto', 'Grupo externo RIM al que pertenece la persona que realiza la llamada entrante, etc. Por ejemplo, en SAE podria ser el grupo de Vigilancia.');

	$xcrud->field_tooltip('ticket', 'Identificador del ticket en la Helpdesk del cliente (o herramienta interna de ticketing)');
	$xcrud->label('estado_ticket', 'Estado');
	$xcrud->field_tooltip('estado_ticket', 'Estado del ticket');
	$xcrud->label('fecha_registro_ticket', 'Fecha/hora apertura');
	$xcrud->field_tooltip('fecha_registro_ticket', 'Fecha/hora de entrada del ticket (registro, apertura, asignacion, etc.).');
	$xcrud->label('fecha_cierre_ticket', 'Fecha/hora cierre');
	$xcrud->field_tooltip('fecha_cierre_ticket', 'Fecha/hora de resolucion del ticket (cierre, paso a solucion, etc.).');
	$xcrud->no_editor('resolucion_ticket');
	$xcrud->label('resolucion_ticket', 'Solucion');
	$xcrud->field_tooltip('resolucion_ticket', 'Detalle de la resolucion del ticket.');

	$xcrud->field_tooltip('seguimiento', '¿Se debe realizar seguimiento?');
	$xcrud->change_type('detalle_seguimiento', 'textarea');
	$xcrud->label('detalle_seguimiento_', 'Anotaciones');
	$xcrud->field_tooltip('detalle_seguimiento', 'Anotaciones de seguimiento.');

	$xcrud->label('ineco_origen', 'Origen incidencia');
	$xcrud->field_tooltip('ineco_origen', 'Origen de la incidencia: email JIRA o alerta Zabbix');
	$xcrud->label('ineco_grupo', 'Proyecto/Hostgroup');
	$xcrud->field_tooltip('ineco_grupo', 'Grupo relacionado con la incidencia de INECO: Proyecto en caso de emails de JIRA o Hostgroup en caso de alertade Zabbix');
	$xcrud->label('ineco_torre', 'Torre tecnica');
	$xcrud->field_tooltip('ineco_torre', 'Torre tecnica a la que se le corresponde el escalado de la incidencia.');
	$xcrud->label('ineco_email_asunto', 'Asunto email');
	$xcrud->field_tooltip('ineco_email_asunto', 'Asunto del email recibido, con origen JIRA, que avisa de una incidencia en INECO.');
	$xcrud->label('ineco_zabbix_host', 'Host zabbix');
	$xcrud->field_tooltip('ineco_zabbix_host', 'Host en Zabbix (equipo)');
	$xcrud->label('ineco_zabbix_issue', 'Issue zabbix');
	$xcrud->field_tooltip('ineco_zabbix_issue', 'Issue en Zabbix (alerta)');
	$xcrud->label('ineco_zabbix_age', 'Age zabbix');
	$xcrud->field_tooltip('ineco_zabbix_age', 'Age en Zabbix (tiempo que lleva la alerta)');

	$xcrud->label('tecnico_actuacion', 'Tecnico');
	$xcrud->field_tooltip('tecnico_actuacion', 'Tecnico del equipo de Servicedesk 24x7 que ha realizado la actuacion.');
    $xcrud->pass_default('tecnico_actuacion', $_SESSION['usuario_id']);
	$xcrud->change_type('actuacion', 'textarea');
	$xcrud->field_tooltip('actuacion', 'Descripcion de la actuacion realizada.');
    //$xcrud->no_editor('detalle_actuacion');
	//$xcrud->field_tooltip('detalle_actuacion', '');
	//$xcrud->label('procedimiento_actuacion', 'Tarea demandada');
	//$xcrud->field_tooltip('procedimiento_actuacion', '');
	$xcrud->label('fecha_inicio_actuacion', 'Fecha/hora inicio');
	$xcrud->field_tooltip('fecha_inicio_actuacion', 'Fecha/hora de inicio de la actuacion realizada.');
	$xcrud->label('duracion_actuacion', 'Duracion');
	$xcrud->field_tooltip('duracion_actuacion', 'Duracion en minutos');
	$xcrud->label('contacto_actuacion', 'Tecnico resolutor');
	$xcrud->field_tooltip('contacto_actuacion', 'Tecnico asignado que se encarga de resolver la incidencia, peticion o tarea relacionada.');
	$xcrud->label('grupo_interno_actuacion', 'Grupo resolutor int.');
	$xcrud->field_tooltip('grupo_interno_actuacion', 'Grupo interno RIM al que pertenece el tecnico asignado para resolver la incidencia, peticion o tarea relacionada.');
	$xcrud->label('grupo_externo_actuacion', 'Grupo resolutor ext.');
	$xcrud->field_tooltip('grupo_externo_actuacion', 'Grupo externo RIM al que pertenece el tecnico asignado para resolver la incidencia, peticion o tarea relacionada.');
	//$xcrud->label('estado_actuacion', 'Estado');
	//$xcrud->field_tooltip('estado_actuacion', 'Estado que define de forma resumida la ultima accion realizada, o estado en el que queda la incidencia, peticion o tarea relacionada.');
	$xcrud->label('guardia_actuacion', 'Guardia');
	$xcrud->field_tooltip('guardia_actuacion', '¿Es el servicio de Guardias el que queda asignado para resolver la incidencia, peticion o tarea realacionada?');

	$xcrud->validation_required('proyecto');
	$xcrud->validation_required('evento');
	$xcrud->validation_required('tipo_evento');
	$xcrud->validation_required('fecha_inicio_evento');
	//$xcrud->validation_pattern('fecha_inicio_evento', '[0-9][0-9]/[0-9][0-9]/[0-9][0-9][0-9][0-9] [0-9]\:[0-9]');
	//$xcrud->validation_required('cobertura_evento');
	$xcrud->validation_required('incidencia_evento');
	$xcrud->validation_required('seguimiento');
	$xcrud->validation_required('tecnico_actuacion');
	$xcrud->validation_required('actuacion');
	$xcrud->validation_required('fecha_inicio_actuacion');
	$xcrud->validation_required('duracion_actuacion');
	//$xcrud->validation_required('estado_actuacion');
	$xcrud->validation_required('guardia_actuacion');

	// Actuaciones adicionales

    $xcrud2 = $xcrud->nested_table('Actuaciones adicionales', 'id', 'rim_actuacion', 'actividad');
    $xcrud2->order_by('fecha_inicio', 'desc');

    $xcrud2->relation('tecnico', 'rim_tecnico', 'id', array('nombre', 'apellidos'), 'grupo = 1 and activo = 1');
    //$xcrud2->relation('procedimiento', 'rim_procedimiento', 'id', 'nombre');
    $xcrud2->relation('grupo_interno', 'rim_grupo', 'id', 'alias', 'proyecto is null');
    $xcrud2->relation('grupo_externo', 'rim_grupo', 'id', 'alias', '', '', '', ' ', '', 'proyecto', 'proyecto');
    //$xcrud2->relation('estado', 'rim_tipo_estado', 'id', 'nombre');

    $xcrud2->columns('tecnico,actuacion,fecha_inicio,duracion,contacto,grupo_interno,grupo_externo,guardia');
    $xcrud2->column_name('fecha_inicio', 'Inicio');
    $xcrud2->column_name('contacto', 'Resolutor');
    $xcrud2->column_name('grupo_interno', 'Grupo int');
    $xcrud2->column_name('grupo_externo', 'Grupo ext');

    $xcrud2->unset_view();
    $xcrud2->unset_csv();
    $xcrud2->unset_limitlist();
    #$xcrud2->unset_numbers();
    $xcrud2->unset_pagination();
    $xcrud2->unset_print();
    $xcrud2->unset_search();
    $xcrud2->unset_title();

	$xcrud2->fields('tecnico,actuacion,fecha_inicio,duracion,contacto,grupo_interno,grupo_externo,guardia');

	$xcrud2->label('tecnico', 'Tecnico');
	$xcrud2->field_tooltip('tecnico', 'Tecnico del equipo de Servicedesk 24x7 que ha realizado la actuacion.');
    $xcrud2->pass_default('tecnico', $_SESSION['usuario_id']);
	$xcrud2->change_type('actuacion', 'textarea');
	$xcrud2->field_tooltip('actuacion', 'Descripcion de la actuacion realizada.');
    //$xcrud2->no_editor('detalle');
	//$xcrud2->field_tooltip('detalle', '');
	//$xcrud2->label('procedimiento', 'Tarea demandada');
	//$xcrud2->field_tooltip('procedimiento', '');
	$xcrud2->label('fecha_inicio', 'Fecha/hora inicio');
	$xcrud2->field_tooltip('fecha_inicio', 'Fecha/hora de inicio de la actuacion realizada.');
	$xcrud2->label('duracion', 'Duracion');
	$xcrud2->field_tooltip('duracion', 'Duracion en minutos');
	$xcrud2->label('contacto', 'Tecnico resolutor');
	$xcrud2->field_tooltip('contacto', 'Tecnico asignado que se encarga de resolver la incidencia, peticion o tarea relacionada.');
	$xcrud2->label('grupo_interno', 'Grupo resolutor int.');
	$xcrud2->field_tooltip('grupo_interno', 'Grupo interno RIM al que pertenece el tecnico asignado para resolver la incidencia, peticion o tarea relacionada.');
	$xcrud2->label('grupo_externo', 'Grupo resolutor ext.');
	$xcrud2->field_tooltip('grupo_externo', 'Grupo externo RIM al que pertenece el tecnico asignado para resolver la incidencia, peticion o tarea relacionada.');
	//$xcrud2->label('estado', 'Estado');
	//$xcrud2->field_tooltip('estado', 'Estado que define de forma resumida la ultima accion realizada, o estado en el que queda la incidencia, peticion o tarea relacionada.');
	$xcrud2->label('guardia', 'Guardia');
	$xcrud2->field_tooltip('guardia', '¿Es el servicio de Guardias el que queda asignado para resolver la incidencia, peticion o tarea relacionada?');

	$xcrud2->validation_required('tecnico');
	$xcrud2->validation_required('actuacion');
	$xcrud2->validation_required('fecha_inicio');
	$xcrud2->validation_required('duracion');
	//$xcrud2->validation_required('estado');
	$xcrud2->validation_required('guardia');

    echo $xcrud->render();
?>
