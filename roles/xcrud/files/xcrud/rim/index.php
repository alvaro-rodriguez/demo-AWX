<?php
require ('../xcrud/xcrud.php');
session_start();

if (isset($_GET['logout']) && isset($_SESSION['usuario'])) {
	$_SESSION['reset'] = 1;
	unset($_SESSION['usuario']);
	unset($_SESSION['usuario_id']);
	unset($_SESSION['usuario_admin']);
    //unset($_SERVER['PHP_AUTH_USER']);
	http_response_code(401);
  	exit;
}

if (isset($_SESSION['reset']) || !isset($_SERVER['PHP_AUTH_USER'])) {
    if (isset($_SESSION['reset'])) unset($_SESSION['reset']);
    header('WWW-Authenticate: Basic realm="Mi dominio"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
} else {
    //echo "<p>Hola {$_SERVER['PHP_AUTH_USER']}.</p>";
    //echo "<p>Introdujo {$_SERVER['PHP_AUTH_PW']} como su contraseña.</p>";
    $db = Xcrud_db::get_instance();
    //$db->query("select id from rim_tecnico where usuario = '".$_SERVER['PHP_AUTH_USER']."'");
    $db->query("select id, administrador from rim_tecnico where usuario = '".$_SERVER['PHP_AUTH_USER']."' and clave = '".md5($_SERVER['PHP_AUTH_PW'])."'");
    $user = $db->row();
    if (!$user) {
    	$_SESSION['reset'] = 1;
    	//echo md5($_SERVER['PHP_AUTH_PW']);
    	header("Location: index.php");
		exit;
	}
	$_SESSION['usuario'] = $_SERVER['PHP_AUTH_USER'];
	$_SESSION['usuario_id'] = $user['id'];
	$_SESSION['usuario_admin'] = $user['administrador'];
    unset($_SESSION['reset']);
}

require ('html/pagedata.php');

Xcrud_config::$jquery_no_conflict = true; // jquery conflicts with SyntaxHighlighter

$theme = isset($_GET['theme']) ? $_GET['theme'] : 'default';
switch ($theme)
{
    case 'bootstrap':
        Xcrud_config::$theme = 'bootstrap';
        $title_2 = 'Bootstrap theme';
        break;
    case 'minimal':
        Xcrud_config::$theme = 'minimal';
        $title_2 = 'Minimal theme';
        break;
    default:
        Xcrud_config::$theme = 'default';
        $title_2 = 'Default theme';
        break;
}

$page = (isset($_GET['page']) && isset($pagedata[$_GET['page']])) ? $_GET['page'] : 'default';
extract($pagedata[$page]);

$file = dirname(__file__) . '/pages/' . $filename;
$code = file_get_contents($file);
include ('html/template.php');
?>