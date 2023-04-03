<?php
/**
 * @link https://gepard.io
 * @copyright 2023 (c) Bintime
 * @package App\Domain\Cases\Board\DTO
 * @author Andriy Proskurniak <a.proskurniak@gepard.io>
 */
declare(strict_types=1);

namespace App\Domain\Cases\Board\DTO;

use App\Domain\Components\BaseDTO;

final class Board extends BaseDTO
{
    protected string $name;
    protected string $description;
    protected \DateTime $createdAt;
    protected \DateTime $updatedAt;

    public function __construct(\App\Domain\Entities\Board $board)
    {
        $this->name = $board->getName();
        $this->description = $board->getDescription();
        $this->createdAt = $board->getCreatedAt();
        $this->updatedAt = $board->getUpdatedAt();
    }
}
