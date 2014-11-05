<?php require_once("topo.php"); 
	$arrDados = $_GET;
	
	$arrDados["idCliente"] = mysql_real_escape_string($arrDados["idCliente"]);
	$idCliente = $arrDados["idCliente"]==""?0:$arrDados["idCliente"];
	if($idCliente!=0)
	{
		$strSQL = "SELECT
						 NmCliente
						, DsTelefone 
						, DsEmail
						, DtNascimento
					FROM
						teCliente
					WHERE
						idCliente = '{$arrDados["idCliente"]}' "; 
	
		$objRow = mysql_fetch_array(mysql_query($strSQL));
	}
?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Cadastro de Cliente</h2>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
	<div class="col-lg-12">      
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" name="formCadCli" id="formCadCli" action="clientes.php" method="post">
					<div class="form-group">														
						<div class="col-sm-2">
							<label for="DtNascimento">Data de Nacimento</label>
							<div class="input-group">
						      	<div class="input-group-addon"></div>
						      	<input type="hidden" name="acao" id="acao" value="E" />						      	
						      	<input type="hidden" name="idCliente" id="idCliente" value="<?php echo $arrDados['idCliente']; ?>" />					    
						      	<input type="date" class="form-control" name="DtNascimento" id="DtNascimento" value="<?php echo $objRow['DtNascimento']; ?>">							      	
							</div><span id="erro"></span>
						</div>                   
					</div>
					<div class="form-group">														
						<div class="col-sm-4">
							<label for="NmCliente">Nome</label>									
							<div class="input-group">								
								<div class="input-group-addon"></div>
								<input type="hidden" name="idCliente" id="idCliente" value="<?php echo $arrDados["idCliente"]; ?>" />
								<input type="hidden" name="acao" id="acao" value="E" />								      	
								<input class="form-control" name="NmCliente" id="NmCliente" type="text" placeholder="Nome" maxlength="100" value="<?php echo $objRow['NmCliente']; ?>">
							</div><span id="erron"></span>
						</div> 	
						<div class="col-sm-3">
							<label for="DsTelefone">Telefone</label>									
							<div class="input-group">								
								<div class="input-group-addon"></div>								      	
								<input class="form-control" name="DsTelefone" id="DsTelefone" type="text" placeholder="telefone" maxlength="20" value="<?php echo $objRow['DsTelefone']; ?>">
							</div><span id="errot"></span>										
						</div>                   
					</div>
					<div class="form-group">					
						<div class="col-sm-7">
							<label for="DsEmail">Email</label>										
							<div class="input-group">
								<div class="input-group-addon"></div>															      	
								<input class="form-control" name="DsEmail" id="DsEmail" type="text" placeholder="Email" maxlength="255" value="<?php echo $objRow['DsEmail']; ?>">
							</div><span id="erroe"></span>										
						</div>                   
					</div>
				</form>
			</div>
			<div class="modal-footer">					       
				<button name="btnSalvar" id="btnSalvar" class="btn btn-success">Salvar</button>
				<a href="listCliente.php"><button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
			</div>
		</div>
	</div>
	<script language="JavaScript">
		document.getElementById("btnSalvar").onclick = function () 
		{
			var nome = document.getElementById("NmCliente").value;			
			if(nome.length <= 3)
			{ 
				document.getElementById("erron").innerHTML="<font color='red'>O nome dever ter mais de 3 caracter</font>";
				return false;
			}
			else 
			{
				document.getElementById("erron").innerHTML="";
			};
			var nome = document.getElementById("DsTelefone").value;			
			if(nome.length < 12)
			{ 
				document.getElementById("errot").innerHTML="<font color='red'>O telefone é obrigatório</font>";
				return false;
			}
			else 
			{
				document.getElementById("errot").innerHTML="";
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
			document.getElementById("formCadCli").submit();   
		};
		//};
	</script>
	<?php require_once("rodape.php"); ?>