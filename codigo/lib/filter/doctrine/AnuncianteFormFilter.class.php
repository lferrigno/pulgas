<?php

/**
 * Anunciante filter form.
 *
 * @package    pulgas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncianteFormFilter extends BaseAnuncianteFormFilter
{
	public function configure()
	{
		$this->useFields(array('nombre'));
			
		$this->widgetSchema['categoria'] = new sfWidgetFormDoctrineChoice(array('multiple' => false, 'model' => 'Categoria','add_empty' => true));
// 		new sfWidgetFormFilterInput(array('with_empty' => false));
		$this->widgetSchema['rubro'] =new sfWidgetFormFilterInput(array('with_empty' => false));
		
		$this->validatorSchema['categoria'] =new sfValidatorPass(array('required' => false));
		$this->validatorSchema['rubro'] =new sfValidatorPass(array('required' => false));
	}


	public function getOwnQuery($fields){
		$q = AnuncianteTable::getInstance()->createQuery('a')
		->innerJoin('a.SubCategoriaAnunciante sca')
		->innerJoin('sca.SubCategoria sc')
		->innerJoin('sc.Categoria c')
		->where('1=1');
		  	if($fields) {
		  		if(isset($fields['nombre'])  && $fields['nombre'] && $fields['nombre']['text']!="") {
		  			$q->andWhere('a.nombre LIKE ?',"%".$fields['nombre']['text']."%");
		  		}
		  		if(isset($fields['rubro'])  && $fields['rubro'] && $fields['rubro']['text']!="") {
		  			$q->andWhere('sc.nombre LIKE ?',"%".$fields['rubro']['text']."%");
		  		}
		  		if(isset($fields['categoria'])  && $fields['categoria'] && $fields['categoria']!="") {
		  			$q->andWhere('c.id = ?',$fields['categoria']);
		  		}
		  	}
		//   	$q->orderBy('d.apellido ASC, d.nombre ASC ');
		return $q;
}

}
