<?php
 function deleteDir($dirPath) {	 
		if (! is_dir($dirPath)) {
			throw new InvalidArgumentException("$dirPath must be a directory");
		}
		if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
			$dirPath .= '/';
		}
		$files = glob($dirPath . '*', GLOB_MARK);
		foreach ($files as $file) {
			if (is_dir($file)) {
				deleteDir($file);
			} else {
				unlink($file);
			}
		}
		rmdir($dirPath);
	}
	
	
	function ListFolder($path) {
	 
        //using the opendir function
        $dir_handle = @opendir($path) or die("Unable to open $path");

        //Leave only the lastest folder name
        $dirname = end(explode("/", $path));

        echo '<ul>';

        //display the target folder.
        echo '<li><a href="'.$dirname.'" class="folder">'.$dirname.'</a>';
        echo '<ul>';
        while (false !== ($file = readdir($dir_handle))) {
            if ($file != "." && $file != "..") {
                if (is_dir($path . "/" . $file)) {
                    //Display a list of sub folders.
                    ListFolder($path . "/" . $file);
                } else {
                    //Display a list of files.
                    echo '<li><a href="'.$file.'">'.$file.'</a></li>';
                }
            }
        }
        echo "</ul>";
        echo "</li>";

        echo "</ul>";

        //closing the directory
        closedir($dir_handle);
    }

?>