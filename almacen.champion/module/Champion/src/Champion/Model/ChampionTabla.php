<?php
namespace Champion\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\ResultSet\ResultSet;

class ChampionTabla extends AbstractTableGateway
{
    protected $table = "almacen";
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Almacen());
        $this->initialize();
    }
    
    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    
    public function getAlmacen($id)
    {
        $id = (int) $id;
        $rowset = $this->select(array('idalmacen'=>$id));
        $row=$rowset->current();
        if (!$row){
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function saveAlmacen(Almacen $almacen)
    {
        $data = array(
            'nombre' => $almacen->nombre,
            'direccion' => $almacen->direccion,
            'cp'        => $almacen->cp,
            'idciudad'  => $almacen->idciudad,
            'idestado'  => $almacen->idestado,
            'idpais'    => $almacen->idpais,
        );
        $id = (int) $almacen->id;
        if ($id == 0)
        {
            $this->insert($data);
        }else {
            if ($this->getAlmacen($id))
            {
                throw new \Exception('Form id does not exist');
            }
        }
    }
    
    public function deleteAlmacen($id) {
        $this->delete(array('id'=>$id));
    }
}