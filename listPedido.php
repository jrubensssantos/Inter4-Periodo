<?php
    require_once("topo.php");
    $arrDados = $_POST;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Pedidos cadastrados</h2>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-body">
    <form id="form" name="form" method="post" accept-charset="listPedido.php">
        <div class="form-group">
            <div class="col-sm-8">
                <div class="input-group">
                    <div class="input-group-addon"><label for="fltEmail">Pesquisar</label></div>
                    <input class="form-control" name="fltEmail" id="fltEmail" type="text" placeholder="insira sua pesquisa ..."
                           maxlength="255" value="<?php echo $arrDados['fltEmail']; ?>">
                </div>
            </div>
            <div class="clo-sm-4">
                <input type="submit" id="btnFiltrar" name="btnFiltrar" value="Filtrar" class="btn" />
            </div>
        </div>
    </form>
    <div class="modal-footer">
    </div>
    <div class="col-lg-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>N° Pedido</th>
                    <th>Cliente</th>
                    <th>Data Pedido</th>
                    <th>Endereço Entrega</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
            $strSQL = "SELECT idPedido, NmCliente, DATE_FORMAT(DtPedido, '%d/%m/%Y' ) AS DtPedido, DsEnderecoEntrega
                       FROM tele_entregas.vwpedidocliente
                       WHERE 1=1 AND FgStatus= 'A'";
            //if de uma linha que trabalha os dois escopos true ou false de forma simplificada.
            $strSQL .= (strlen($arrDados["fltEmail"]) <= 0)?"" :" AND fltFiltro LIKE '%".mysql_real_escape_string($arrDados["fltEmail"])."%'";
            $objRs = mysql_query($strSQL);

            while ($objRow = mysql_fetch_array($objRs))
            {
                echo "<tr>";
                echo "<td> {$objRow['idPedido']} </td>";
                echo "<td> {$objRow['NmCliente']} </td>";
                echo "<td> {$objRow['DtPedido']} </td>";
                echo "<td> {$objRow['DsEnderecoEntrega']} </td>";
                echo "<td class='center'>   <a href='editPedido.php?idPedido={$objRow["idPedido"]}' title='Editar'>
										        <img src='images/edit.png' alt='Editar' />
									        </a>
									        <a href='#' onclick='javascript: excluir({$objRow['idPedido']});' title='Excluir'>
										        <img src='images/delete.png' alt='Excluir' />
									        </a>
                      </td>";
                echo "</tr>";
            }

            ?>
        </table>
    </div>
    <script language="javascript">
        function excluir(pstrId)
        {
            if(!window.confirm("Deseja realmente excluir o pedido  " + pstrId + "?"))
            {
                return false;
            }
            window.location="pedido.php?idPedido=" + pstrId + "&acao=D";
        };
    </script>
<?php require_once("rodape.php");