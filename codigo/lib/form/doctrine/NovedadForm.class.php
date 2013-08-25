<?php

/**
 * Novedad form.
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NovedadForm extends BaseNovedadForm
{
  public function configure()
  {
  	$this->useFields(array('titulo','texto','filename'));
  	

  	$this->widgetSchema['filename'] = new sfWidgetFormInputFileEditable(array(
  			'file_src' => sfConfig::get('sf_upload_dir').'/novedades/'.$this->getObject()->getFilename(),
  			'is_image'  => true,
  			'with_delete'  => false,
  			'edit_mode' => !$this->isNew(),
  			'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
  	));
  	
  	$this->validatorSchema['filename'] = new sfValidatorFile(array(
  			'required' => $this->isNew(), // obrigatorio somente se novo registro
  			'max_size' => 500000,
  			'mime_types' => 'web_images',
  			'required' => false,
  			'path' => sfConfig::get('sf_upload_dir').'/novedades'
  	));
  	
  	
  	$this->validatorSchema['filename_delete'] = new sfValidatorBoolean();
  	
		$this->widgetSchema->setLabel('titulo', 'Título');  	
		$this->widgetSchema->setLabel('filename', ' ');
		
		$this->widgetSchema->setLabel('texto', ' ');
  }
}
