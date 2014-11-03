<?php 
	require_once("topo.php");
	$arrDados = $_POST;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Usuários cadastrados</h2>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            	<a href="relatorios/Relatorio_Usuario.php"><button name="relatorio" id="relatorio" class="btn btn-default" data-dismiss="modal">Gerar Relatório</button></a>
                <div class="panel-body">
	                <form id="form" name="form" method="post" accept-charset="listUsuario.php">
	                	<div class="form-group">					
							<div class="col-sm-12">									
								<div class="input-group">
							      	<div class="input-group-addon"><label for="fltEmail">Pesquisar</label></div>								      	
							      	<input class="form-control" name="fltEmail" id="fltEmail" type="text" placeholder="insira sua pesquisa ..." maxlength="255" value="<?php echo $objRow['DsEmail']; ?>">
								</div>									
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
				                    <th>Nome</th>
				                    <th>E-mail</th>
				                    <th>Status</th>
				                    <th>Ação</th>
				                </tr>
				            </thead>                    
							<?php						
							$strSQL = "SELECT idUsuario, NmUsuario, DsEmail, FgStatus FROM tele_entregas.teUsuario WHERE 1=1";
									//if de uma linha que trabalha os dois escopos true ou false de forma simplificada.		
							$strSQL .= (strlen($arrDados["fltEmail"]) <= 0)?"" :" AND DsEmail LIKE '%".mysql_real_escape_string($arrDados["fltEmail"])."%'";				
							$objRs = mysql_query($strSQL);
							
							while ($objRow = mysql_fetch_array($objRs))
							{	
							
								echo "<tr>";
								echo "<td> {$objRow['NmUsuario']} </td>";
								echo "<td> {$objRow['DsEmail']} </td>";
								echo "<td>";
									echo($objRow[FgStatus] === 'A' ? 'Ativo' : 'Bloqueado');
								echo "</td>";								
								echo "<td class='center'>
									<a href='editUsuario.php?idUsuario={$objRow["idUsuario"]}' title='Editar'>
										<img src='images/edit.png' alt='Editar' />
									</a>
									<a href='mudaSenha.php?idUsuario={$objRow["idUsuario"]}' title='Mudar senha'>
										<img src='images/pass.png' alt='Mudar senha' />
									</a>
									<a href='#' onclick='javascript: excluir({$objRow['idUsuario']});' title='Excluir'>
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
								window.location="usuarios.php?idUsuario=" + pstrId + "&acao=D";
							};
						};
					</script>	
					<?php require_once("rodape.php");