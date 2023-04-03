<?php
/**
 * @link https://gepard.io
 * @copyright 2023 (c) Bintime
 * @package App\Domain\Interfaces
 * @author Andriy Proskurniak <a.proskurniak@gepard.io>
 */
declare(strict_types=1);

namespace App\Domain\Interfaces;

use App\Domain\Components\BaseDTO;

interface CaseInterface
{
    public function execute(BaseDTO $requestDto): BaseDTO;
}
