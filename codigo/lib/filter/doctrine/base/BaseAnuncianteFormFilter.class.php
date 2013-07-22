<?php

/**
 * Anunciante filter form base class.
 *
 * @package    pulgas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnuncianteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'localidad'           => new sfWidgetFormFilterInput(),
      'telefono'            => new sfWidgetFormFilterInput(),
      'email'               => new sfWidgetFormFilterInput(),
      'web'                 => new sfWidgetFormFilterInput(),
      'facebook'            => new sfWidgetFormFilterInput(),
      'anuncio'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sub_categorias_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SubCategoria')),
    ));

    $this->setValidators(array(
      'nombre'              => new sfValidatorPass(array('required' => false)),
      'direccion'           => new sfValidatorPass(array('required' => false)),
      'localidad'           => new sfValidatorPass(array('required' => false)),
      'telefono'            => new sfValidatorPass(array('required' => false)),
      'email'               => new sfValidatorPass(array('required' => false)),
      'web'                 => new sfValidatorPass(array('required' => false)),
      'facebook'            => new sfValidatorPass(array('required' => false)),
      'anuncio'             => new sfValidatorPass(array('required' => false)),
      'sub_categorias_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SubCategoria', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('anunciante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSubCategoriasListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('SubCategoriaAnunciante.sub_categoria_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Anunciante';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'nombre'              => 'Text',
      'direccion'           => 'Text',
      'localidad'           => 'Text',
      'telefono'            => 'Text',
      'email'               => 'Text',
      'web'                 => 'Text',
      'facebook'            => 'Text',
      'anuncio'             => 'Text',
      'sub_categorias_list' => 'ManyKey',
    );
  }
}
