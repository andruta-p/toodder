<?php
/**
 * @package App\Infrastructure\Api\Controllers
 * @author andruta-p <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Presentation\Api\Border\Controllers;

use App\Domain\Cases\Board\DTO\GetAllRequest;
use App\Domain\Cases\Board\GetAllBoardsCase;
use App\Domain\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController implements ControllerInterface
{
    public function __construct(
        private readonly GetAllBoardsCase $case,
    ) {
    }

    /**
     * @param \App\Domain\Cases\Board\DTO\GetAllRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    #[Route(
        path: '',
        name: 'api.border.list',
        requirements: ['page' => '\d+', 'limit' => '\d+'],
        methods: [Request::METHOD_GET]
    )]
    public function handle(GetAllRequest $request): JsonResponse
    {
        $errors = $request->validate();

        if (count($errors) > 0) {
            return new JsonResponse($errors, Response::HTTP_BAD_REQUEST);
        }

        try {
            $result = $this->case->execute($request);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => true, 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse(['action' => 'list', 'items' => $result->getBoards()], Response::HTTP_OK);
    }
}
