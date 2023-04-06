<?php
/**
 * @package App\Domain\Cases\Board\DTO
 * @author andruta-p <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Cases\Board\DTO;

use App\Domain\Components\BaseDTO;

final class GetAllBoardsResponse extends BaseDTO
{
    protected array $boards = [];

    /**
     * @var \App\Domain\Cases\Board\DTO\Board[] $boards
     */
    public function __construct(
        array $data = []
    ) {
        parent::__construct(['boards' => $data]);
    }

    /**
     * @return |Board[]
     */
    public function getBoards(): array
    {
        return $this->boards;
    }
}
