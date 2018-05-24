<html>
<head>
<title>Atender Reclamacion</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php
require("bd.php");
require_once('phpmail/class.phpmailer.php');
require_once('phpmail/class.smtp.php');
$con = new BD();
session_start();
$fecha_actual=date("Y-m-d");
if(empty($_SESSION['admin'])){
	
	header("Location:login.php");
	
}else{
	
if(!empty($_POST['solucion'])){
	
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
		$mail->Password = "xxxxx";
		$mail->setFrom('ecijon@gmail.com' , 'Reclamacion');
		$mail->addAddress($_POST['mail'], 'Querido Usuario');
		$mail->Subject = 'Solucion:Reclamacion de Pedido Numero '.$_POST['pedido'];
		$mail->msgHTML('<h2>Hola, Estimado usuario en respuesta a su Reclamacion sobre el pedido numero '.$_POST['pedido'].'</h2><br>Con el motivo del problema:, '.$_POST['duda'].'</br>'.$_POST['detalle'].'.</br>Le hemos propuesto esta solucion: '.$_POST['solucion'].'.</br> Si no esta de acuerdo con ella porfavor vuelva a contactar con nosotros a traves del email correspondiente o bien por telefono.</br><u><i>Un saludo y muchas gracias por su confianza</i></u>');
		$mail->AltBody = 'Reclamacion';
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
			$con->conectar();
			$resultado = $con->ejecutar("update reclamaciones set estado = 'Solucionada' where id = '$_POST[ticket]'");
			if($con->check() >=1){
				
				?><script>
				window.alert("Solucion Enviada correctamente");
				location.href ="consultarreclamaciones.php";
				</script>
				<?php
				
			}
		}

}else{
	$con->conectar();
	$resultado2 = $con->ejecutar("select * from reclamaciones where id = '$_GET[id]'");
	$row = $resultado2->fetch_assoc();
	?>
	</head>
	<body class="paneladmin">
	<h1 class="tituloadm">Atender Reclamacion</h1>
	<div class="accesoadm">
	<form action="atenderrec.php" method="POST">
	<label>Numero de Ticket</label></br>
	<input type="text" value="<?php echo $row['id'];?>" name="ticket" readonly></br>
	<label>Pedido Reclamado</label></br>
	<input type="text" value="<?php echo $row['numped'];?>" name="pedido" readonly></br>
	<label>Correo Electronico</label></br>
	<input type="text" value="<?php echo $row['correo'];?>" name="mail" readonly></br>
	<label>Problema/Duda a Atender</label></br>
	<input type="text" name="duda" value="<?php echo $row['titulo'];?>" readonly></br>
	<label>Descripcion detallada del problema</label></br>
	<textarea name="detalle" cols="60" rows="10" readonly><?php echo $row['detalle'];?></textarea></br>
	<label>Solucion detallada al problema</label></br>
	<textarea name="solucion" cols="60" rows="10" required></textarea></br></br>
	<input type="submit" value="Enviar Solucion"></br>
	</form></br></br></br></br>
	<div class="divboton">
<a class="botonadm" href="consultarreclamaciones.php">Volver a Visualizar Reclamaciones</a>
</div>
	</div>
	<?php
	
}
}
?>

</body>
</html>