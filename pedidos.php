<?php
	require_once("topo.php");
    $arrDados = $_REQUEST;

    

    echo "  <div id='page-wrapper'>
	        <div class='row'>
	            <div class='col-lg-12' id='mensagem'>"
	                .$strMsg."<a href='listPedido.php'>Listar Pedidos</a>
	            </div>";
require_once("rodape.php");