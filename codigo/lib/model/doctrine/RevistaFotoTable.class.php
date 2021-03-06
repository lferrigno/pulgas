<?php

/**
 * RevistaFotoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class RevistaFotoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object RevistaFotoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('RevistaFoto');
    }
    
    
    public function buscarPaginaEnRevista($revistaId,$orden){
    	$q = $this->createQuery('rf')
    	->where('1= 1')
    	->andWhere('rf.revista_id = ?',$revistaId)
    	->andWhere('rf.orden = ?', $orden);
    	return $q->fetchOne();
    }
    
}