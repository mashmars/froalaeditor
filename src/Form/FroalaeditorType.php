<?php
namespace Mash\FroalaeditorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FroalaeditorType extends AbstractType
{
    public function getParent()
    {
        return Textarea::class;
    }

    public function getName()
    {
        return 'froalaeditor';
    }
}
