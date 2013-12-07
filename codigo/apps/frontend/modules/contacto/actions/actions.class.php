<?php

/**
 * home actions.
 *
 * @package    pulgas
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactoActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->form = new ContactForm();
	}
	
	public function executeSubmit($request)
	{
		$this->forward404Unless($request->isMethod('post'));
	
		$params = array(
				'nombre'    => $request->getParameter('nombre'),
				'email'   => $request->getParameter('email'),
				'mensaje' => $request->getParameter('mensaje'),
		);
		$asunto = "Consulta de: ".$params['nombre'];
		$cuerpo = $params['mensaje']. ' - '. $params['email'];
		$this->getMailer()->composeAndSend(
				'contacto.revista.pulganzas@gmail.com',
				'contacto.revista.pulganzas@gmail.com',
				$asunto,
				$cuerpo
		);
		$this->setTemplate('gracias');
	}

	
}
