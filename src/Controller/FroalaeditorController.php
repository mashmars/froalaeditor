<?php
namespace Mashmars\FroalaeditorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller;
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
        dd($file);
        if(!$file) return 's';
        $fileName = $uploader->upload($file);
        dd($fileName);
    }
    
}