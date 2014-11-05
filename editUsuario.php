<?php require_once("topo.php"); 
	$arrDados = $_GET;
	
	$arrDados["idUsuario"] = mysql_real_escape_string($arrDados["idUsuario"]);
	$idUsuario = $arrDados["idUsuario"]==""?0:$arrDados["idUsuario"];
	if($idUsuario!=0)
	{
		$strSQL = "SELECT
						 NmUsuario
						, DsEmail
					FROM
						teUsuario
					WHERE
						idUsuario = '{$arrDados["idUsuario"]}' "; 
	
		$objRow = mysql_fetch_array(mysql_query($strSQL));
	}
?>
       <div id="page-wrapper">
            <h1>Cadastro de usuário</h1>
          	<div class="col-lg-12">      
        		<div class="panel panel-default">
            		<div class="panel-body">
            			<form class="form-horizontal" name="formCadUser" id="formCadUser" action="usuarios.php" method="post">
							<div class="form-group">														
								<div class="col-sm-8">
									<label for="NmUsuario">Nome</label>
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-user"></span></div>
								      	<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $arrDados["idUsuario"]; ?>" />
								      	<input type="hidden" name="acao" id="acao" value="E" />								      	
								      	<input class="form-control" name="NmUsuario" id="NmUsuario" type="text" placeholder="Nome" maxlength="100" value="<?php echo $objRow['NmUsuario']; ?>">
									</div><span id="erron"></span>
								</div>                   
							</div>
       						<div class="form-group">					
								<div class="col-sm-8">
									<label for="DsEmail">Email</label>
									<div class="input-group">
								      	<div class="input-group-addon">@</div>								      	
								      	<input class="form-control" name="DsEmail" id="DsEmail" type="text" placeholder="Email" maxlength="255" value="<?php echo $objRow['DsEmail']; ?>">
									</div><span id="erroe"></span>										
								</div>                   
							</div>
							<div class="form-group">														
								<div class="col-sm-2">
									<label for="FgStatus">Status</label>
									<div class="input-group">
										<div class="input-group-addon"></div>						      	
										<select id="FgStatus" name="FgStatus" class="form-control">
											<option value="A" <?php echo $objRow["FgStatus"]==="A"?" selected = 'selected' ":""; ?> >Ativo</option>
											<option value="B" <?php echo $objRow["FgStatus"]==="B"?" selected = 'selected' ":""; ?> >Bloqueado</option>
											</select> 
										<br />
									</div><span id="errof"></span>
								</div>                   
							</div>
			  			</form>
					</div>
				  	<div class="modal-footer">					       
				        <button name="btnSalvar" id="btnSalvar" class="btn btn-success">Salvar</button>
				        <a href="listUsuario.php"><button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
				  	</div>
				</div>
			</div>
			<script language="JavaScript">
				document.getElementById("btnSalvar").onclick = function () 
				{
					var nome = document.getElementById("NmUsuario").value;			
					if(nome.length <= 3)
					{ 
						document.getElementById("erron").innerHTML="<font color='red'>O nome dever ter mais de 3 caracter</font>";
						return false;
					}
					else 
					{
						document.getElementById("erron").innerHTML="";
					};
					var email = document.getElementById("DsEmail").value;			
					if(email.length <= 10)
					{ 
						document.getElementById("erroe").innerHTML="<font color='red'>Digite um email válido</font>";
						return false;
					}
					else 
					{
						document.getElementById("erroe").innerHTML=""; 
					};
					document.getElementById("formCadUser").submit();   
				};
			</script>
			<?php require_once("rodape.php"); ?>