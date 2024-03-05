<?php
/**
 * @package App\Domain\Cases\Board
 * @author Andriy Proskurniak <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Cases\Board;

use App\Domain\Cases\Board\DTO\GetAllBoardsResponse;
use App\Domain\Cases\Board\DTO\GetAllRequest;
use App\Domain\Components\BaseDTO;
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
    public function execute(BaseDTO $requestDto): BaseDTO
    {
        $boards = $this->boardRepository->getAllBoards($requestDto);

        $boardDtos = [];
        foreach ($boards as $boardEntity) {
            $boardDtos[] = new DTO\Board($boardEntity);
        }

        return new GetAllBoardsResponse($boardDtos);
    }
}
