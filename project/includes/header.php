<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Dogs vs. Cats</title>
		<link href="../main.css" type="text/css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Cabin:700" rel="stylesheet">
	</head>
	<body>
		<div class="content">
			<div class="page-top">
				<div class="page-title">
					<h1>Dogs vs. Cats</h1>
					<h3>The ultimate resourse for deciding which pet you should get</h3>
				</div>
				<div class="nav page-nav">
					<div class="nav-horiz">
						<table class="">
							<tbody>
								<tr>
									<td>
										<a href="../index.html">Home</a>
									</td>
									<td>
										<a href="../quiz.html">Quiz</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="nav nav-horiz">
						<h4>Dogs:</h4>
						<table>
							<tbody>
								<tr>
									<td>
										<a href="<?php getPath("dogs", "breeds.php"); ?>">Breeds</a>
									</td>
									<td>
										<a href="<?php getPath("dogs", "tips.php"); ?>">Care</a>
									</td>
									<td>
										<a href="<?php getPath("dogs", "pictures.php"); ?>">Pictures</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="nav nav-horiz">
						<h4>Cats:</h4>
						<table>
							<tbody>
								<tr>
									<td>
										<a href="<?php getPath("cats", "breeds.php"); ?>">Breeds</a>
									</td>
									<td>
										<a href="<?php getPath("cats", "tips.php"); ?>">Care</a>
									</td>
									<td>
										<a href="<?php getPath("cats", "pictures.php"); ?>">Pictures</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php
			function getPath($directory, $pageName) {
				$result = "";
				if ($directory == $currentDir) {
					$result += "../";
				}
				$result += $directory + "/" + $pageName;
				return $result;
			}
			?>
