<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/")
 */

class DefaultController extends AbstractController
{
    
/**
* @Route(path="/index", name="homepage", methods={"GET"})
*/
    public function index() : Response
    {
        $message = 'Bienvenue sur le site Internet';

        return new Response($message);
    }

    /**
    * @Route(path="/presentation", name="presentation", methods={"GET"})
    */
    
    public function presentation(): Response
    {
        $message = 'Bienvenue sur la page de presentation.';
        $news = $this->table();

        return $this->render('default/presentation.html.twig', [
            "message" => $message,
            "news" => $news,
        ]);
    }

    public function table()
    {
        return array("My top 10 insult :", "1. KYS", "2. stfu", "3. ez", "4. retard");
    }
}

?>