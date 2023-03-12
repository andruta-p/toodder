<?php
/**
 * @link https://gepard.io
 * @copyright 2023 (c) Bintime
 * @package App\Infrastructure\Api\Controllers
 * @author Andriy Proskurniak <a.proskurniak@gepard.io>
 */
declare(strict_types=1);

namespace App\Presentation\Api\Borders\Controller;

use App\Domain\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController implements ControllerInterface
{
    #[Route(
        path: '',
        name: 'api.border.list',
        methods: [Request::METHOD_GET]
    )]
    public function handle(): JsonResponse
    {
        return new JsonResponse(['message' => 'List', 'items' => ['s' => 2, 'r' => 4]], Response::HTTP_OK);
    }
}
