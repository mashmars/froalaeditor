<?php
namespace Mashmars\FroalaeditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Mashmars\FroalaeditorBundle\Services\FroalaeditorUploader;

class FroalaeditorController extends Controller
{
    /**
     *  img video file upload
     */
    public function uploadAction(Request $request, FroalaeditorUploader $uploader)
    {
        $file = $request->files->get('file');        
        if(!$file) return $this->json(['link'=>'error']);

        //dd($request->request->all()); TODO 如何处理附件的参数 这个属于业务逻辑 和bundle暂时没关系
        $fileName = $uploader->upload($file);
        return $this->json(['link' => $request->getScheme() . '://' . $request->getHttpHost() . '/upload/images/' . $fileName]);
    }

    /**
     * 查找所有图片
     */
    public function uploadedImageAction()
    {
        $dir = $this->getParameter('image_directory') . '/';
        $images = []; 
        if (is_dir($dir)){
            if ($dh = opendir($dir)){ 
                while(($file = readdir($dh)) !== false) {
                    if($file == '.' || $file == '..') continue;
                    $images[] = [
                        'url' =>  ltrim($dir,'.') . $file,
                        'thumb' => ltrim($dir,'.') . $file,
                        'name' => $file,
                        'type' => 'image',
                        'id' => $file,
                        'tag' =>'',
                    ];
                } 
                closedir($dh);
            }
        }
       
        return $this->json($images);
    }

    /**
     * 删除图片
     * src: /upload/images/d705a4fd2ede8b3aea02e86c946ec88c.jpeg
     * id: d705a4fd2ede8b3aea02e86c946ec88c.jpeg
     * type: image
     * name: d705a4fd2ede8b3aea02e86c946ec88c.jpeg
     */
    public function uploadedImageDelAction(Request $request)
    {
        $data = $request->request->all();
        $id = $data['id'];
        $dir = $this->getParameter('image_directory') . '/';
        @unlink($dir. $id);
        return $this->json(['link' => '']);
    }

   
    
}