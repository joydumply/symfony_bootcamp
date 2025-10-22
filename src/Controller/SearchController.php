<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function search(Request $request): Response
    {
        $term = $request->query->get('query');
        if (!$term) {
            return $this->render('search/form.html.twig');
        }
        return $this->render('search/result.html.twig', [
            'term' => $term
        ]);
    }

    #[Route('/redirect-demo', name: 'app_redirect_demo')]
    public function redirectDemo(): Response
    {
        return $this->redirectToRoute('app_search', ['query' => 'symfony']);
    }

    #[Route('/api/ping', name: 'app_api_ping')]
    public function ping(): Response
    {
        return $this->json([
            'status' => 'ok',
            'timestamp' => (new \DateTime())->format(\DateTime::ATOM)
        ]);
    }
}
