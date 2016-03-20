<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Producto for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Producto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;

class ProductoController extends AbstractActionController
{
    protected $productoTable;
    public function indexAction()
    {
        return new \Zend\View\Model\ViewModel(array(
            'producto'     =>  $this->getProductoTable()->fetchAll(),
        ));
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /producto/producto/foo
        return array();
    }
    public function getProductoTable()
    {
        if (!$this->productoTable){
            $sm                     =   $this->getServiceLocator();
            $this->productoTable    =   $sm->get('Producto\Model\ProductoTable');
        }
        return $this->productoTable;
    }
    public function addAction()
    {
    }
    
    public function editAction()
    {
    }
    
    public function deleteAction()
    {
    }
}
