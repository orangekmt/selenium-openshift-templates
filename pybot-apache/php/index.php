<html>
  <head>
    <title>Selenium & RobotFramework upload</title>
    <link rel="stylesheet" media="screen" type="text/css" title="design" href="main.css"/>
  </head>

<body>

    <h1>Selenium</h1>
	<p>
	    You can upload your tests files here. It will be copied in "/opt/app-root/src/tests" directory.
	</p>

	<form action="upload.php" method="post" enctype="multipart/form-data">
	<p>

		<p>
	        Test files (.robot):<br />
	        <input id="upload" type="file" name="myfile" /><br />
	    </p>

	    <input id="upload_validation" type="submit" name="exec" value="Upload" />

	</p>
	</form>

		<div>

		<h2> Files available </h2>

		<?php
			
			function scan($dir) {
			    // On regarde déjà si le dossier existe
			    if(is_dir($dir)) {
			        // On le scan et on récupère dans un tableau le nom des fichiers et des dossiers
			        $files = scandir($dir);
			 
			        // On supprime . et .. qui sont respectivement le dossier courant et le dossier précédent
			        unset($files[0], $files[1]);
			 
			        // On tri le tableau de façon intéligente (à la façon humaine)
			        // http://www.php.net/function.natcasesort
			        natcasesort($files);
			 
			        // On commence par afficher les dossiers
			        foreach($files as $f) {
						
						// S'il y a un dossier
			            if(is_dir($dir.$f) && $f != ".pki") {
			                // On affiche alors les données
			                echo '<li class="folder">'.$f.'</li>';
			                echo '<ul class="tree">';
			 
			                // Et du coup comme c'est un dossier, un le rescan
			                scan($dir.$f."/");
			 
			                echo '</ul>';
			            }
			        }
			        	
			 
			        // Puis on affiche les fichiers
			        foreach($files as $f) {
			            // S'il y a un fichier
			            if(is_file($dir.$f) && $f != "upload.php" && $f != "index.php" && $f != "main.css") {
			                echo '<li class="file" rel="'.$dir.$f.'"><a href='.$dir.$f.'>'.$f.'</a></li>';
			            }
			        }
			          	
			    }
			}

			scan('./');
		?>

		</div>

	</body>
</html>
