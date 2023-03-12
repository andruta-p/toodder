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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController implements ControllerInterface
{
    #[Route('/create', name: 'api.border.create', methods: ['POST'])]
    public function create(): JsonResponse
    {
        return new JsonResponse(['message' => 'Created'], Response::HTTP_CREATED);
    }
}
