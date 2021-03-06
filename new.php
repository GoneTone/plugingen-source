<?php
use pg\lib\Project;

include_once dirname(__FILE__) . "/utils.php";
if(getProject() instanceof Project){
	include "utils.php";
	return;
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/form.css">
	<title>Create New Project</title>
	<script>
		function validateName(name){
			return name.replace(/[^A-Za-z0-9 _.-]/g, "");
		}
		$("#submitButton").click(function(){
			var nameInput = $("#nameInput");
			nameInput.val(validateName(nameInput.val()));
		});
	</script>
	<?= INCLUDE_JQUERY ?>
</head>
<body>
<h1>Start New Plugin Project</h1>
<hr>
<?php if(isset($_GET["err"])): ?>
	<div>
		<a class="error"><?= $_GET["err"] ?></a>
	</div>
<?php endif ?>
<form action="initProject.php" method="post">
	<table>
		<tr>
			<td class="left"><label for="name">Plugin Name:</label></td>
			<td class="right">
				<input class="textbox" type="text" name="name" id="nameInput" placeholder="Can only be A-Z, a-z, 0-9 and _">
			</td>
		</tr>
		<tr>
			<td class="left"><label for="authors">Author(s):</label></td>
			<td class="right">
				<input class="textbox" type="text" name="authors" placeholder="Separate names by commas">
			</td>
		</tr>
		<tr>
			<td class="left"><label for="version">Version:</label></td>
			<td class="right"><input class="textbox" type="text" name="version" value="1.0.0"></td>
		</tr>
		<tr>
			<td class="left"><label for="website">Website:</label></td>
			<td class="right">
				<input class="codebox" type="url" name="website" placeholder="(Optional)">
			</td>
		</tr>
	</table>
	<p>
		<input class="button" type="submit" id="submitButton" value="Start">
	</p>
</form>
</body>
</html>
