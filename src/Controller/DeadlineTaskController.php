<?php

namespace App\Controller;

use App\Entity\DeadlineTask;
use App\Form\DeadlineTaskType;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use App\Repository\DeadlineTaskRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeadlineTaskController extends FOSRestController implements ClassResourceInterface {

	/**
     * @var DeadlineTaskRepository
     */
    private $tasks;

    public function __construct(DeadlineTaskRepository $deadlineTaskRepository) {
        $this->tasks = $deadlineTaskRepository;
    }

	/**
	 * @Rest\Get("/tasks/deadline/{id}")
	 */
	public function getAction($id) {

		$task = $this->tasks->find($id);
		if (empty($task)) {
			throw new NotFoundHttpException();
		}
		return $task;
	}

    /**
     * @Rest\Get("/tasks/deadline")
     */
    public function getAllAction() {

		$tasks = $this->tasks->findAll();
		if (empty($tasks)) {
			throw new NotFoundHttpException();
		}
        return $tasks;
    }

	/**
	 * @Rest\Post("/tasks/deadline")
	 */
    public function postAction(Request $request) {

		$form = $this->createForm(DeadlineTaskType::class, new DeadlineTask());

		$form->submit($request->request->all());

		if (false === $form->isValid()) {

			return $form;
		}

		$this->tasks->save($form->getData());

		return new JsonResponse(
			[
				'status' => 'ok',
			],
			JsonResponse::HTTP_CREATED
		);
	}

	/**
	 * @Rest\Put("/tasks/deadline/{id}")
	 */
	public function putAction(Request $request, $id) {

		$task = $this->tasks->find($id);
		if (empty($task)) {
			throw new NotFoundHttpException();
		}

		$form = $this->createForm(DeadlineTaskType::class, $task);

		$form->submit($request->request->all());

		if (false === $form->isValid()) {

			return $form;
		}

		$this->tasks->save($form->getData());

		return new JsonResponse(
			null,
			JsonResponse::HTTP_NO_CONTENT
		);
	}

	/**
	 * @Rest\Patch("/tasks/deadline/{id}")
	 */
	public function patchAction(Request $request, $id) {

		$task = $this->tasks->find($id);
		if (empty($task)) {
			throw new NotFoundHttpException();
		}

		$form = $this->createForm(DeadlineTaskType::class, $task);

		$form->submit($request->request->all(), false);

		if (false === $form->isValid()) {

			return $form;
		}

		$this->tasks->save($form->getData());

		return new JsonResponse(
			null,
			JsonResponse::HTTP_NO_CONTENT
		);
	}

	/**
	 * @Rest\Delete("/tasks/deadline/{id}")
	 */
	public function deleteAction($id) {

		$task = $this->tasks->find($id);
		if (empty($task)) {
			throw new NotFoundHttpException();
		}

		$this->tasks->delete($task);

		return new JsonResponse(
			null,
			JsonResponse::HTTP_NO_CONTENT
		);
	}
}
