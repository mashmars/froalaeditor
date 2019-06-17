<?php
namespace Mashmars\FroalaeditorBundle\Services;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FroalaeditorUploader 
{
    /**
     * @param 上传目录
     */
    private $imageDirectory; //图片上传路径 && 图片查找路径
    private $videoDirectory; //视频上传路径
    private $fileDirectory; //文件上传路径

    public function __construct($imageDirectory,$videoDirectory,$fileDirectory)
    {
        $this->imageDirectory = $imageDirectory;
        $this->videoDirectory = $videoDirectory;
        $this->fileDirectory = $fileDirectory;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

        try{
            $file->move($this->getDirectory($file->guessExtension()), $fileName);
        }catch(FileException $e){

        }

        return $fileName;
    }

    public function getDirectory($extension)
    {        
        // 图片格式
        $image=array('webp','jpg','png','ico','bmp','gif','tif','pcx','tga','bmp','pxc','tiff','jpeg','exif','fpx','svg','psd','cdr','pcd','dxf','ufo','eps','ai','hdri');
        // 视频格式
        $video=array('mp4','avi','3gp','rmvb','gif','wmv','mkv','mpg','vob','mov','flv','swf','mp3','ape','wma','aac','mmf','amr','m4a','m4r','ogg','wav','wavpack');
       
        // 匹配不同的结果
        switch ($extension) {
            case in_array($extension, $image):
                return $this->imageDirectory;
                break;
            case in_array($extension, $video):
                return $this->videoDirectory;;
                break;           
            default:
                return $this->fileDirectory;;
                break;
        }
    }
}