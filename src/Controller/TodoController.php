<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Repository\TodoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TodoController extends AbstractController
{
    #[Route('/todos', name: 'show_todos')]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        $repository = $entityManager->getRepository(TodoRepository::class);
        $todos = $repository->findAll();
        return $this->json($todos);
    }

    #[Route('/todo/{id}', name: 'show_todo')]

    public function show(Todo $todo): JsonResponse
    {
        return $this->json($todo);
    }


    #[Route('/create', name: 'create_todo')]
    public function create(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        //try {
        $todo = new Todo();
        // hardcode title value to check if persists work
        //$todo->setTitle('Just do it!');
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        //$entityManager->persist($todo);
        // actually executes the queries (i.e. the INSERT query)
        //$entityManager->flush();

        //in reality, we will not hardcode value, we will have a data from form we use to insert todo ites. 
        // These data is in $request variable

        $form = $this->createFormBuilder($todo)
            ->add('title', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Todo'])
            ->getForm();
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($todo);
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            return $this->json([
                'message' => 'Todo Item added: ' . $todo->getTitle(),
                'code' => 200
            ]);
        }

        return $this->json($form->getErrors(), 400);
    }

    #[Route('/update', name: 'update_todo')]

    public function update(EntityManagerInterface $entityManager, Request $request, Todo $todo): Response
    {
        $form = $this->createFormBuilder($todo)
            ->add('title', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Update Todo'])
            ->getForm();
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $entityManager->persist($todo);
            $entityManager->flush();

            return $this->json($todo);
        }

        return $this->json($form->getErrors(), 400);
    }

    #[Route('/delete', name: 'delete_todo')]
    public function delete(EntityManagerInterface $entityManager, Request $request, Todo $todo): Response
    {
        $entityManager->remove($todo);
        $entityManager->flush();

        return $this->json(null, 204);
    }
}
