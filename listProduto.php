<?php 
	require_once("topo.php");
	$arrDados = $_POST;
?> 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Produtos cadastrados</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
	                <form id="form" name="form" method="post" accept-charset="listProduto.php">
	                	 
	                	<div class="form-group">					
							<div class="col-sm-12">									
								<div class="input-group">
							      	<div class="input-group-addon"><label for="fltProd">Pesquisar</label></div>								      	
							      	<input class="form-control" name="fltProd" id="fltProd" type="text" placeholder="insira sua pesquisa ..." maxlength="255" value="<?php echo $objRow['DsProduto']; ?>">
								</div>									
							</div>                   
						</div> 				 			
					</form>
				<div class="modal-footer">					      
			  	</div>	
				<div class="col-sm-12">
				    <div class="table-responsive">
				        <table class="table table-striped table-bordered table-hover">
				            <thead>
				                <tr>
				                    <th>Código</th>
				                    <th>Produto</th>
				                    <th>Valor</th>
				                    <th>Ação</th>
				                </tr>
				            </thead>                    
							<?php
								$arrDados["fltProd"] = mysql_real_escape_string($arrDados["fltProd"]);  
								$strSQL = "SELECT idProduto
												, DsProduto
												, NuValor
										FROM
												teproduto
										WHERE
												1=1 ";
								$strSQL .= strlen($arrDados["fltProd"])<=0?"":" AND DsProduto LIKE '%{$arrDados["fltProd"]}%' ";
								
								
								//pdo
								$objRs = mysql_query($strSQL);					
								while($objRow = mysql_fetch_array($objRs))
								{
									echo "<tr>";
										echo "<td>{$objRow["idProduto"]}</td>";
										echo "<td>{$objRow["DsProduto"]}</td>";
										echo "<td>{$objRow["NuValor"]}</td>";
										echo "<td class='center'>
												<a href='cadProduto.php?idProduto={$objRow["idProduto"]}' title='Editar'>
													<img src='images/edit.png' alt='Editar' />
												</a>
												<a href='#' onclick='javascript: excluir({$objRow['idProduto']});' title='Excluir'>
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
							if(!window.confirm("Deseja realmente excluir o registo  " + pstrId + "?"))
							{
								return false; 
							}
							else
							{
								window.location="produtos.php?idProduto=" + pstrId + "&acao=D";
							};
						};
					</script>
				<?php 
				require_once("rodape.php");