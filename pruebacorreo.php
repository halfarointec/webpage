<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="generator" content="Inteligencia Tecnologica;">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway|Montserrat|WSB Mobile Navigation">
<link rel="stylesheet" type="text/css" href="site.css">
<title>Mail Send</title>
</head>
<body style="background-color:#EAEAEA; font-family:Montserrat;color:black;">
<?php
if(isset($_GET['correo']))
{
$correo=$_GET['correo'];	
//require_once('class.phpmailer.php');
require_once('external/PHPMailer-master/class.phpmailer.php');
$mail = new PHPMailer();
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'p3plcpnl0447.prod.phx3.secureserver.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'porrua@alfarogarcia.com.mx';                 // SMTP username
$mail->Password = 'Porrua2018#';                 // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'porrua@porrua.com';
$mail->FromName = 'Porrua Web';
$mail->addAddress('porrua@alfarogarcia.com.mx');               // Name is optional
$mail->addAddress(''.$correo);               // Name is optional
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Correo ACtivacion';
$mail->Body    = '<html><body>
				<table width="640" border="0" cellspacing="0" cellpadding="0" style="border:1px solid black;">
				<tr><td colspan="2" align="left" style="padding:20px">
					<font style="font-size:14px" face="Arial, sans-serif" color="#666666">					
					<b>Correo electronico: </b>'.$correo.'<br>
					<hr style="border:.5 solid black">
					<b><i>Este mensaje fue enviado desde su sitio web</i></b>
					<br>
					</font>
					</td></tr></table></body></html>';
$mail->AltBody = 'Este mensaje fue enviado desde su sitio web
				  Correo electronico:'.$correo;

if(!$mail->send()) {
    echo 'Mensaje enviado.';
    echo 'Mailer: ' . $mail->ErrorInfo;
} else {
    echo '<label class="form-label">Gracias por contactarnos.</label>';
}
}
else
{
	?>
	<form action="envioCorreoTest.php" method="get">
	Email: <input name="correo" size="25">
	<input type="submit" value="enviar">
	</form>
	<?php
	}
?>
</body>
</html>
