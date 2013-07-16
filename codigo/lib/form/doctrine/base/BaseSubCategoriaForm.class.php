<?php

/**
 * SubCategoria form base class.
 *
 * @method SubCategoria getObject() Returns the current form's model object
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubCategoriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre'           => new sfWidgetFormInputText(),
      'categoria_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => false)),
      'anunciantes_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Anunciante')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 150)),
      'categoria_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'))),
      'anunciantes_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Anunciante', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sub_categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubCategoria';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['anunciantes_list']))
    {
      $this->setDefault('anunciantes_list', $this->object->Anunciantes->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAnunciantesList($con);

    parent::doSave($con);
  }

  public function saveAnunciantesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['anunciantes_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Anunciantes->getPrimaryKeys();
    $values = $this->getValue('anunciantes_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Anunciantes', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Anunciantes', array_values($link));
    }
  }

}
