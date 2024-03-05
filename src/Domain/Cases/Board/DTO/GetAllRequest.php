<?php
/**
 * @package App\Domain\Cases\Board\DTO
 * @author Andriy Proskurniak <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Cases\Board\DTO;

use App\Domain\Components\BaseDTO;

final class GetAllRequest extends BaseDTO
{
    public function __construct(
        protected readonly int $page = 1,
        protected readonly int $limit = 5,
    ) {}

    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

}
