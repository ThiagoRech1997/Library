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
					<center>
						<?php if (!$_POST['nEdi_Nome']||!$_POST['rEnd_Descricao']||!$_POST['rBai_Descricao']||!$_POST['rCid_Descricao']){ ?>
						<strong>Você não preencheu todos os campos</strong><a href='javascript:history.back(1);'>&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-left" aria-hidden="true">Voltar</span></a>
						<?php
						}else{
							$SqlSit2 = "UPDATE tb_editora set
								Edi_Nome        = '$_POST[nEdi_Nome]',
								Edi_Codendereco = '$_POST[rEnd_Descricao]',
								Edi_Codbairro   = '$_POST[rBai_Descricao]',
								Edi_Codcidade   = '$_POST[rCid_Descricao]',
								Edi_Fone        = '$_POST[nEdi_Fone]',
								Edi_Contato     = '$_POST[nEdi_Contato]'
								where Edi_Codigo = $_REQUEST[Codigo]";
							$rsSit2 = mysql_query($SqlSit2, $conexao) or die (mysql_error());
							echo ("<span class='label label-success'>A Editora foi atualizado com sucesso</span></h2>");
							echo ("<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=update.php'>");   
						}
						mysql_close($conexao);
						?>
					</center>
				</div>
			</div>
		</div>

		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/scripts.js"></script>
	</body>
</html>