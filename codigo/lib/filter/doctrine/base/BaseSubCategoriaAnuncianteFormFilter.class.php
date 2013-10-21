<?php

/**
 * SubCategoriaAnunciante filter form base class.
 *
 * @package    pulgas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSubCategoriaAnuncianteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sub_categoria_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SubCategoria'), 'add_empty' => true)),
      'anunciante_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anunciante'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sub_categoria_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SubCategoria'), 'column' => 'id')),
      'anunciante_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anunciante'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sub_categoria_anunciante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubCategoriaAnunciante';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sub_categoria_id' => 'ForeignKey',
      'anunciante_id'    => 'ForeignKey',
    );
  }
}
