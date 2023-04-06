<?php
/**
 * @package App\Infrastructure\Api\Controllers
 * @author andruta-p <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Presentation\Api\Border\Controllers;

use App\Domain\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController implements ControllerInterface
{
    public function __construct()
    {
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    #[Route('', name: 'api.border.create', methods: ['POST'])]
    public function handle(): JsonResponse
    {
        return new JsonResponse(['message' => 'Created'], Response::HTTP_CREATED);
    }
}
