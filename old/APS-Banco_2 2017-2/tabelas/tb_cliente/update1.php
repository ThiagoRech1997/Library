<?php
//VERIFICA SE A SESSÃO ESTÁ ATIVA
require_once("../../conection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="icon" href="../../icon/library.png">
		<title>Biblioteca</title>
		<link href="../../css/style.css" rel="stylesheet">

		<meta name="description" content="Source code generated using layoutit.com">
		<meta name="author" content="LayoutIt!">

		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/style.css" rel="stylesheet">

	</head>
	<body>
		<div class="container-fluid">
			<?php include '../../menu1.php';?>
			<div class="row" class="target">
				<div id="footer" class="col-md-12">
				<?php
				$sql = "select * from tb_cliente where Cli_Codigo= '$_REQUEST[Codigo]'";
				$rs = mysql_query($sql,$conexao) or die ("Consulta nao realizada");
				$linha=mysql_fetch_array($rs);
					$codigo   = $linha["Cli_Codigo"];
					$nome     = $linha["Cli_Nome"];
					$RG       = $linha["Cli_Rg"];
					$CPF      = $linha["Cli_Cpf"];
					$endereco = $linha["Cli_Codendereco"];
					$numero   = $linha["Cli_Numero"];
					$bairro   = $linha["Cli_Codbairro"];
					$cidade   = $linha["Cli_Codcidade"];
					$fone     = $linha["Cli_Fone"];
					$devol    = $linha["Cli_Prazodevol"];
				?>
					<center>
						<form class="form-horizontal" method = "post" action = "update2.php?Codigo=<?php echo $codigo;?>">
						<fieldset>

						<!-- Form Name -->
						<legend>Alterar Cliente</legend>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="nCli_Nome">Nome:</label>  
							<div class="col-md-4">
								<input id="nCli_Nome" name="nCli_Nome" type="text" value="<?php echo $nome; ?>" placeholder="" class="form-control input-md" required="">
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="nCli_RG">RG:</label>  
							<div class="col-md-4">
								<input id="nCli_RG" name="nCli_RG" type="number" value="<?php echo $RG; ?>" placeholder="" class="form-control input-md" required="">
								<span class="help-block">Somente Números</span>  
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="nCli_CPF">CPF:</label>  
							<div class="col-md-4">
								<input id="nCli_CPF" name="nCli_CPF" type="number" value="<?php echo $CPF; ?>" placeholder="" class="form-control input-md">
								<span class="help-block">Opcional, Apenas números</span>  
							</div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="rEnd_Descricao">Endereço:</label>
							<div class="col-md-4">
								<select id="rEnd_Descricao" name="rEnd_Descricao" class="form-control">
									<option value="<?php echo $endereco;?>">
										<?php $sql = "Select End_Descricao from tb_endereco where End_Codigo = ".$endereco;
										$rt = mysql_query($sql, $conexao) or die (mysql_error());
										$t=mysql_fetch_array($rt); echo utf8_encode($t['End_Descricao']);?></option>
									<?php 
										$sql = "Select Count(*) as 'Total' from tb_endereco";
										$rt = mysql_query($sql, $conexao) or die (mysql_error());
										$t=mysql_fetch_array($rt);
										$tam =$t["Total"];
									?>
									<?php
										for($i=1; $i<=$tam; $i++){
											$SqlSit2 = "Select End_Descricao from tb_endereco where End_Codigo= ".$i;
											$rt = mysql_query($SqlSit2, $conexao) or die (mysql_error());
											$n = mysql_fetch_array($rt);
											$nome1 = $n["End_Descricao"];
											echo utf8_encode ("<option value='".$i."'>".$nome1."</option>");
										}
									?>
								</select>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="nCli_Numero">nº:</label>  
							<div class="col-md-4">
								<input id="nCli_Numero" name="nCli_Numero" type="number" value="<?php echo $numero; ?>" placeholder="" class="form-control input-md">
								<span class="help-block">Opcional</span>  
							</div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="rBai_Descricao">Bairro:</label>
							<div class="col-md-4">
								<select id="rBai_Descricao" name="rBai_Descricao" class="form-control">
									<option value="<?php echo $bairro;?>">
										<?php $sql = "Select Bai_Descricao from tb_bairro where Bai_Codigo = ".$bairro;
										$rt = mysql_query($sql, $conexao) or die (mysql_error());
										$t=mysql_fetch_array($rt); echo utf8_encode($t['Bai_Descricao']);?></option>
									<?php 
										$sql = "Select Count(*) as 'Total' from tb_bairro";
										$rt = mysql_query($sql, $conexao) or die (mysql_error());
										$t=mysql_fetch_array($rt);
										$tam =$t["Total"];
									?>
									<?php
										for($i=1; $i<=$tam; $i++){
											$SqlSit2 = "Select Bai_Descricao from tb_bairro where Bai_Codigo= ".$i;
											$rt = mysql_query($SqlSit2, $conexao) or die (mysql_error());
											$n = mysql_fetch_array($rt);
											$nome1 = $n["Bai_Descricao"];
											echo utf8_encode ("<option value='".$i."'>".$nome1."</option>");
										}
									?>
								</select>
							</div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="rCid_Descricao">Cidade:</label>
							<div class="col-md-4">
								<select id="rCid_Descricao" name="rCid_Descricao" class="form-control">
									<option value="<?php echo $cidade;?>">
										<?php $sql = "Select Cid_Descricao from tb_cidade where Cid_Codigo = ".$cidade;
										$rt = mysql_query($sql, $conexao) or die (mysql_error());
										$t=mysql_fetch_array($rt); echo utf8_encode($t['Cid_Descricao']);?></option>
									<?php 
										$sql = "Select Count(*) as 'Total' from tb_cidade";
										$rt = mysql_query($sql, $conexao) or die (mysql_error());
										$t=mysql_fetch_array($rt);
										$tam =$t["Total"];
									?>
									<?php
										for($i=1; $i<=$tam; $i++){
											$SqlSit2 = "Select Cid_Descricao from tb_cidade where Cid_Codigo= ".$i;
											$rt = mysql_query($SqlSit2, $conexao) or die (mysql_error());
											$n = mysql_fetch_array($rt);
											$nome1 = $n["Cid_Descricao"];
											echo utf8_encode ("<option value='".$i."'>".$nome1."</option>");
										}
									?>
								</select>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="nCli_Fone">Fone:</label>  
							<div class="col-md-4">
								<input id="nCli_Fone" name="nCli_Fone" type="number" value="<?php echo $fone; ?>" placeholder="" class="form-control input-md" required="">
								<span class="help-block">Apenas números</span>  
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="nCli_Prazodevol">Prazo Devolução:</label>  
							<div class="col-md-4">
								<input id="nCli_Prazodevol" name="nCli_Prazodevol" value="<?php echo $devol; ?>" type="number" placeholder="" class="form-control input-md">
								<span class="help-block">Opcional</span>  
								</div>
						</div>

						<!-- Button (Double) -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="btnEnviar"></label>
							<div class="col-md-8">
								<button id="btnEnviar" name="btnEnviar" class="btn btn-success">Enviar</button>
								<button id="btnCancelar" name="btnCancelar" class="btn btn-danger">Cancelar</button>
							</div>
						</div>

						</fieldset>
						</form>
					</center>
				</div>
			</div>
		</div>

		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/scripts.js"></script>
	</body>
</html>