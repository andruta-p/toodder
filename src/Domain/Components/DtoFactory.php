<?php
/**
 * @package App\Domain\Components
 * @author Andriy Proskurniak <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Components;

class DtoFactory
{
    /**
     * @param array|\App\Domain\Interfaces\EntityInterface[] $data
     * @param <class-string> $dtoClass
     * @return \App\Domain\Components\BaseDTO[]
     */
    public function createDtoSet(array $data, string $dtoClass): array
    {
        foreach ($data as $value) {
            $dto = new $dtoClass($value);
        }
        return $dto;
    }
}
