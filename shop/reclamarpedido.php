<html>
<head>
<title>Reclamacion de Pedido</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php
require("bd.php");
require_once('phpmail/class.phpmailer.php');
require_once('phpmail/class.smtp.php');
$con = new BD();
session_start();
$fecha_actual=date("Y-m-d");
if(empty($_SESSION['user'])){
	
	header("Location:login.php");
	
}else{
	
if(!empty($_POST['duda']) and !empty($_POST['detalle'])){
	
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
		$mail->Password = "xxxxxxxxx";
		$mail->setFrom('ecijon@gmail.com' , 'Reclamacion');
		$mail->addAddress('ecijon@gmail.com', 'Dershop Online');
		$mail->Subject = 'Reclamacion de Pedido Numero '.$_POST['pedido'];
		$mail->msgHTML('<h2>Reclamacion sobre el pedido numero '.$_POST['pedido'].'</h2><br>El usuario, '.$_POST['nombre'].' ha puesto una reclamacion por el motivo: '.$_POST['duda'].', y lo detalla de la siguiente manera: </br>'.$_POST['detalle'].'.');
		$mail->AltBody = 'Reclamacion';
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
			$con->conectar();
			$resultado = $con->ejecutar("insert into reclamaciones (numped,correo,titulo,detalle,estado,fecharec) VALUES ('$_POST[pedido]','$_POST[mail]','$_POST[duda]','$_POST[detalle]','En Tramite','$fecha_actual')");
			if($con->check() >=1){
				
				?><script>
				window.alert("Reclamacion Realizada correctamente");
				location.href ="mispedidos.php";
				</script>
				<?php
				
			}
		}

}else{
	?>
	</head>
	<body class="panelusu">
	<div class="acceso">
	<form action="reclamarpedido.php" method="POST" class="accesomin">
	<label>Numero de pedido a Reclamar</label></br>
	<input type="text" value="<?php echo $_GET['ped'];?>" name="pedido" readonly></br>
	<label>Nombre Completo</label></br>
	<input type="text" value="<?php echo $_SESSION['user'];?>" name="nombre"></br>
	<label>Correo Electronico</label></br>
	<input type="text" value="<?php echo $_SESSION['coduser'];?>" name="mail" readonly></br>
	<label>Titulo de Problema/Duda</label></br>
	<input type="text" name="duda" required></br>
	<label>Descripcion detallada del problema</label></br>
	<textarea name="detalle" required></textarea></br>
	<input type="submit" value="Enviar Reclamacion"></br>
	</form>
	</div>
	<?php
	
}
}
?>
</body>
</html>