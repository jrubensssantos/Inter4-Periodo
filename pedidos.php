<?php
	require_once("topo.php");
    $arrDados = $_REQUEST;
	
	$arrDados["acao"] = mysql_real_escape_string($arrDados["acao"]);
	$arrDados["idPedido"] = mysql_real_escape_string($arrDados["idPedido"]);
	$arrDados["DsEnderecoEntrega"] = mysql_real_escape_string($arrDados["DsEnderecoEntrega"]);
	$arrDados["DtPedido"] = mysql_real_escape_string($arrDados["DtPedido"]);
    $arrDados["teCliente_idCliente"] = mysql_real_escape_string($arrDados["teCliente_idCliente"]);
    

	if((strlen($arrDados["idPedido"]) > 0) && ($arrDados["acao"] === "E"))
	{		
		$strSQL = "	UPDATE 
						tele_entregas.tuPedido
					SET
						DsEnderecoEntrega = '{$arrDados['DsEnderecoEntrega']}'
						,teCliente_idCliente = '{$arrDados['teCliente_idCliente']}'										
					WHERE
						idPedido = '{$arrDados['idPedido']}' ";
		if(mysql_query($strSQL))
		{
			$strMsg = 'Pedido atualizado com sucesso! ';		   
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
		}
	}//fim da edição do registro
	
	else if ((strlen($arrDados["idUsuario"]) > 0) && ($arrDados["acao"] === "D"))
	{
		$arrDados["idPedido"] = mysql_real_escape_string ($arrDados["idPedido"]);
		$strSQL = "DELETE FROM 
						tele_entregas.tuPedido 
					WHERE 
						idPedido = '".$arrDados["idPedido"]."'
					";
	
		if(mysql_query($strSQL))
		{ 
			$strMsg = "Pedido foi excluido com sucesso ";
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
		}
	
	}//fim do delete
	
    else
	{	
		$arrDados["idPedido"] = mysql_real_escape_string($arrDados["idPedido"]);
		$arrDados["DsEnderecoEntrega"] = mysql_real_escape_string($arrDados["DsEnderecoEntrega"]);
		$arrDados["DtPedido"] = mysql_real_escape_string($arrDados["DtPedido"]);
	    $arrDados["teCliente_idCliente"] = mysql_real_escape_string($arrDados["teCliente_idCliente"]);	
		$strSQL = "INSERT INTO 
							tele_entregas.tuPedido(DsEnderecoEntrega, teCliente_idCliente) 
					VALUES 
							('".$arrDados["DsEnderecoEntrega"]."', '".$arrDados["teCliente_idClente"]."')";
		if(mysql_query($strSQL))
		{ 
			$strMsg = 'Pedido cadastrado com sucesso! ';
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
			/*
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			
			$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
			$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
			$headers .= 'Cco: birthdayarchive@example.com' . "\r\n";
			$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
	       */ 			
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
	
		}
	}//fim do inserte
		
    echo "  <div id='page-wrapper'>
	        <div class='row'>
	            <div class='col-lg-12' id='mensagem'>"
	                .$strMsg."<a href='listPedido.php'>Listar Pedidos</a>
	            </div>";
require_once("rodape.php");