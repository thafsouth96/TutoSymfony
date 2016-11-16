<?php
namespace OC\PlatformBundle\Controller ;

use Symfony\Component\HttpFoundation\Response ;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TestController extends Controller
{
  public function indexAction($page)
  {
    // On ne sait pas combien de pages il y a
   // Mais on sait qu'une page doit être supérieure ou égale à 1
    if($page<1){
      throw new NotFoundHttpException('Page '.$page.' inexistante.');
    }
   // List des annonce en dur
    $listAdverts = array(
      array(
        'title'   => 'Recherche développpeur Symfony2',
        'id'      => 1,
        'author'  => 'Alexandre',
        'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
        'date'    => new \Datetime()),
      array(
        'title'   => 'Mission de webmaster',
        'id'      => 2,
        'author'  => 'Hugo',
        'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
        'date'    => new \Datetime()),
      array(
        'title'   => 'Offre de stage webdesigner',
        'id'      => 3,
        'author'  => 'Mathieu',
        'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
        'date'    => new \Datetime())
    );

    return $this->render('OCPlatformBundle:Test:index.html.twig', array('listAdverts'=> $listAdverts));
  }

  public function viewAction($id){
    // Ici, on récupérera l'annonce correspondante à l'id $id
    $advert = array(
   'title'   => 'Recherche développpeur Symfony2',
   'id'      => $id,
   'author'  => 'Alexandre',
   'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
   'date'    => new \Datetime()
 );

    return $this->render('OCPlatformBundle:Test:view.html.twig', array('advert'=> $advert));

  }
  public function editAction($id, Request $request)
{
  $advert = array(
  'title'   => 'Recherche développpeur Symfony2',
  'id'      => $id,
  'author'  => 'Alexandre',
  'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
  'date'    => new \Datetime()
);

return $this->render('OCPlatformBundle:Test:edit.html.twig', array(
  'advert' => $advert
));

}

public function deleteAction($id)
{
  // Ici, on récupérera l'annonce correspondant à $id

  // Ici, on gérera la suppression de l'annonce en question

  return $this->render('OCPlatformBundle:Test:delete.html.twig');
}
public function menuAction($limit)
{
  // On fixe en dur une liste ici, bien entendu par la suite
  // on la récupérera depuis la BDD !
  $listAdverts = array(
    array('id' => 2, 'title' => 'Recherche développeur Symfony2'),
    array('id' => 5, 'title' => 'Mission de webmaster'),
    array('id' => 9, 'title' => 'Offre de stage webdesigner')
  );

  return $this->render('OCPlatformBundle:Test:menu.html.twig', array(
    // Tout l'intérêt est ici : le contrôleur passe
    // les variables nécessaires au template !
    'listAdverts' => $listAdverts
  ));
}

public function addAction(Request $request)
  {
    // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

    // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
    if ($request->isMethod('POST')) {
      // Ici, on s'occupera de la création et de la gestion du formulaire

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

      // Puis on redirige vers la page de visualisation de cettte annonce
      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }

    // Si on n'est pas en POST, alors on affiche le formulaire
    return $this->render('OCPlatformBundle:Test:add.html.twig');
  }

}
?>
