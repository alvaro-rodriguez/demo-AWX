<div id="logo"></div>
<!--<div id="caption">DEMO SITE <small><?php echo $version ?></small></div>-->
<!--<div id="caption">Fujitsu TS - RIM Sevilla</div>-->
<!--<a id="buy-button"><?php echo $_SESSION['usuario']; ?></a>-->
<!--<div style="text-align: center"><a style="color: white" href="index.php?logout=1" title="Salir"><?php echo $_SESSION['usuario']; ?></a></div>-->
<ul id="switchtheme">
    <li class="<?php echo $theme == 'default' ? 'active' : '' ?>">
        <a href="index.php?page=<?php echo $page ?>&theme=default">Default theme</a>
    </li>
    <li class="<?php echo $theme == 'bootstrap' ? 'active' : '' ?>">
        <a href="index.php?page=<?php echo $page ?>&theme=bootstrap">Bootstrap theme</a>
    </li>
    <li class="<?php echo $theme == 'minimal' ? 'active' : '' ?>">
        <a href="index.php?page=<?php echo $page ?>&theme=minimal">Minimal theme</a>
    </li>
</ul>
<ul id="leftmenu">
<?php
	foreach($pagedata as $pk => $pd) {
    	if ($pd['admin'] == 0 || $_SESSION['usuario_admin'] == 1) {
?>
    <li class="<?php echo $page == $pk ? 'active' : '' ?>">
        <a href="index.php?page=<?php echo $pk ?>&theme=<?php echo $theme ?>"><?php echo $pd['title_1'] ?></a>
    </li>
<?php
		}
	}
?>
</ul>