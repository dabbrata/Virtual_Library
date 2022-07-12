<?php


    if(!empty($_REQUEST["file"]))
    {
        $filename = basename($_REQUEST['file']);
        $filepath = 'pdf_files/'.$filename;
        
        if(!empty($filename) && file_exists($filepath))
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/pdf");
            header("Content-Transfer-Encoding: binary");

            readfile($filepath);
            exit;
        }
        else{
            echo "File does not exist";
        }
    }

?>