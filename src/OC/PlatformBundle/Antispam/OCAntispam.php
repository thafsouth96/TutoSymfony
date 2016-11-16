<?php

namespace OC\PlatformBundle\Antispam;

Class OCAntispam
{
  //Récupération des paramètres définis dans le fichier config/services.yml
  public function __construct(\Swift_Mailer $mailer,$local, $minLength)
  {
    $this->mailer =$mailer;
    $this->local =$local;
    $this->minLength=(int) $minLength;
  }

  /**
  * Vérifie si le texte est un spam ou non
  *@param string $text
  *@return bool
  */

  public function isSpam($text)
  {
    //on considère qu'un message contenant mois de 50 caractères est un spam //exemple pour illustaration de l'utilisation des services
    return strlen($text) < 50 ;
  }

}
