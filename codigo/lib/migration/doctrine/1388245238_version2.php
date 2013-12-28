<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('publicidad_foto', 'publicidad_foto_publicidad_id_revista_id', array(
             'name' => 'publicidad_foto_publicidad_id_revista_id',
             'local' => 'publicidad_id',
             'foreign' => 'id',
             'foreignTable' => 'revista',
             'onUpdate' => '',
             'onDelete' => 'cascade',
             ));
        $this->addIndex('publicidad_foto', 'publicidad_foto_publicidad_id', array(
             'fields' => 
             array(
              0 => 'publicidad_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('publicidad_foto', 'publicidad_foto_publicidad_id_revista_id');
        $this->removeIndex('publicidad_foto', 'publicidad_foto_publicidad_id', array(
             'fields' => 
             array(
              0 => 'publicidad_id',
             ),
             ));
    }
}