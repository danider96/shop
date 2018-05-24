<html>
<head>
<?php
require("bd.php");
require_once('phpmail/class.phpmailer.php');
require_once('phpmail/class.smtp.php');
require("functions/comunes.php");
$con = new BD();
$con2 = new BD();
session_start();
if(empty($_SESSION['user'])){
	
	header("Location:login.php");
	
}

$total=0;
$preciototal =0;
$fecha_actual=date("Y-m-d");
$productos = explode(" ",$_SESSION['carrito']);
$con->conectar();
$con2->conectar();
foreach(contarValoresArray($productos) as $clave => $valor){

		$cantidad= $valor;
		$resultado = $con->ejecutar("update articulos set existencias = existencias-'$cantidad'  where codart = '$clave'");
				
		for($j = 0;$j <=count($clave);$j++){
			$resultado2 = $con->ejecutar("select * from articulos where codart = '$clave'");
			$row_prod = $resultado2->fetch_assoc();
						
			$preciototal = $preciototal + $cantidad * $row_prod['precio'];
			$cantidad= 0;
			$total += $preciototal;	
		}	
				
			
}
$prodpedidos = $_SESSION['carrito'];
$prodpedtr = rtrim($prodpedidos);
$prodpedidosfil= str_replace(" ","#",$prodpedtr);

$pedido = $con2->ejecutar("insert into pedidos(productos, pretotal, correo, fechaped, estado) values ('$prodpedidosfil','$preciototal','$_SESSION[coduser]','$fecha_actual','Pagado')");
if($pedidok = $con2->check() >= 1){
	unset($_SESSION['carrito']);
		
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPOptions = array(
			'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
		);
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "ecijon@gmail.com";
		$mail->Password = "xxxxxx";
		$mail->setFrom('ecijon@gmail.com' , 'Dershop Online');
		$mail->addAddress($_SESSION['coduser'], $_SESSION['user']);
		$mail->Subject = 'Confirmacion de Pedido';
		$mail->msgHTML('<h2>Confirmacion de su pedido</h2><br>Hola, '.$_SESSION['user'].' hemos recibido su pedido Correctamente, puede ver el estado de su pedido en su cuenta a traves de la web, tambien le iremos informando segun avance el estado de su paquete, si de lo contrario usted no ha realizado este pedido pongase en contacto con nosotros lo antes posible.</br><b><i> Un saludo y Gracias por comprar con nosotros.</i></b>');
		$mail->AltBody = 'PEDIDO REALIZADO Correctamente';
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
	?>
	<script>
		alert("Pedido Realizado Correctamente");
		location.href = "index.php";
	</script>
	<?php
	
}else{
	echo "ERROR";
}
?>
</head>
<body>
</body>
</html>





