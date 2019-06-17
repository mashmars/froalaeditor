<?php
namespace Mashmars\FroalaeditorBundle\Services;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FroalaeditorUploader 
{
    /**
     * @param 上传目录
     */
    private $targetDirectory = '' ;

   /*  public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    } */

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

        try{
            $file->move($this->getTargetDirectory(), $fileName);
        }catch(FileException $e){

        }

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}