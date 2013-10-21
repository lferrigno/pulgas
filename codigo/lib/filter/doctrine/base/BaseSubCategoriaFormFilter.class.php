<?php

/**
 * SubCategoria filter form base class.
 *
 * @package    pulgas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSubCategoriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'categoria_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'anunciantes_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Anunciante')),
    ));

    $this->setValidators(array(
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'categoria_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'id')),
      'anunciantes_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Anunciante', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sub_categoria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addAnunciantesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.SubCategoriaAnunciante SubCategoriaAnunciante')
      ->andWhereIn('SubCategoriaAnunciante.anunciante_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'SubCategoria';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre'           => 'Text',
      'categoria_id'     => 'ForeignKey',
      'anunciantes_list' => 'ManyKey',
    );
  }
}
