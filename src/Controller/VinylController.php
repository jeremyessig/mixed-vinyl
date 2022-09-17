<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route(
        '/',
        name: 'homepage'
    )]
    public function homepage(): Response
    {

        $tracks = [
            ['song' => '5eme symphonie', 'artist' => 'Beethoven'],
            ['song' => 'Requiem', 'artist' => 'Mozart'],
            ['song' => 'Symphonie du nouveau monde', 'artist' => 'Dvorjach'],
            ['song' => 'Concerto pour clavecin', 'artist' => 'roger'],
        ];

        dump($tracks);
        return $this->render('vinyl/homepage.html.twig',[
            'title' => 'Magasin de musique',
            'tracks' => $tracks
        ]);
    }


    #[Route(
        '/browse/{slug}',
        name: 'browse'
    )]
    public function browse(string $slug = null): Response
    {

        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null ;

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}