<?php
class AnuncianteFotoCollectionForm extends sfForm
{
	public function configure()
	{
		if (!$anunciante = $this->getOption('anunciante'))
		{
			throw new InvalidArgumentException('You must provide a anunciante object.');
		}

		for ($i = 0; $i < $this->getOption('size', 2); $i++)
		{
			$anuncianteFoto = new AnuncianteFoto();
			$anuncianteFoto->Anunciante = $anunciante;

			$form = new AnuncianteFotoForm($anuncianteFoto);

			$this->embedForm($i, $form);
		}
	}
}