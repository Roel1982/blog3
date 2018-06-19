<?php
  if ($_REQUEST) {

    //Check if the file is well uploaded
	if($_FILES['afbeelding']['error'] > 0) { echo 'Error during uploading, try again'; }

	//We won't use $_FILES['file']['type'] to check the file extension for security purpose

	//Set up valid image extensions
	$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );

	//Extract extention from uploaded file
		//substr return ".jpg"
		//Strrchr return "jpg"

	$extUpload = strtolower( substr( strrchr($_FILES['afbeelding']['name'], '.') ,1) );
	//Check if the uploaded file extension is allowed

	if (in_array($extUpload, $extsAllowed) ) {

	//Upload the file on the server

	$name = "uploads/{$_FILES['afbeelding']['name']}";
	$result = move_uploaded_file($_FILES['afbeelding']['tmp_name'], $name);

	if($result){echo "<img src='$name'/>";}

	} else { echo 'File is not valid. Please try again'; }

//printen variabelen

    $auteur = $_REQUEST["auteur"];
    $bericht = $_REQUEST["bericht"];
    $submit = $_REQUEST["submit"];

    $file = 'blog.txt';
    // Open the file to get existing content
    $current = file_get_contents($file);
    // Append a new person to the file
    $current = "<img src='$name'/><br> $auteur<br> $bericht<br>" . $current;
    // Write the contents back to the file
    file_put_contents($file, $current);
  }
  ?>

<!--start HTML -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="javascript.js"></script>
  </head>
  <body onload="iFrameOn();">
    <form action="index.php" method="post" name="myForm" id="myForm" enctype="multipart/form-data">
      Auteur:

      <input type="text" name="auteur" value=""><br><br>
      <input type="file" name="afbeelding"><br><br>
      <input type="button" onclick="iBold()" value="B">
      <input type="button" onclick="iUnderline()" value="U">
      <input type="button" onclick="iItalic()" value="I"><br><br>



      Bericht: <br> <textarea style="display:none;" name="bericht" id="bericht" rows="8" cols="80"></textarea><br>
      <iframe name="richTextField" id="richTextField" style="border:#000 1px solid; width:700px; height:400px;"></iframe>


    <br><br><input name="myBtn" type="button" value="Submit Data" onclick="javascript:submit_form();">
    </form>
    <?php
        echo $current;
    ?>
  </body>
</html>
