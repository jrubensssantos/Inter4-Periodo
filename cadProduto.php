<?php require_once("topo.php");
	$arrDados = $_GET;
	
	$arrDados["idProduto"] = mysql_real_escape_string($arrDados["idProduto"]); 
	$idProduto = $arrDados["idProduto"]==""?0:$_GET["idProduto"];
	if($idProduto!=0)
	{
		$strSQL = "SELECT
						 DsProduto
						, NuValor
					FROM
						teProduto
					WHERE
						idProduto = '{$arrDados["idProduto"]}' "; 
	
		$objRow = mysql_fetch_array(mysql_query($strSQL));
	}
?>
       <div id="page-wrapper">
	       	<div class="row">
		        <div class="col-lg-12">
		            <h1 class="page-header">Cadastro de Produtos</h1>
		        </div><!-- /.col-lg-12 -->
		    </div><!-- /.row -->
          	<div class="col-lg-12">      
        		<div class="panel panel-default">
            		<div class="panel-body">
            			<form class="form-horizontal" name="formCadProd" id="formCadProd" action="produtos.php" method="post">
							<div class="form-group">														
								<div class="col-sm-4">
									<label for="DsProduto">Produto</label>									
									<div class="input-group">
								      	<div class="input-group-addon"></div>
								      	<input type="hidden" name="idProduto" id="idProduto" value="<?php echo $arrDados["idProduto"]; ?>" />
								      	<input type="hidden" name="acao" id="acao" value="E" />								      	
								      	<input class="form-control" name="DsProduto" id="DsProduto" type="text" placeholder="Nome" maxlength="100" value="<?php echo $objRow['DsProduto']; ?>">
									</div><span id="erron"></span>
								</div>                   
							</div>
							<div class="form-group">														
								<div class="col-sm-2">
									<label for="NuValor">Valor</label>
									<div class="input-group">
										<div class="input-group-addon"></div>						      	
										<input class="form-control" name="NuValor" id="NuValor" type="text" placeholder="Valor" maxlength="100" value="<?php echo $objRow['NuValor']; ?>">
									</div><span id="errof"></span>
								</div>                   
							</div>
							<div class="form-group">					
								<div class="col-sm-3">
									<label for="Categoria">Categoria</label>
									<div class="input-group">
								      	<div class="input-group-addon"></div>								      	
								      	<select id="teCategoria_idCategoria" name="teCategoria_idCategoria" class="form-control">
								      		<option>Selecione a categoria</option>
								      			
								      		<?php 
									      		$strSQL = 	"	
									      						SELECT 	
									      							idCategoria
																	, NmCategoria												
																FROM 
																	teCategoria
															";
												$objRs = mysql_query($strSQL);
													
									      		while ($retorna = mysql_fetch_array($objRs))
												{
													echo "<option ";
													echo ($retorna["idCategoria"] === $objRow["teCategoria_idCategoria"])? 
													" selected = 'selected ' ":"";
													echo " value='{$retorna['idCategoria']}'>{$retorna['NmCategoria']}";
													echo "</option>";													
												}
											?>
										</select>
									</div>									
								</div>                   
							</div>				            
			  			</form>
					</div>
				  	<div class="modal-footer">					       
				        <button name="btnSalvar" id="btnSalvar" class="btn btn-success">Salvar</button>
				        <a href="listProduto.php"><button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
				  	</div>
				</div>
			</div>
			<script language="JavaScript">
				//function validaCampo(){
				document.getElementById("btnSalvar").onclick = function () 
				{
					var produto = document.getElementById("DsProduto").value;			
					if(produto.length <= 3)
					{ 
						document.getElementById("erron").innerHTML="<font color='red'>O nome do produto dever ter no mínimo 3 caracter.</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("erron").innerHTML="";
					};
					var NuValor = document.getElementById("NuValor").value;			
					if(NuValor == "")
					{ 
						document.getElementById("errof").innerHTML="<font color='red'>Digite o preço do produto.</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("errof").innerHTML="";
					};
					
					if(isNaN(NuValor))
					{ 
						document.getElementById("errof").innerHTML="<font color='red'>Digite um valor numérico.</font>";
						//window.alert("Este campo é obrigatório!");
						return false;
					}
					else 
					{
						document.getElementById("errof").innerHTML="";
					};
					
					document.getElementById("formCadProd").submit();   
				};
				//};
			</script>
		<?php require_once("rodape.php"); ?>