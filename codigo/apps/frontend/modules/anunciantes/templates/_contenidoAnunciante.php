<?php echo $anunciante->getDireccion()?>
-
<?php echo $anunciante->getLocalidad()?>
<br />
Telefono:
<?php echo $anunciante->getTelefono()? $anunciante->getTelefono() : " - "?>
<br />
Email:
<?php echo $anunciante->getEmail()?  mail_to($anunciante->getEmail(), $anunciante->getEmail(), array('encode' => true)) : " - "?>
<br />
Web:
<?php echo $anunciante->getWeb()? link_to($anunciante->getWeb(), Util::addhttp($anunciante->getWeb())) : " - "?>
<br />
Facebook:
<?php echo $anunciante->getFacebook()? link_to($anunciante->getFacebook(), Util::addhttp($anunciante->getFacebook())) : " - "?>
