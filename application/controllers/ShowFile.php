<?php

/*
 * @author Visheshagya
 */

class ShowFile extends CI_Controller {

    function index($a, $b, $c) {
        $filename = "uploads/" . $a . "/" . $b . "/" . $c;
//        header('Content-type: image/png');
        /* header('Content-type: application/pdf');

          header('Content-Disposition: inline; filename="downloaded.pdf"');
          ob_clean();
          flush();
          readfile($filename);
          exit; */
        $filename = "path_to_file";
        $fp = fopen($filename, "r");

        header("Cache-Control: maxage=1");
        header("Pragma: public");
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment;");
        // header("Content-Description: PHP Generated Data");
        // header("Content-Transfer-Encoding: binary");
        header('Content-Length:' . filesize($filename));
        header('Accept-Ranges: bytes');
        ob_clean();
        flush();
        while (!feof($fp)) {
            $buff = fread($fp, 1024);
            print $buff;
        }
    }

    function sharedFile($a, $b, $c, $d) {
        $filePath = $a . "/" . $b . "/" . $c . "/" . $d;
        $file_url = base_url() . $filePath;
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
        readfile($file_url);
    }

}
