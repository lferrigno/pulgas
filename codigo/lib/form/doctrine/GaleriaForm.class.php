<?php

/**
 * Galeria form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GaleriaForm extends BaseGaleriaForm
{
  public function configure()
  {
  	$this->useFields(array('titulo'));
//   	$subForm = new sfForm();
//   	$j = 0;
//   	foreach ($this->getObject()->getFotos() as $foto){
//   		$form = new GaleriaFotoForm($foto);
//   		$subForm->embedForm($j, $form);
//   		$j++;
//   	}
//   	for ($i = $j; $i < 15; $i++)
//   	{
//   	$galeriaFoto = new GaleriaFoto();
//   	$galeriaFoto->Galeria = $this->getObject();
  	
//   	$form = new GaleriaFotoForm($galeriaFoto);
  	
//   	$subForm->embedForm($i, $form);
//   	}
//   	$this->embedForm('Fotos', $subForm);
  }
}
