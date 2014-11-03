<?php 
	require_once("topo.php");
	$arrDados = $_REQUEST;
	
	 
	
	$arrDados["acao"] = mysql_real_escape_string($arrDados["acao"]);
  	$arrDados["idProduto"] = mysql_real_escape_string($arrDados["idProduto"]);
	$arrDados["DsProduto"] = mysql_real_escape_string($arrDados["DsProduto"]);
	$arrDados["NuValor"] = mysql_real_escape_string($arrDados["NuValor"]);
	
	if((strlen($arrDados["idProduto"]) > 0) && ($arrDados["acao"] === "E"))
	{

		$strSQL = 	"	UPDATE 
							tele_entregas.teProduto
						SET
							 DsProduto = 	'{$arrDados['DsProduto']}'						
							,NuValor = 	'{$arrDados['NuValor']}'									
						WHERE
							idProduto = '{$arrDados['idProduto']}' 
					";
		if(mysql_query($strSQL))
		{
		   $strMsg = 'Produto atualizado com sucesso! ';
		   		// <script language='javascript'>
					// window.alert('Registro atualizados com sucesso!');
					// window.location=('cadProduto.php?acao=idProduto={$arrDados["idProduto"]}');
				// </script>";
		}
		else
		{
			$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
			mail("jhouper@hotmail.com", "Erro Mysql"
			, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
			, "From: jhouper@hotmail.com");
				// "<script language='javascript'>
					// window.alert('Houve um erro no banco de dados!');
					// window.location=('cadCategorias.php?idCategoria={$arrDados["idCategoria"]}');
				// </script>";
		}
	}//fim da edição do registro
	
	else if ((strlen($arrDados["idProduto"]) > 0) && ($arrDados["acao"] === "D"))
	//else if ((strlen($arrDados["idProduto"]) > 0) && ($arrDados["acao"] === "D"))
	{
		
		$arrDados["idProduto"] = mysql_real_escape_string ($arrDados["idProduto"]);
		$strSQL = "DELETE FROM tele_entregas.teProduto 
					WHERE 
					idProduto = '{$arrDados["idProduto"]}'
					";
	
		if(mysql_query($strSQL))
		{ 
			$strMsg = "O código ".$arrDados["idProduto"]." foi excluido com sucesso. ";
		}
		else
		{
			if (condition) 
			{
				$strMsg = "O produto não pode ser excluido porque está em uso!";
			} 
			else 
			{
				$strMsg = "Erro na query ".mysql_error()." O administrador foi avisado. ";
				mail("jhouper@hotmail.com", "Erro Mysql"
				, "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
				, "From: jhouper@hotmail.com");
			}
			
			
			
		}
	
	}//fim do delete
	
	else
	{
		if(strlen($arrDados["DsProduto"]) <= 3)
		{
			//var_dump($arrDados);
			header("Location: cadProduto.php");
			$strMsg = "O campo produto tem que ter mais de 3 caracteres";
			exit();
		}
		if(strlen($arrDados["DsProduto"]) == "")
		{
			//var_dump($arrDados);
			header("Location: cadProduto.php");
			$strMsg = "O campo Valor é obrigatório.";
			exit();
		}
		
	
		$arrDados["DsProduto"] = mysql_real_escape_string($arrDados["DsProduto"]);
		$arrDados["NuValor"] = mysql_real_escape_string($arrDados["NuValor"]);
		$strSQL = 	"		
						INSERT INTO 
							tele_entregas.teProduto(DsProduto, NuValor) 
						VALUES 
						(
							'{$arrDados["DsProduto"]}'
							,'{$arrDados["NuValor"]}'	
						)
	  				";	
						
		if(mysql_query($strSQL))
		{ 
			$strMsg = "Produto cadastrado com sucesso! ";
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
            		.$strMsg."<a href='listProduto.php'> Exibir cadastros</a>      				
    			</div>";//fim mensagem para o usuário
	require_once("rodape.php");