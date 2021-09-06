<?php

namespace Mia\Mailchimp\Middleware;

use Mia\Mailchimp\Service\Mailchimp;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Description of SendgridHandler
 *
 * @author matiascamiletti
 */
class MailchimpMiddleware extends \Mia\Core\Middleware\MiaBaseMiddleware
{
    /**
     * @var Mailchimp
     */
    private $service;

    public function __construct(Mailchimp $service) {
        $this->service = $service;
    }
    
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        // Enviar servicio como atributo
        return $handler->handle($request->withAttribute('Mailchimp', $this->service));
    }
}