<?php
class ContactForm extends sfForm
{
	public function configure()
	{
		$this->setWidgets(array(
				'nombre'    => new sfWidgetFormInput(),
				'email'   => new sfWidgetFormInput(),
				'mensaje' => new sfWidgetFormTextarea(array(),array('class'=>'no-editor')),
		));
	}
}
?>