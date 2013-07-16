<?php

/**
 * SubCategoriaAnunciante form base class.
 *
 * @method SubCategoriaAnunciante getObject() Returns the current form's model object
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubCategoriaAnuncianteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sub_categoria_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SubCategoria'), 'add_empty' => false)),
      'anunciante_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anunciante'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sub_categoria_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SubCategoria'))),
      'anunciante_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anunciante'))),
    ));

    $this->widgetSchema->setNameFormat('sub_categoria_anunciante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubCategoriaAnunciante';
  }

}
