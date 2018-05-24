<?php
require("functions/comunes.php");
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jmpress.min.js"></script>
<script type="text/javascript" src="js/jquery.jmslideshow.js"></script>
<script type="text/javascript" src="js/modernizr.custom.48780.js"></script>
</head>
<body>
<div class="logo">
<a href="index.php"><img src="icons/logo.png" ></a> 
<form action="productos.php" id="searchform" method="GET" autocomplete="off">
<input type="search" id="miBusqueda" name="b"
     placeholder="Buscar aqu&iacute;..." >
    <button>Buscar</button>
	</form>
</div>
<div class="navbar">
<ul>
			<li><div onmouseover="javascript:mostrar('textoinicio');" onmouseout="javascript:ocultar('textoinicio');"><a href="index.php" class="icon-inicio" ><p class="textomenu" id="textoinicio"><strong>Inicio</strong></p></a></div></li>
			<li><div onmouseover="javascript:mostrar('textoproductos');" onmouseout="javascript:ocultar('textoproductos');"><a href="productos.php" class="icon-productos"><p class="textomenu" id="textoproductos"><strong>Productos</strong></p></a></div></li>
			<li><div onmouseover="javascript:mostrar('textomicuenta');" onmouseout="javascript:ocultar('textomicuenta');"><a href="micuenta.php" class="icon-micuenta"><p class="textomenu" id="textomicuenta"><strong>Mi Cuenta</strong></p></a></div></li>
			<li><p class="contacarro"><?php if(!empty($_SESSION['carrito'])){$productos = explode(" ",$_SESSION['carrito']); echo count($productos)-1;} ?></p><div onmouseover="javascript:mostrar('textocarrito');" onmouseout="javascript:ocultar('textocarrito');"><a href="carrito.php" class="icon-carrito"><p class="textomenu" id="textocarrito"><strong>Carrito</strong></p></a></div></li>
			<li class="login" id="login"><a href="login.php" class="icon-registro" id="acceder"><p class="textomenu" id="textocarrito" style="display:inline;margin-left:15px;"><strong>Acceder</strong></p></a></li>
</ul>
</div>