<?php

namespace Mia\Mailchimp\Handler;

use Mia\Mailchimp\Service\Mailchimp;

/**
 * Description of ListHandler
 *
 * @author matiascamiletti
 */
trait MailchimpTrait
{
    /**
     * @var Mailchimp
     */
    protected $mailchimp;

    public function getSendgrid(\Psr\Http\Message\ServerRequestInterface $request): Mailchimp
    {
        if($this->mailchimp === null){
            $this->mailchimp = $request->getAttribute('Mailchimp');
        }
        return $this->mailchimp;
    }
}