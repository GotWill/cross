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
require_once("../assets/php/select_users_inscricao.php");


$result_view_users = mysqli_query($link, $select_view_users);

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
			background: #175c37;
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
	</style>
</head>

<body>
	<a id="dlink" style="display:none;"></a>

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
				<button type="button" class="btn btn-excel d-none" id="btnExport"
					onclick="tableToExcel('datatable-search', 'name', 'dados.xls')">export excel <i
						class="fa-solid fa-file-excel"></i></button>
				<thead class="thead-light">
					<tr class="text-center">
						<th>Nome:</th>
						<th>Seu E-mail:</th>
						<th class="d-none">Área do time:</th>
						<th class="d-none">Qual é o tema central da análise de dados realizada?</th>
						<th class="d-none">Qual foi a pergunta de negócio que foi trabalhada?</th>
						<th class="d-none">Nos conte qual foi a jornada analítica de dados realizada e os principais
							resultados encontrados?</th>
						<th class="d-none">Quais foram as principais conclusões e insights relevantes que foram obtidos
							baseadas na sua jornada analítica?</th>
						<th class="d-none">Na sua opinião, por que a sua análise de dados merece ser selecionada para
							ser apresentada no dia do evento?</th>
						<th>Data</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = mysqli_fetch_array($result_view_users)) {
						$file = $row['arquivo'];
						$data = $row['data'];
						$timestamp = strtotime($data);
						$timestamp -= 3 * 60 * 60;
						$dataFormatada = date("d/m - H:i", $timestamp);

						?>
						<tr>
							<td>
								<?= $row['nome'] ?>
							</td>
							<td>
								<?= $row['pessoa_email'] ?>
							</td>

							<td class="d-none">
								<?= $row['area'] ?>
							</td>
							<td class="d-none">
								<?= $row['pergunta_1'] ?>
							</td>
							<td class="d-none">
								<?= $row['pergunta_2'] ?>
							</td>
							<td class="d-none">
								<?= $row['pergunta_3'] ?>
							</td>
							<td class="d-none">
								<?= $row['pergunta_4'] ?>
							</td>
							<td class="d-none">
								<?= $row['pergunta_5'] ?>
							</td>
							<td>
								<?= $dataFormatada ?>
							</td>
							<td>
								<a href="https://crosspollination.com.br/assets/php/uploads/<?= rawurlencode($file) ?>"
									class="btn btn-primary">
									BAIXAR DOCUMENTO
									<i class="fa-solid fa-download"></i>
								</a>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assets/js/datatables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js"></script>
<script src="https://kit.fontawesome.com/3239e58e6a.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
	const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
		searchable: true,
		fixedHeight: true,
	});

</script>
<script>
	var tmp;
	function strip(html) {
		tmp = document.createElement("DIV");
		tmp.innerHTML = html;
		console.log(tmp.innerText);
		console.log(tmp.textContent);

		return tmp.textContent || tmp.innerText || "";
	}

	var tableToExcel = (function () {
		var uri = 'data:application/vnd.ms-excel;base64,',
			template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
			base64 = function (s) {
				return window.btoa(unescape(encodeURIComponent(s)))
			},
			format = function (s, c) {
				return s.replace(/{(\w+)}/g, function (m, p) {
					return c[p];
				})
			}
		return function (table, name, filename) {
			if (!table.nodeType)
				table = $('#' + table).clone();

			var hyperLinks = table.find('a');
			for (i = 0; i < hyperLinks.length; i++) {

				var sp1 = document.createElement("span");
				var sp1_content = document.createTextNode($(hyperLinks[i]).text());
				sp1.appendChild(sp1_content);
				var sp2 = hyperLinks[i];
				var parentDiv = sp2.parentNode;
				parentDiv.replaceChild(sp1, sp2);
			}
			var ctx = {
				worksheet: name || 'Worksheet',
				table: table[0].innerHTML
			}


			document.getElementById("dlink").href = uri + base64(format(template, ctx));
			document.getElementById("dlink").download = filename;
			document.getElementById("dlink").click();

		}
	})()
</script>

</html>