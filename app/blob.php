<?php

use Vercel\Blob\Blob;

class BlobService
{
  public static function uploadFile(string $file, string $filename)
  {
    $blob = new Blob();
    $result = $blob->upload($file, $filename);

    if ($result->isSuccess()) {
      return $result->getUrl();
    } else {
      throw new Exception($result->getMessage());
    }
  }
}
