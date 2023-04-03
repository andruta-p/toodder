<?php
/**
 * @link https://gepard.io
 * @copyright 2023 (c) Bintime
 * @package App\Infrastructure\Api\Controllers
 * @author Andriy Proskurniak <a.proskurniak@gepard.io>
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
        private readonly GetAllBoardsCase $case
    ) {
    }

    /**
     * @param int $page
     * @param int $limit
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    #[Route(
        path: '',
        name: 'api.border.list',
        requirements: ['page' => '\d+'],
        defaults: ['page' => 1],
        methods: [Request::METHOD_GET]
    )]
    public function handle(int $page = 1, int $limit = 1): JsonResponse
    {
        $dto = new GetAllRequest(...['page' => $page, 'limit' => $limit]);

        try {
            $result = $this->case->execute($dto);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => true, 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse(['action' => 'list', 'items' => $result->getBoards()], Response::HTTP_OK);
    }
}
