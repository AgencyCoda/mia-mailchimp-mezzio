<?php

declare(strict_types=1);

namespace Mia\Mailchimp\Factory;

use Mia\Mailchimp\Middleware\MailchimpMiddleware;
use Mia\Mailchimp\Service\Mailchimp;
use Psr\Container\ContainerInterface;

/**
 * Description of SendgridHandlerFactory
 *
 * @author matiascamiletti
 */
class MailchimpMiddlewareFactory 
{
    public function __invoke(ContainerInterface $container) : MailchimpMiddleware
    {
        // Creamos servicio
        $service   = $container->get(Mailchimp::class);
        // Generamos el handler
        return new MailchimpMiddleware($service);
    }
}