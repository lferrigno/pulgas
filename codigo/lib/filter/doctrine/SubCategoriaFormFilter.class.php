<?php

/**
 * SubCategoria filter form.
 *
 * @package    pulgas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubCategoriaFormFilter extends BaseSubCategoriaFormFilter
{
public function configure()
	{
		$this->useFields(array('nombre'));
			
		$this->widgetSchema['categoria'] = new sfWidgetFormDoctrineChoice(array('multiple' => false, 'model' => 'Categoria','add_empty' => true));
		
		$this->validatorSchema['categoria'] =new sfValidatorPass(array('required' => false));
	}


	public function getOwnQuery($fields){
		$q = SubCategoriaTable::getInstance()->createQuery('sc')
		->innerJoin('sc.Categoria c')
		->where('1=1');
		  	if($fields) {
		  		if(isset($fields['nombre'])  && $fields['nombre'] && $fields['nombre']['text']!="") {
		  			$q->andWhere('sc.nombre LIKE ?',"%".$fields['nombre']['text']."%");
		  		}
		  		if(isset($fields['categoria'])  && $fields['categoria'] && $fields['categoria']!="") {
		  			$q->andWhere('c.id = ?',$fields['categoria']);
		  		}
		  	}
		return $q;
}
}
