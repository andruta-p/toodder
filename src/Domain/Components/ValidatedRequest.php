<?php
/**
 * @package App\Domain\Components
 * @author andruta-p <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Domain\Components;

use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class ValidatedRequest
{
    public function __construct(
        protected readonly ValidatorInterface $validator,
        $request
    ) {
        $this->populate($request);
    }

    public function validate(): array
    {
        $errors = $this->validator->validate($this);

        if (count($errors) === 0) {
            return [];
        }

        $messages = ['message' => 'validation_failed', 'errors' => []];

        /** @var \Symfony\Component\Validator\ConstraintViolation $errors */
        foreach ($errors as $message) {
            $messages['errors'][] = [
                'property' => $message->getPropertyPath(),
                'value' => $message->getInvalidValue(),
                'message' => $message->getMessage(),
            ];
        }

        return $messages;
    }

    protected function populate($request): void
    {
        if (!method_exists($request, 'toArray')) {
            throw new \InvalidArgumentException('Request must have toArray method');
        }

        $data = [];
        try {
            $data = $request->toArray();
        } catch (\UnexpectedValueException $e) {
            if (property_exists($request, 'query')) {
                $data = $request->query->all();
            }
        }

        if (empty($data)) {
            throw new \InvalidArgumentException('Request must have data');
        }

        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }
}
