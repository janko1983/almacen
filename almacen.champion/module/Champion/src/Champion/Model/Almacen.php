<?php
namespace Champion\Model;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;

class Almacen implements InputFilterAwareInterface
{
    public $id;
    public $nombre;
    public $direccion;
    public $cp;
    public $idciudad;
    public $idestado;
    public $idpais;
    protected $inputFilter;
    
    public function  exchangeArray($data) {
        $this->id           = (isset($data['idalmacen']))   ? $data['idalmacen']    : null;
        $this->nombre       = (isset($data['nombre']))      ? $data['nombre']       : null;
        $this->direccion    = (isset($data['direccion']))   ? $data['direccion']    : null;
        $this->cp           = (isset($data['cp']))          ? $data['cp']           : null;
        $this->idciudad     = (isset($data['idciudad']))    ? $data['idciudad']     : null;
        $this->idestado     = (isset($data['idestado']))    ? $data['idestado']     : null;
        $this->idpais       = (isset($data['idpais']))      ? $data['idpais']       : null;        
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    public function getInputFilter(){
        if (!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
            $inputFilter->add($factory->createInput(array(
                'name'      =>  'idalmacen',
                'required'  =>  true,
                'filters'   =>  array(
                    array('name'    => 'Int'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'nombre',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'direccion',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'cp',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 10,
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'idciudad',
                'required' => true,
                'filters'   =>  array(
                    array('name'    => 'Int'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'idestado',
                'required' => true,
                'filters'   =>  array(
                    array('name'    => 'Int'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'idpais',
                'required' => true,
                'filters'   =>  array(
                    array('name'    => 'Int'),
                ),
            )));
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}