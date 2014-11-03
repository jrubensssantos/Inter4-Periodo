<?php
require_once("topo.php");
    $arrDados = $_REQUEST;

    $arrDados["idPedido"] = mysql_real_escape_string($arrDados["idPedido"]);
    $arrDados["NmCliente"] = mysql_real_escape_string($arrDados["NmCliente"]);
    $arrDados["DsEnderecoEntrega"] = mysql_real_escape_string($arrDados["DsEnderecoEntrega"]);

    if(strlen($arrDados["idPedido"]) > 0 && $arrDados["acao"]==="D")
    {
        $arrDados["idPedido"] = mysql_real_escape_string ($arrDados["idPedido"]);
        $strSQL = " UPDATE
		                tele_entregas.tuPedido
                    SET
                        FgStatus = 'B'
					WHERE
						idPedido = '".$arrDados["idPedido"]."'
					";

        if(mysql_query($strSQL))
        {
            $strMsg = "Pedido ".$arrDados["idPedido"]." foi excluido com sucesso ";
        }
        else
        {
            $strMsg = " Erro na query ".mysql_error()." O administrador foi avisado. ";
                        mail("jhouper@hotmail.com", "Erro Mysql"
                           , "Erro : ".mysql_error()."===>".date("d/m/Y H:i:s")
                           , "From: jhouper@hotmail.com");
        }
    }
    else
    {
        if(strlen($arrDados["NmUsuario"]) <= 3)
        {
            header("Location: cadUsuario.php");
            $strMsg = "O campo categoria tem que ter mais de 3 caracteres ";
            exit();
        }

        $arrDados["NmUsuario"] = mysql_real_escape_string($arrDados["NmUsuario"]);
        $arrDados["DsEmail"] = mysql_real_escape_string($arrDados["DsEmail"]);
        $arrDados["DsSenha"] = mysql_real_escape_string($arrDados["DsSenha"]);
        $strSQL = "INSERT INTO
							tele_entregas.teUsuario(NmUsuario, DsEmail, DsSenha)
					VALUES
							('".$arrDados["NmUsuario"]."', '".$arrDados["DsEmail"]."', '".codificaSenha($arrDados["DsSenha"])."')";
        if(mysql_query($strSQL))
        {
            $strMsg = 'Dados do usuário cadastrado com sucesso! ';
        }
        else
        {
            $strMsg = "Erro no query " . mysql_error() . " O administrador foi avisado. ";
            mail("jhouper@hotmail.com", "Erro Mysql"
                , "Erro : " . mysql_error() . "===>" . date("d/m/Y H:i:s")
                , "From: jhouper@hotmail.com");
        }
    }

    echo "  <div id='page-wrapper'>
                <div class='row'>
                    <div class='col-lg-12' id='mensagem'>"
                        .$strMsg."<a href='listPedido.php'>Listar Pedidos</a>
                    </div>";
require_once("rodape.php");