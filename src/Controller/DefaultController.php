<?php
/**
 * Created by PhpStorm.
 * User: Aviscii
 * Date: 2018. 10. 21.
 * Time: 19:26
 */

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends FOSRestController {

	/**
	 * @Rest\Get("/ping")
	 */
	public function index() {

		return new JsonResponse('pong');
	}
}