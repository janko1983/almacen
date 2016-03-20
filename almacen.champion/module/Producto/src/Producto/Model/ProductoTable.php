<?php
namespace Producto\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class ProductoTable extends AbstractTableGateway
{
    protected $table ='producto';
    
    public function __construct(Adapter $adapter)
    {
        $this->adapter              =   $adapter;
        $this->resultSetPrototype   =   new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Producto());
        $this->initialize();
    }
    
    public function fetchAll()
    {
        $resultSet       =   $this->select();
        return $resultSet;
    }
    
    public function getProducto($id)
    {
        $rowset     =   $this->select(array('idproducto' => $id));
        $row        =   $rowset->current();
        if (!$row)
            {
                throw new \Exception("Could not find row $id");
            }
        return $row;
    }
    
    public function saveProducto(Producto $producto)
    {
        $data       = array(
            'idproducto'    =>  $producto->id,
            'descripcion'   =>  $producto->descripcion,
            'idcategoria'   =>  $producto->idcategoria,
            'iddensidad'    =>  $producto->iddensidad,
            'idvolumen'     =>  $producto->idvolumen,
        );
        $id     =  trim($producto->id);
        if ($id  == "")
        {
            $this->insert($data);
        }else
        {
            if ($this->getProducto($id))
            {
                $this->update($data,array('idproducto'=>$id));
            }else             
            {
                throw new \Exception('Form id does not exist');
            }
        }
    }
    public function deleteProducto($id)
    {
        $this->delete(array('idproducto'=>$id));
    }
}