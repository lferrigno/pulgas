<?php

/**
 * AnuncianteFoto filter form base class.
 *
 * @package    pulgas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnuncianteFotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'anunciante_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anunciante'), 'add_empty' => true)),
      'filename'      => new sfWidgetFormFilterInput(),
      'caption'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'anunciante_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anunciante'), 'column' => 'id')),
      'filename'      => new sfValidatorPass(array('required' => false)),
      'caption'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('anunciante_foto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnuncianteFoto';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'anunciante_id' => 'ForeignKey',
      'filename'      => 'Text',
      'caption'       => 'Text',
    );
  }
}
