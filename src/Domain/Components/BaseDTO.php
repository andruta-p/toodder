<?php
/**
 * @link https://gepard.io
 * @copyright 2023 (c) Bintime
 * @package App\Domain\Components
 * @author Andriy Proskurniak <a.proskurniak@gepard.io>
 */
declare(strict_types=1);

namespace App\Domain\Components;

class BaseDTO implements \JsonSerializable
{
    public function jsonSerialize(): mixed
    {
        $vars = get_object_vars($this);

        foreach ($vars as $index => $var) {
            if ($var instanceof \JsonSerializable) {
                $vars[$index] = $var->jsonSerialize();
            } elseif ($var instanceof \DateTimeInterface) {
                $vars[$index] = $var->format('Y-m-d H:i:s');
            }
        }

        return $vars;
    }
}
