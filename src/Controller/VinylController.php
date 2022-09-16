<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController
{
    #[Route(
        '/',
        name: 'homepage'
    )]
    public function homepage(): Response
    {

        return new Response("<h1> Hello World</h1>");
    }


    #[Route(
        '/browse/{slug}',
        name: 'browse'
    )]
    public function browse(string $slug = null): Response
    {

        if($slug){
            $title = 'Genders: ' . u(str_replace('-', ' ', $slug))->title(true);
        }else{
            $title = "All genders";
        }

        return new Response($title);
    }
}