<?php
	$connecta = mysql_connect("localhost","root", "");
	mysql_select_db("tele_entregas");   
	require_once 'fpdf/fpdf.php';
	
	function converte($string)
	{
		return iconv("UTF-8", "ISO-8859-1", $string);
	}
	
	$strSQL = "SELECT idUsuario, NmUsuario, DsEmail, FgStatus FROM tele_entregas.teUsuario";							
	$objRs = mysql_query($strSQL);
	
	$pdf = new FPDF("P", "pt", "A4");
	$pdf -> AddPage();
	$pdf -> Ln(30);
	
	$pdf -> SetFont("arial", "B", 18);
	$pdf -> Cell(0,5,converte("Relatório de Usuários"), 0, 1, "C");
	$pdf -> Ln(10);
	
	$pdf -> SetFont("arial", "B", 14);
	$pdf -> Cell(20,20,converte("id"), 1, 0, "L");
	$pdf -> Cell(250,20,converte("Email"), 1, 0, "L");
	$pdf -> Cell(200,20,converte("Nome"), 1, 0, "L");
	$pdf -> Cell(70,20,converte("Status"), 1, 1, "L");
	
	$pdf -> SetFont("arial", "", 12);
	while ($objRow = mysql_fetch_array($objRs))
	{
		$pdf -> Cell(20,20,$objRow["idUsuario"], 1, 0, "L");
		$pdf -> Cell(250,20,$objRow["DsEmail"], 1, 0, "L");
		$pdf -> Cell(200,20,$objRow["NmUsuario"], 1, 0, "L");
		$pdf -> Cell(70,20,($objRow["FgStatus"] === "A" ? "Ativo" : "Bloqueado"), 1, 1, "L");
	}
	
	
	$pdf -> Output("Relatorio.pdf", "I");