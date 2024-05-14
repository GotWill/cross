<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
	session_start();
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: index.php");
	exit;
}

require_once("../assets/php/config.php");
require_once("../assets/php/select_users.php");


$result_view_users = mysqli_query($link, $select_view_users);
$export_result_view_users = mysqli_query($link, $select_view_users);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cross Pollination - Inscrição</title>
	<link rel="shortcut icon" href="../assets/img/fv.png" type="image/x-icon">
	<link rel="stylesheet" href="../assets/css/simple-datatables.css" />
	<link rel="stylesheet" href="../assets/css/soft-ui-dashboard.css" />

	<style>
		body {
			font-family: sans-serif !important;
		}

		.btn-primary {
			background-color: #9f84f8 !important;
		}

		.btn-primary:hover {
			background: #896aef !important;
		}

		.btn-excel {
			position: absolute;
			left: 300px;
			top: 190px;
			background: #f55449;
			color: #fff;
			display: flex;
			align-items: center;
			gap: 10px;
		}

		.btn-excel:hover {
			color: #fff;
		}

		.btn-excel i {
			font-size: 15px;
		}

		.dropdown-menu {
			right: 40px;
			top: 10px !important;
		}

		.navbar-dark .navbar-nav .nav-link {
			color: #000;
		}

		.navbar-dark .navbar-nav .show>.nav-link,
		.navbar-dark .navbar-nav .nav-link.active {
			color: #000 !important;
		}

		@media (max-width: 768px) {
			.btn-excel {
				position: inherit;
			}
		}

		.border {
			border: 1px solid white !important;
		}
	</style>
</head>

<body>
	<a id="dlink" style="display:none;"></a>
	<div id="editor"></div>


	<nav class="navbar navbar-dark bg-white navbar-expand-sm">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbar-list-4">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="user.png" width="40" height="40" class="rounded-circle">
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../"> Logout </a>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<div class="card-body p-3" style="margin-top: 5rem">

		<div class="table-responsive">
			<table class="table table-flush reposive" id="datatable-search" width="10%">
				<button type="button" class="btn btn-excel" id="btnExport">export PDF
					<i class="fa-solid fa-file-pdf"></i>
				</button>
				<thead class="thead-light">
					<tr class="text-center">
						<th>Nome:</th>
						<th>E-mail:</th>
						<th>Azul:</th>
						<th>Laranja</th>
						<th>Vermelho</th>
						<th>Roxo</th>
						<th>Verde</th>
						<th>Tempo</th>
						<th>Dat -</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = mysqli_fetch_array($result_view_users)) {
						?>
						<tr
							class="<?= $row['roxo'] == 2 && $row['vermelho'] == 3 && $row['verde'] == 5 && $row['laranja'] == 2 && $row['azul'] == 4 ? 'table-active border' : '' ?>">
							<td>
								<?= $row['nome'] ?>
							</td>
							<td>
								<?= $row['email'] ?>
							</td>

							<td>
								<?= $row['azul'] ?>
							</td>
							<td>
								<?= $row['laranja'] ?>
							</td>
							<td>
								<?= $row['vermelho'] ?>
							</td>
							<td>
								<?= $row['roxo'] ?>
							</td>
							<td>
								<?= $row['verde'] ?>
							</td>
							<td>
								<?= $row['tempo'] ?>
							</td>
							<td>
								<?= (new DateTime($row['data']))->format('d/m - H:i'); ?>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>




	<table class="table table-flush reposive d-none" id="tableExprt">
		<thead class="thead-light">
			<tr class="text-center">
				<th>Nome:</th>
				<th>E-mail:</th>
				<th>Azul:</th>
				<th>Laranja</th>
				<th>Vermelho</th>
				<th>Roxo</th>
				<th>Verde</th>
				<th>Tempo</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row = mysqli_fetch_array($export_result_view_users)) {
				?>
				<tr>
					<td >
						<?= $row['nome'] ?>
					</td>
					<td>
						<?= $row['email'] ?>
					</td>

					<td>
						<?= $row['azul'] ?>
					</td>
					<td>
						<?= $row['laranja'] ?>
					</td>
					<td>
						<?= $row['vermelho'] ?>
					</td>
					<td>
						<?= $row['roxo'] ?>
					</td>
					<td>
						<?= $row['verde'] ?>
					</td>
					<td>
						<?= $row['tempo'] ?>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/simonbengtsson/jsPDF/requirejs-fix-dist/dist/jspdf.debug.js"></script>

<script src="../assets/js/datatables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js"></script>
<script src="https://kit.fontawesome.com/3239e58e6a.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/jspdf-autotable@2.3.2"></script>

<script>
	const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
		searchable: true,
		fixedHeight: true,
	});

</script>
<script>


	$("#btnExport").click(function () {
		var doc = new jsPDF('p', 'pt');

		var res = doc.autoTableHtmlToJson(document.getElementById("tableExprt"));

		var header = function (data) {
			doc.setFontSize(18);
			doc.setTextColor(40);
			doc.setFontStyle('normal');
		};

		var options = {
			beforePageContent: header,
			margin: {
				top: 80
			},

			tableWidth: '100%',
			columnStyles: { 
				0: { cellWidth: '100%' }, 
				1: { cellWidth: '100%' }, 
			}
		};

		doc.autoTable(res.columns, res.data, options);

		doc.save("desafio.pdf");
	});




</script>

</html>