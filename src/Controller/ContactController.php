<?php

namespace App\Controller;

use App\Form\ContactType;
use PhpParser\Builder\Class_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
	#[Route('/contact', name: 'app_contact')]
	public function index(Request $request): Response
	{
		$form = $this->createForm(ContactType::class);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$data = $form->getData();

			$this->addFlash('success', 'Form sent successfully');
			$session = $request->getSession();
			$session->set('name', $data['name']);

			return $this->redirectToRoute('app_contact_success');
		}

		return $this->render('contact/form.html.twig', [
			'form' => $form->createView()
		]);
	}

	#[Route('/contact/success', name: 'app_contact_success')]
	public function success(Request $request)
	{
		$session = $request->getSession();
		$name = $session->get('name');
		return $this->render('contact/success.html.twig', ['name' => $name]);
	}
}
