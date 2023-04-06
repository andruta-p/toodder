<?php
/**
 * @package App\Domain\Cases\Board
 * @author andruta-p <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Cases\Board;

use App\Domain\Cases\Board\DTO\GetAllBoardsResponse;
use App\Domain\Cases\Board\DTO\GetAllRequest;
use App\Domain\Components\BaseDTO;
use App\Domain\Components\ValidatedRequest;
use App\Domain\Interfaces\BoardRepositoryInterface;
use App\Domain\Interfaces\CaseInterface;

class GetAllBoardsCase implements CaseInterface
{
    public function __construct(
        private readonly BoardRepositoryInterface $boardRepository
    ) {}

    /**
     * @param GetAllRequest $requestDto
     *
     * @return \App\Domain\Cases\Board\DTO\GetAllBoardsResponse
     */
    public function execute(ValidatedRequest $requestDto): BaseDTO
    {
        $boards = $this->boardRepository->getAllBoards($requestDto);

        $dtoSet = [];
        foreach ($boards as $boardEntity) {
            $dtoSet[] = new DTO\Board(
                [
                    'name' => $boardEntity->getName(),
                    'description' => $boardEntity->getDescription(),
                    'createdAt' => $boardEntity->getCreatedAt(),
                    'updatedAt' => $boardEntity->getUpdatedAt(),
                ]
            );
        }

        return new GetAllBoardsResponse($dtoSet);
    }
}
