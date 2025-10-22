<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
	#[Route('/user/{username}/{age}')]
	public function show($username, $age = 25): Response
	{
		return $this->render(
			'user/profile.html.twig',
			[
				'username' => $username,
				'age'      => $age,
			]
		);
	}
}
