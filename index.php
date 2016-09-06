<html>
  <head>
    <title>Selenium & RobotFramework upload</title>
  </head>

<body>

	<p>
	    Selenium.<br />
	    You can upload your tests files here. It will be copied in "tests" directory.
	</p>

	<form action="upload.php" method="post" enctype="multipart/form-data">
	<p>

		<p>
	        Test files (.robot):<br />
	        <input type="file" name="myfile" /><br />
	    </p>

	    <input type="submit" name="exec" value="Test file upload" />

	</p>
	</form>

	</body>
</html>
