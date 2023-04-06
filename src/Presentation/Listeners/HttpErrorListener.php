<?php
/**
 * @package App\Presentation\Api\Errors
 * @author andruta-p <andruta.p@gmail.com>
 */
declare(strict_types=1);

namespace App\Presentation\Listeners;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

final class HttpErrorListener
{
    /**
     * @throws \JsonException
     */
    public function __invoke(ExceptionEvent $event): void
    {
        // You get the exception object from the received event
        $exception = $event->getThrowable();

        $message = [
            'error' => true,
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
        ];

        // Customize your response object to display the exception details
        $response = new JsonResponse();
        $response->setJson(json_encode($message, JSON_THROW_ON_ERROR));

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $response->headers->set('Content-Type', 'application/json');

        // sends the modified response object to the event
        $event->setResponse($response);
    }
}
