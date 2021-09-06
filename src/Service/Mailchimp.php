<?php 

namespace Mia\Mailchimp\Service;

use MailchimpTransactional\ApiClient;
use Mia\Mail\Service\BaseService;

class Mailchimp extends BaseService
{

    /**
     *
     * @var ApiClient
     */
    public $apiInstance = null;

    public function send($addTo, $templateSlug, $params)
    {
        $template = $this->getTemplate($templateSlug);

        if($template == null){
            return false;
        }

        $data = [
            'html' => $this->processParams($template->content, $params),
            'subject' => $template->subject,
            'from_email' => $this->from,
            'from_name' => $this->name,
            'to' => [
                ['email' => $addTo, 'type' => 'to']
            ]
        ];
        
        // Asignamos si contiene email puro texto.
        if($template->content_text != ''){
            $data['text'] = $this->processParams($template->content_text, $params);
        }
        // Enviamos Email
        try {
            return $this->apiInstance->messages->send(['key' => $this->apiKey, 'message' => $data]);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    /**
     * Funcion que se encarga de crear el servicio
     * @return boolean
     */
    protected function createService()
    {
        // Verificamos que se haya cargado una API_KEY
        if($this->apiKey == ''){
            return false;
        }
        // Create service
        $this->apiInstance = new ApiClient();
        $this->apiInstance->setApiKey($this->apiKey);
    }

    /**
     * 
     * @return ApiClient 
     */
    public function getService()
    {
        return $this->apiInstance;
    }
}