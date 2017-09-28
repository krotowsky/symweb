<?php

namespace AppBundle\Admin;


use AppBundle\Entity\BlogPost;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
            ->with('Content', array('class' => 'col-md-5'))
                ->add('title','text')
                ->add('body','textarea')
            ->end();

        $formMapper
            ->with('Meta Data', array('class' => 'col-md-2'))
                ->add('category', 'entity', array(
                    'class' => 'AppBundle\Entity\Category',
                    'property' => 'name',))
            ->end();

    }

    protected function configureListFields(ListMapper $listMapper){
        $listMapper
            ->add('title')
            ->add('body')
            ->add('draft');

    }

    protected  function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper->add('title');
        $datagridMapper->add('body');
        $datagridMapper->add('draft');
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle() : 'Article';
    }


}