<?php 

// app/Helpers/FileHelper.php

namespace App\Helpers;

class FileHelper
{
    public static function getFileIconClass($extension)
    {
        switch ($extension) {
            case 'xlsx':
            case 'csv':
                return 'fa-file-excel';
            case 'docx':
                return 'fa-file-word';
            case 'pdf':
                return 'fa-file-pdf';
            case 'jpg':
            case 'png':
            case 'jpeg':
                return 'fa-file-image';
            default:
                return 'fa-file';
        }
    }
}




?>