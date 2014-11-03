<?php 
	require_once("topo.php");
	$arrDados = $_POST;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Clientes cadastrados</h2>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
	                <form id="form" name="form" method="post" accept-charset="listClientes.php">
	                	<div class="form-group">					
							<div class="col-sm-12">									
								<div class="input-group">
							      	<div class="input-group-addon"><label for="fltNome">Pesquisar</label></div>								      	
							      	<input class="form-control" name="fltNome" id="fltNome" type="text" placeholder="insira sua pesquisa ..." maxlength="255" value="<?php echo $objRow['NmCliente bn']; ?>">
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
				                	<th>Data Nascimento</th>
				                    <th>Nome</th>
				                    <th>E-mail</th>
				                    <th>Telefone</th>
				                    <th>Ação</th>
				                </tr>
				            </thead>                    
							<?php						
							$strSQL = "SELECT idCliente, NmCliente, DsEmail, DsTelefone, DtNascimento FROM tele_entregas.teCliente WHERE 1=1";
									//if de uma linha que trabalha os dois escopos true ou false de forma simplificada.		
							$strSQL .= (strlen($arrDados["fltNome"]) <= 0)?"" :" AND NmCliente LIKE '%".mysql_real_escape_string($arrDados["fltNome"])."%'";				
							$objRs = mysql_query($strSQL);
							
							while ($objRow = mysql_fetch_array($objRs))
							{	
							
								echo "<tr>";
								echo "<td> {$objRow['DtNascimento']} </td>";
								echo "<td> {$objRow['NmCliente']} </td>";
								echo "<td> {$objRow['DsEmail']} </td>";
								echo "<td> {$objRow['DsTelefone']} </td>";
								echo "<td class='center'>
									<a href='editCliente.php?idCliente={$objRow["idCliente"]}' title='Editar'>
										<img src='images/edit.png' alt='Editar' />
									</a>							
									<a href='#' onclick='javascript: excluir({$objRow['idCliente']});' title='Excluir'>
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