<?php
/**
 * @package App\Domain\Cases\Board\DTO
 * @author Andriy Proskurniak <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Cases\Board\DTO;

use App\Domain\Components\BaseDTO;

final class GetAllBoardsResponse extends BaseDTO
{
    protected array $boards;

    /**
     * @var \App\Domain\Cases\Board\DTO\Board[] $boards
     */
    public function __construct(
        array $boards = []
    ) {
        foreach ($boards as $board) {
            $this->boards[] = $board->jsonSerialize();
        }
    }

    /**
     * @return |Board[]
     */
    public function getBoards(): array
    {
        return $this->boards;
    }
}
