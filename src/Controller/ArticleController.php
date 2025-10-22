<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{
    #[Route('/article/{slug}', name: 'app_article')]
    public function show($slug): Response
    {
        $article = array(
            'title' => 'Learning Symfony Routing',
            'slug' => $slug,
            'content' => 'Routing is the backbone of every Symfony app...'
        );
        return $this->render('article/index.html.twig', [
            'article' => $article
        ]);
    }
}
