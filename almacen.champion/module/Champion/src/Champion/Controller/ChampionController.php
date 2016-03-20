<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Champion for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Champion\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\ViewModel;
use Champion\Form\AlmacenForm;
use Champion\Model\Almacen;

class ChampionController extends AbstractActionController
{
    protected $almacenTable;
    public function indexAction()
    {
        return new \Zend\View\Model\ViewModel(array(
            'almacen' => $this->getAlmacenTable()->fetchAll(),
        ));
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /champion/champion/foo
        return array();
    }
    public function addAction()
    {
        $form = new AlmacenForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $almacen    = new Almacen();
            $form->setInputFilter($almacen->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid())
            {
                $almacen->exchangeArray($form->getData());
                $this->getAlmacenTable()->saveAlmacen($almacen);
                
                //Redirect to list of almacen
                return $this->redirect()->toRoute('almacen');
            }
        }
        return array('form' => $form);
    }
    public function editAction()
    {
        
    }
    public function deleteAction()
    {
        
    }
    public function getAlmacenTable()
    {
        if (!$this->almacenTable)
        {
            $sm = $this->getServiceLocator();
            $this->almacenTable = $sm->get('Champion\Model\ChampionTabla');
        }
        return $this->almacenTable;
    }
    
}
