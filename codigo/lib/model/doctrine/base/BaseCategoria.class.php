<?php

/**
 * BaseCategoria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nombre
 * @property Doctrine_Collection $SubCategoria
 * 
 * @method string              getNombre()       Returns the current record's "nombre" value
 * @method Doctrine_Collection getSubCategoria() Returns the current record's "SubCategoria" collection
 * @method Categoria           setNombre()       Sets the current record's "nombre" value
 * @method Categoria           setSubCategoria() Sets the current record's "SubCategoria" collection
 * 
 * @package    pulgas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategoria extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('categoria');
        $this->hasColumn('nombre', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('SubCategoria', array(
             'local' => 'id',
             'foreign' => 'categoria_id'));
    }
}