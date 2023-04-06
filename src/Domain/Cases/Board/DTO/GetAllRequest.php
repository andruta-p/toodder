<?php
/**
 * @package App\Domain\Cases\Board\DTO
 * @author andruta-p <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Cases\Board\DTO;

use App\Domain\Components\ValidatedRequest;
use Symfony\Component\Validator\Constraints as Assert;

final class GetAllRequest extends ValidatedRequest
{
    #[Assert\Type(type: 'integer', message: 'Page number must be integer')]
    #[Assert\Positive(message: 'Page number must be positive integer')]
    protected $page = 1;

    #[Assert\Type(type: 'integer', message: 'Limit must be integer')]
    #[Assert\Positive(message: 'Limit must be positive integer')]
    protected $limit = 5;

    public function getPage(): int
    {
        return (int)$this->page;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return (int)$this->limit;
    }

}
