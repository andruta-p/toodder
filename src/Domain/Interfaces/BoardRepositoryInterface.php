<?php
/**
 * @package App\Domain\Interfaces
 * @author Andriy Proskurniak <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Interfaces;

use App\Domain\Cases\Board\DTO\GetAllRequest;

interface BoardRepositoryInterface
{
    /**
     * @return array|\App\Domain\Entities\Board[]
     */
    public function getAllBoards(GetAllRequest $request): array;
}
