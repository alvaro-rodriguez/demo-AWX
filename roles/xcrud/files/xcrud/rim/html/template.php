<!DOCTYPE HTML>
<html>
    <head>
    	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    	<title>Fujitsu TS - RIM Sevilla - <?php echo $title_1 ?></title>
        <link href="assets/shCore.css" rel="stylesheet" type="text/css" />
        <link href="assets/shThemeDjango.css" rel="stylesheet" type="text/css" />
        <link href="assets/style.css" rel="stylesheet" type="text/css" />
        <?php if($theme == 'bootstrap'){ ?>
        <link href="../xcrud/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <?php } ?>
    </head>

    <body>
        <div id="page">
            <div id="menu"><?php include(dirname(__FILE__).'/menu.php') ?></div>
            <div id="content">
                <div class="clr">&nbsp;</div>
                <!--<h1><?php echo $title_1 ?> <small><?php echo $title_2 ?></small></h1>-->
                <!--<p><?php echo $description ?></p>-->
                <h1 title="<?php echo $description ?>"><?php echo $title_1 ?></h1>
                <?php include($file) ?>
                <div class="clr">&nbsp;</div>
            </div>
        </div>
        <a class="buy-xcrud" href="index.php?logout=1" title="Salir"><small><?php echo $_SESSION['usuario']; ?></small></a>
        <!--
        <script src="assets/shCore.js" type="text/javascript"></script>
        <script src="assets/shBrushPhp.js" type="text/javascript"></script>
        <script src="assets/shBrushJScript.js" type="text/javascript"></script>
        <script type="text/javascript">
        	SyntaxHighlighter.all();
        </script>
        -->
        <?php if($theme == 'bootstrap'){ ?>
        <script src="../xcrud/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <?php } ?>
    </body>
</html>