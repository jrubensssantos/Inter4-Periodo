<?php require_once("topo.php");
$arrDados = $_REQUEST;

$arrDados["idCliente"] = mysql_real_escape_string($arrDados["idCliente"]);
$idUsuario = $arrDados["idCliente"]==""? 0: $arrDados["idCliente"];
if($idUsuario!=0)
{
    $strSQL = "SELECT
                          idCliente
						, NmCliente
						, DsTelefone
					FROM
						teCliente
					WHERE
					    1 = 1";
    if($idUsuario == 0){ $strSQL += " AND idCliente= '". $idUsuario ."';"; }
    $objRow = mysql_fetch_array(mysql_query($strSQL));
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Pedido</h2>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" name="formCadPedido" id="formCadPedido" action="pedidos.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="DsTelefone">Telefone</label>
                            <div class="input-group">
                                <div class="input-group-addon"></div>
                                <input class="form-control" name="DsTelefone" id="DsTelefone" type="text"
                                       placeholder="telefone" maxlength="20" value="<?php echo $objRow['DsTelefone']; ?>"
                                       onkeypress="mascaraTelefone(this)" >
                            </div><span id="errDsTelefone"></span>
                        </div>
											
							<div class="col-sm-6">
								<label for="Cliente">Cliente</label>
								<div class="input-group">
							      	<div class="input-group-addon"></div>								      	
							      	<select id="teCliente_idCliente" name="teCliente_idCliente" class="form-control">
							      		<option>Selecione o Cliente</option>
							      			
							      		<?php 
								      		$strSQL = 	"	
								      						SELECT 	
								      							idCliente
																, NmCliente												
															FROM 
																teCliente
														";
											$objRs = mysql_query($strSQL);
												
								      		while ($retorna = mysql_fetch_array($objRs))
											{
												echo "<option ";
												echo ($retorna["idCliente"] === $objRow["teCliente_idCliente"])? 
												" selected = 'selected ' ":"";
												echo " value='{$retorna['idCliente']}'>{$retorna['NmCliente']}";
												echo "</option>";													
											}
										?>
									</select>
								</div>									
							</div>
						</div>
                        <!-- <div class="col-sm-6">
                            <label for="NmCliente">Nome Cliente</label>
                            <div class="input-group">
                                <div class="input-group-addon"></div>
                                <input type="hidden" name="idCliente" id="idCliente"
                                       value="<?php echo $arrDados["idCliente"]; ?>" />
                                <input type="hidden" name="acao" id="acao" value="E" />
                                <input class="form-control" name="NmCliente" id="NmCliente" type="text"
                                       placeholder="Nome" maxlength="100" value="<?php echo $objRow['NmCliente']; ?>">
                            </div><span id="errNmCliente"></span>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-sm-9">
                            <label for="DsEnderecoEntrega">Endereço de entrega</label>
                            <div class="input-group">
                                <div class="input-group-addon"></div>
                                <input class="form-control" name="DsEnderecoEntrega" id="DsEnderecoEntrega"
                                       type="text" placeholder="Endereço de entrega" maxlength="255"
                                       value="">
                            </div><span id="errDsEnderecoEntrega"></span>
                        </div>
                    </div>
					
					<div class="form-group">					
						<div class="col-sm-3">
							<label for="ItemPedido">Produto</label>
							<div class="input-group">
						      	<div class="input-group-addon"></div>								      	
						      	<select id="teProduto_idProduto" name="teProduto_idProduto" class="form-control">
						      		<option>Selecione o produto</option>
						      			
						      		<?php 
							      		$strSQL = 	"	
							      						SELECT 	
							      							idProduto
															, DsProduto												
														FROM 
															teProduto
													";
										$objRs = mysql_query($strSQL);
											
							      		while ($retorna = mysql_fetch_array($objRs))
										{
											echo "<option ";
											echo ($retorna["idProduto"] === $objRow["teProduto_idProduto"])? 
											" selected = 'selected ' ":"";
											echo " value='{$retorna['idProduto']}'>{$retorna['DsProduto']}";
											echo "</option>";													
										}
									?>
								</select>
							</div>									
						</div>                   
							
					
                    <!-- <div class="form-group">
                        <div class="col-sm-6">
                            <label for="DsProduto">Produto</label>
                            <div class="input-group">
                                <div class="input-group-addon"></div>
                                <input type="hidden" name="idProduto" id="idProduto"
                                       value="<?php echo $arrDados["IdProduto"]; ?>" />
                                <input type="hidden" name="acao" id="acao" value="E" />
                                <input class="form-control" name="DsProduto" id="DsProduto" type="text"
                                       placeholder="Produto" maxlength="100" value="<?php echo $objRow['DsProduto']; ?>">
                            </div><span id="errDsProduto"></span>
                        </div> -->

                        <div class="col-sm-3">
                            <label for="NuQuantidade">Quantidade</label>
                            <div class="input-group">
                                <div class="input-group-addon"></div>
                                <input class="form-control" name="NuQuantidade" id="NuQuantidade" type="text"
                                       placeholder="Quantidade" maxlength="10" onkeypress='return numero(event)'>
                            </div><span id="errNuQuantidade"></span>
                        </div>

                        <div class="col-sm-3">
                            <label for="NuValor">Valor Unitário</label>
                            <div class="input-group">
                                <div class="input-group-addon"></div>
                                <input class="form-control" name="NuValor" id="NuValor" type="text"
                                       placeholder="Total" maxlength="50">
                            </div><span id=""></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button name="btnIncluir" id="btnIncluir" class="btn btn-success" onsubmit=false>Incluir Item</button>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="table-responsive">

                                <table name="tblItens" id="tblItens"
                                       class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col-m01">Cód.</th>
                                            <th class="col-m04">Produto</th>
                                            <th class="col-m02">Quantidade</th>
                                            <th class="col-m02">Valor Unitário</th>
                                            <th class="col-m02">Valor Total</th>
                                            <th class="col-m01">Açoes</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button name="btnSalvar" id="btnSalvar" class="btn btn-success">Gravar</button>
                <a href="listPedido.php"><button name="cancelar" id="cancelar" class="btn btn-default"
                                                  data-dismiss="modal">Cancelar</button></a>
            </div>
        </div>
    </div>
    <script language="JavaScript">

        document.getElementById("btnIncluir").onclick = function () {
            var table = document.getElementById("tblItens");
            var numOfRows = table.rows.length;
            var newRow = table.insertRow(numOfRows);

            var idProduto = document.getElementById('idProduto');
            var dsProduto = document.getElementById('DsProduto');
            var nuQuantidade = document.getElementById('NuQuantidade');
            var nuValor = document.getElementById('NuValor');
            var nuTotalProduto = document.getElementById('NuTotalProduto');

            if(idProduto > 0 && nuQuantidade > 0 && !isNaN(nuQuantidade)) {
                // Faz um loop para criar as colunas
                for (var j = 0; j < 6; j++) {
                    // Insere uma coluna na nova linha
                    newCell = newRow.insertCell(j);
                    // Insere um conteúdo na coluna
                    if (j == 0) { newCell.innerHTML = idProduto.value(); };
                    if (j == 1) { newCell.innerHTML = dsProduto.value(); };
                    if (j == 2) { newCell.innerHTML = nuQuantidade.value(); };
                    if (j == 3) { newCell.innerHTML = nuValor.value(); };
                    if (j == 4) { newCell.innerHTML = nuTotalProduto.value(); };
                    if (j == 5) { newCell.innerHTML = "<a href='#' onclick='javascript: ExcluirItem();' title='ExcluirItem'> " +
                                                      "<img src='images/delete.png' alt='ExcluirItem' /> </a>";
                    };
                };
            }
            else
            {
                if (idProduto == null || isNaN(idProduto)) {
                    window.alert('Produto inválido ou não cadastrado');
                    document.getElementById("DsProduto").focus();
                    return false;
                }
                else if (nuQuantidade == null || isNaN(nuQuantidade)) {
                    window.alert('Quantidade inválida');
                    document.getElementById("NuQuantidade").focus();
                    return false;
                }
            }
            return false;
        };


        document.getElementById("btnSalvar").onclick = function ()
        {
            var dsTelefone = document.getElementById("DsTelefone").value;
            var nmCliente = document.getElementById("NmCliente").value;
            var dsEnderecoEntrega = document.getElementById("DsEnderecoEntrega").value;
            var idProduto = document.getElementById("idProduto").value;
            var nuQuantidade = document.getElementById("NuQuantidade").value;

            if(dsTelefone.length <= 13)
            {
                document.getElementById("errDsTelefone").innerHTML="<font color='red'>Telefone Invalido</font>";
                return false;
            }
            else
            {
                document.getElementById("errDsTelefone").innerHTML="";
            };

            if(nmCliente.length < 5)
            {
                document.getElementById("errNmCliente").innerHTML="<font color='red'>Verifique o nome do Cliente</font>";
                return false;
            }
            else
            {
                document.getElementById("errNmCliente").innerHTML="";
            };

            if(dsEnderecoEntrega.length <= 10)
            {
                document.getElementById("errDsEnderecoEntrega").innerHTML="<font color='red'>Endereço inválido ou não informado</font>";
                return false;
            }
            else
            {
                document.getElementById("errDsEnderecoEntrega").innerHTML="";
            };

            if(nuQuantidade.length > 0)
            {
                document.getElementById("errNuQuantidade").innerHTML="<font color='red'>Quantidade não informada</font>";
                return false;
            }
            else
            {
                document.getElementById("errNuQuantidade").innerHTML="";
            };

            if(idProduto.length > 0)
            {
                document.getElementById("errDsProduto").innerHTML="<font color='red'>Produto não cadastrado</font>";
                return false;
            }
            else
            {
                document.getElementById("errDsProduto").innerHTML="";
            };

            document.getElementById("formCadPedido").submit();
        };
        //};
    </script>
<?php require_once("rodape.php"); ?>