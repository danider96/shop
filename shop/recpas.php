<html>
<head>
<?php
require("bd.php");
require_once('phpmail/class.phpmailer.php');
require_once('phpmail/class.smtp.php');
$con = new BD();
$con->conectar();
session_start();
$resultado = $con->ejecutar("select * from usuarios where correo = '$_POST[usuario]'");
if(empty($_POST['usuario']) and $resultado->num_rows <=1){
	
	header("Location:recupass.php");
	
}else if(!empty($_POST['newpass']) and $resultado->num_rows <=1){
	$row_user = $resultado->fetch_assoc();
	$resultado2 = $con->ejecutar("update usuarios set pass = '$_POST[newpass]' where correo = '$row_user[correo]'");
	if($filas = $con->check() >=1){
	?>
	<script>
		alert("Contraseña cambiada con exito¡");
		location.href = "login.php";
	</script>
	<?php
	}
}else{	
		$row_user = $resultado->fetch_assoc();	
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
		$mail->Password = "xxxxxxxxxxx";
		$mail->setFrom('ecijon@gmail.com' , 'Dershop Online');
		$mail->addAddress($_POST['usuario'], $row_user['nombre']);
		$mail->Subject = 'Solicitud de cambio de contraseña';
		$mail->msgHTML('<h2>Solicitud de cambio de contraseña</h2><br>Hola, hemos recibido su solicitud de cambio de contraseña correctamente, puede realizar el cambio en el enlace http://localhost/shop/recupass.php?correo='.$_POST['usuario'].'&tok='.$_POST['key'].' ,Si no ha solicitado este cambio, ignore este mensaje.</br><b><i> Un saludo y Gracias por su confianza en nosotros.</i></b>');
		$mail->AltBody = 'Solicitud Cambio de Contraseña';
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
	?>
	<script>
		alert("Revise su correo, hemos enviado el cambio de contraseña");
		location.href = "login.php";
	</script>
	<?php
}
?>
</head>
<body>
</body>
</html>





