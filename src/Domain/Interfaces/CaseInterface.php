<?php
/**
 * @package App\Domain\Interfaces
 * @author Andriy Proskurniak <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Interfaces;

use App\Domain\Components\BaseDTO;

interface CaseInterface
{
    public function execute(BaseDTO $requestDto): BaseDTO;
}
