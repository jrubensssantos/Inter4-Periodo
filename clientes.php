<?php 
	require_once("topo.php");	
	$arrDados = $_REQUEST; 
  		
	$arrDados["acao"] = mysql_real_escape_string($arrDados["acao"]);
	$arrDados["idCliente"] = mysql_real_escape_string($arrDados["idCliente"]);
	$arrDados["NmCliente"] = mysql_real_escape_string($arrDados["NmCliente"]);
	$arrDados["DsEmail"] = mysql_real_escape_string($arrDados["DsEmail"]);
	$arrDados["DtNascimento"] = mysql_real_escape_string($arrDados["DtNascimento"]);
	$arrDados["DsTelefone"] = mysql_real_escape_string($arrDados["DsTelefone"]);
	
	if((strlen($arrDados["idCliente"]) > 0) && ($arrDados["acao"] === "E"))
	{		
		$strSQL = "	UPDATE 
						tele_entregas.teCliente
					SET
						NmCliente = '{$arrDados['NmCliente']}'
						,DsEmail = '{$arrDados['DsEmail']}'
						,DtNascimento = '{$arrDados['DtNascimento']}'
						,DsTelefone = '{$arrDados["DsTelefone"]}'				
					WHERE
						idCliente = '{$arrDados['idCliente']}' ";
		if(mysql_query($strSQL))
		{
			$strMsg = 'Dados do usuário atualizado com sucesso! ';
		   // echo "<script language='javascript'>
					// window.alert('Registro atualizados com sucesso!');
					// window.location=('listUsuario.php?acao=E&idCliente={$arrDados["idCliente"]}');
				// </script>";
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
			// echo "<script language='javascript'>
					// window.alert('Houve um erro no banco de dados!');
					// window.location=('listUsuario.php?acao=E&idCliente={$arrDados["idCliente"]}');
				// </script>";
		}
	}//fim da edição do registro
	
	else if ((strlen($arrDados["idCliente"]) > 0) && ($arrDados["acao"] === "D"))
	{
		$arrDados["idCliente"] = mysql_real_escape_string ($arrDados["idCliente"]);
		$strSQL = "DELETE FROM 
						tele_entregas.teCliente 
					WHERE 
						idCliente = '".$arrDados["idCliente"]."'
					";
	
		if(mysql_query($strSQL))
		{ 
			$strMsg = "Cliente foi excluido com sucesso ";
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
		if(strlen($arrDados["NmCliente"]) <= 3)
		{
			
			header("Location: cadCliente.php");
			$strMsg = "O campo categoria tem que ter mais de 3 caracteres ";
			exit();
		}
	
		$arrDados["NmCliente"] = mysql_real_escape_string($arrDados["NmCliente"]);
		$arrDados["DsEmail"] = mysql_real_escape_string($arrDados["DsEmail"]);
		$arrDados["DtNascimento"] = mysql_real_escape_string($arrDados["DtNascimento"]);
		$arrDados["DsTelefone"] = mysql_real_escape_string($arrDados["DsTelefone"]);	
		$strSQL = "INSERT INTO 
							tele_entregas.teCliente(NmCliente, DsEmail, DtNascimento, DsTelefone) 
					VALUES 
							('".$arrDados["NmCliente"]."', '".$arrDados["DsEmail"]."', '".$arrDados["DtNascimento"]."', '".$arrDados["DsTelefone"]."')";
		if(mysql_query($strSQL))
		{ 
			$strMsg = 'Cliente cadastrado com sucesso! ';
		}
		else
		{
			$strMsg = "Erro no query ".mysql_error()." O administrador foi avisado. ";
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

	echo "<div id='page-wrapper'>	
		<div class='row'>
			<div class='col-lg-12' id='mensagem'>"
			.$strMsg."<a href='listCliente.php'> Exibir cadastros</a>      				
		</div>";//fim mensagem para o usuário

	require_once("rodape.php");