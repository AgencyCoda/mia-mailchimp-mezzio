<?php 

declare(strict_types=1);

namespace Mia\Mailchimp\Factory;

use Mia\Mailchimp\Service\Mailchimp;
use Psr\Container\ContainerInterface;

class MailchimpServiceFactory 
{
    public function __invoke(ContainerInterface $container) : Mailchimp
    {
        // Obtenemos configuracion
        $config = $container->get('config')['mailchimp'];
        // creamos libreria
        return new Mailchimp($config);
    }
}