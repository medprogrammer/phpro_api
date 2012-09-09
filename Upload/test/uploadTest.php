<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="upload_file.php" method="post" enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file" />
		<select name="type" id="type">
			<option value="0">all</option>
			<option value="1">image</option>
			<option value="...">...</option>
		</select>
		<br />
		<input type="submit" name="submit" value="Submit" />
	</form>
</body>
</html>