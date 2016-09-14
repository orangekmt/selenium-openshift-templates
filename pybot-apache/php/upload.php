<?php

// Test if the file has been set and there is no error
if (isset($_FILES['myfile']) AND $_FILES['myfile']['error'] == 0)
{
        // Test if the file has an authorized size
        if ($_FILES['myfile']['size'] <= 1000000)
        {
                // Test if the extension is authorized
                $fileinfos = pathinfo($_FILES['myfile']['name']);
                $extension_upload = $fileinfos['extension'];
                $authorized_extensions = array('test', 'robot');
                if (in_array($extension_upload, $authorized_extensions))
                {
                        // We can validate the file and save it permanently
                        move_uploaded_file($_FILES['myfile']['tmp_name'], '/opt/app-root/src/tests/' . basename($_FILES['myfile']['name']));
                        echo "Upload done !";
                }
        }
} 

?>
