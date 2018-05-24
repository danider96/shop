<?php
// ob_start(); 
require_once('tcpdf/tcpdf.php');
session_start();
include("functions/comunes.php");
require('bd.php');
$con = new BD();
$con->conectar();
$conprod = $con->ejecutar("select * from pedidos where numped ='$_GET[numped]'");
$conuser = $con->ejecutar("select * from usuarios where correo ='$_SESSION[coduser]'");
$i = 0;
$nombresprod = "";
	$fipro = $conprod->fetch_assoc();
		$prodfac = explode('#',$fipro['productos']);
		$separadocomas = implode('#',$prodfac);
		$finalprod = explode('#',$separadocomas);
			foreach(contarValoresArray($finalprod) as $clave => $valor){
						if($finalprod[$i] == $clave){
							$cantidad = $valor;
						}	
							
			$prod = $con->ejecutar("select * from articulos where codart ='$clave'");
			$pro = $prod->fetch_assoc();
			$ruser = $conuser->fetch_assoc();
			// $nombresprod .= $cantidad.' Ud/Uds ,'.$pro['nombre'].',       ------------>        '.$pro['precio'].'€ <br>';
			$i++;
			$arcant[] = $cantidad;
			$arnom[] = $pro['nombre'];
			$arpre[] = $pro['precio'];
			
			}
			$html = '<div style="background-color:#B34242;"><br><img src="icons/logo-pdf.png"></div>';
			$html .= '<b>Fecha de Compra:</b> '.$fipro['fechaped'];
			$html .= '<div style="border-bottom:2px solid #93001D;height:1px;"><b>Nº pedido:</b>'.$fipro['numped'].'</div><br>';
			$html .= '<div align="center"><table><tr><th><b style="color:#B34242;">Facturar a</b></th></tr><tr><td>'.$_SESSION['user'].'</td></tr><tr><td>'.$ruser['dire'].'</td></tr><tr><td>'.$ruser['codpos'].'</td></tr><tr><td>'.$_SESSION['coduser'].'</td></tr></table></div>';
			$html .= '<table width="100%" height="100%" style="text-align:center;border: 2px solid #93001D;"><tr><th colspan="4" style="text-align:center;border: 2px solid black;background-color:#93001D;"><h3>Productos</h3></th></tr><tr><th style="text-align:center;border: 2px solid black;background-color:#93001D;"><b>Cant.</b></th><th style="text-align:center;border: 2px solid black;background-color:#93001D;"><b>Descripcion</b></th><th style="text-align:center;border: 2px solid black;background-color:#93001D;"><b>Precio Unitario</b></th><th style="text-align:center;border: 2px solid black;background-color:#93001D;"><b>Importe</b></th></tr>';
			for($j = 0; $j < count($arcant);$j++){
			$html .= '<tr><td style="text-align:center;border: 2px solid #93001D;background-color:#D36669;">'.$arcant[$j].'</td><td style="text-align:center;border: 2px solid #93001D;background-color:#D36669;">'.$arnom[$j].'</td><td style="text-align:center;border: 2px solid #93001D;background-color:#D36669;">'.$arpre[$j].'€</td><td style="text-align:center;border: 2px solid #93001D;background-color:#D36669;">'.$arcant[$j]*$arpre[$j].'€</td></tr>';
			}
			$html .= '</table><div align="right"><h2>Precio Total: '.$fipro['pretotal'].'€</h2></div>';
			
		$pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document (meta) information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dershop Online');
		$pdf->SetTitle('Factura de Compra Dershop');
		$pdf->SetSubject('Dershop Online');
		$pdf->SetKeywords('TCPDF, PDF, factura, dershop');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(10, 17, 10,10);
		$pdf->SetHeaderMargin(12);
		$pdf->SetFooterMargin(10);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, 10);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		// add a page
		$pdf->SetFont('dejavusans', '', 15);
		$pdf->AddPage();
		
	
		$pdf->writeHTML($html, true, false, true, false, '');
		
		$pdf->lastPage();
		// ob_end_clean();
		$pdf->Output('Factura'.$_GET['numped'].'.\pdf', 'I');
		
		
	
?>