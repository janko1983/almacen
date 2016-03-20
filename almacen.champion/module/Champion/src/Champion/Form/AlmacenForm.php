<?php
namespace Champion\Form;
use Zend\Form\Form;
class AlmacenForm extends Form
{
    public function __construct($name = null){
        //we want to ignore the name passed
        parent::__construct('almacen');
        $this->setAttribute('method','post');
        $this->add(array(
            'name' => 'idalmacen',
            'type'  => 'Hidden',            
        ));
        $this->add(array(
            'name'      => 'nombre',
            'type'      => 'Text',
            'options'   => array(
                'label' => 'Nombre Almacen',               
            ),
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
        ));
        $this->add(array(
            'name'      => 'direccion',
            'type'      => 'Text',
            'options'    => array(
                'label' => 'Direccion del Almacen',
            ),
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
        ));
        $this->add(array(
            'name'      => 'cp',
            'type'      => 'Text',
            'options'    => array(
                'label' => 'Codigo Postal',
            ),
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
        ));
        $this->add(array(
            'name'      => 'idciudad',
            'type'      => 'Text',
            'options'    => array(
                'label' => 'Ciudad',                
            ),
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
        ));
        $this->add(array(
            'name'      => 'idestado',
            'type'      =>  'Text',
            'options'    =>  array(
                'label' => 'Estado',                
            ),
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
        ));
        $this->add(array(
            'name'      => 'idpais',
            'type'      => 'Text',
            'options'    => array(
                'label' => 'Pais',
            ),
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
        ));
        $this->add(array(
            'name'      => 'submit',
            'type'      => 'Submit',
            'attributes'=> array(
                'value' => 'Guardar',
                'id'    => 'submitbutton',
                'title' => 'Enviar',
                'class' => 'btn btn-success'
            ),
        ));
    }
}

?>