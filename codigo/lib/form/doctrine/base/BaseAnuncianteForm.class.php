<?php

/**
 * Anunciante form base class.
 *
 * @method Anunciante getObject() Returns the current form's model object
 *
 * @package    pulgas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnuncianteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'nombre'              => new sfWidgetFormInputText(),
      'direccion'           => new sfWidgetFormInputText(),
      'localidad'           => new sfWidgetFormInputText(),
      'telefono'            => new sfWidgetFormInputText(),
      'email'               => new sfWidgetFormInputText(),
      'web'                 => new sfWidgetFormInputText(),
      'anuncio'             => new sfWidgetFormTextarea(),
      'sub_categorias_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SubCategoria')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'              => new sfValidatorString(array('max_length' => 150)),
      'direccion'           => new sfValidatorString(array('max_length' => 100)),
      'localidad'           => new sfValidatorString(array('max_length' => 50)),
      'telefono'            => new sfValidatorString(array('max_length' => 50)),
      'email'               => new sfValidatorString(array('max_length' => 50)),
      'web'                 => new sfValidatorString(array('max_length' => 150)),
      'anuncio'             => new sfValidatorString(array('max_length' => 500)),
      'sub_categorias_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SubCategoria', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('anunciante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anunciante';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sub_categorias_list']))
    {
      $this->setDefault('sub_categorias_list', $this->object->SubCategorias->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveSubCategoriasList($con);

    parent::doSave($con);
  }

  public function saveSubCategoriasList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sub_categorias_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->SubCategorias->getPrimaryKeys();
    $values = $this->getValue('sub_categorias_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('SubCategorias', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('SubCategorias', array_values($link));
    }
  }

}
