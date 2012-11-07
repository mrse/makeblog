<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Untitled</title>
	<meta name="generator" content="BBEdit 10.1" />
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
</head>
<body>

<?php

function js_page_2_form() { ?>

<form method="post" action="post.php">

<div class="clearfix">
	
	<label for="xlInput">Post Title</label>

	<div class="input">
		<input class="xlarge" id="xlInput" name="xlInput" size="30" type="text">
	</div>

</div>

<div class="clearfix">
	
	<label for="xlInput">Post Body</label>

	<div class="input">
		<textarea class="xlarge" id="body" name="body"></textarea>
	</div>

</div>

<div class="clearfix">

	<label for="fileInput">Image Upload</label>
	
	<div class="input">
		<input class="input-file" id="fileInput" name="fileInput" type="file">
	</div>

</div>

</form>

</body>
</html>

<?php } ?>