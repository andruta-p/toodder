<?php
/**
 * @package App\Domain\Interfaces
 * @author andruta-p <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Interfaces;

use App\Domain\Components\BaseDTO;
use App\Domain\Components\ValidatedRequest;

interface CaseInterface
{
    public function execute(ValidatedRequest $requestDto): BaseDTO;
}
