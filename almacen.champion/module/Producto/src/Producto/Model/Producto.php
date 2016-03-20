<?php
namespace Producto\Model;
class Producto
{
    public $id;
    public $descripcion;
    public $idcategoria;
    public $iddensidad;
    public $idvolumen;
    
    public function exchangeArray($data)
    {
        $this->id               =(isset($data['idproducto']))   ?   $data['idproducto']     :   null;
        $this->descripcion      =(isset($data['descripcion']))  ?   $data['descripcion']    :   null;
        $this->idcategoria      =(isset($data['idcategoria']))  ?   $data['idcategoria']    :   null;
        $this->iddensidad       =(isset($data['iddensidad']))   ?   $data['iddensidad']     :   null;
        $this->idvolumen        =(isset($data['idvolumen']))    ?   $data['idvolumen']      :   null;
    }
}