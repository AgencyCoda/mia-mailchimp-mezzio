<?php

/**
 * @see       https://github.com/mezzio/mezzio-authorization for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-authorization/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-authorization/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Mia\Mailchimp;

use Mia\Mailchimp\Factory\MailchimpMiddlewareFactory;
use Mia\Mailchimp\Factory\MailchimpServiceFactory;
use Mia\Mailchimp\Middleware\MailchimpMiddleware;
use Mia\Mailchimp\Service\Mailchimp;

class ConfigProvider
{
    /**
     * Return the configuration array.
     */
    public function __invoke() : array
    {
        return [
            'dependencies'  => $this->getDependencies()
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'factories' => [
                Mailchimp::class => MailchimpServiceFactory::class,
                MailchimpMiddleware::class => MailchimpMiddlewareFactory::class
            ],
        ];
    }
}