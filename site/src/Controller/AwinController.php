<?php

namespace Thusia\Component\AwinSignupForm\Site\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Factory;
use Joomla\CMS\Response\JsonResponse;
use Joomla\CMS\Http\HttpFactory;


class AwinController extends FormController
{
    public function submit()
    {
        // Get input
        // $input = Factory::getApplication()->input;
        // $data = [
        //     'first_name' => $input->getString('first_name'),
        //     'last_name'  => $input->getString('last_name'),
        //     'email'      => $input->getString('email'),
        // ];

        // // Data validation here

        // // Convert to JSON
        // $jsonData = json_encode($data);

        // // Send POST request
        // $http = Factory::getHttpFactory()->getHttp();
        // $url = 'https://external-server.com/api/endpoint'; // Replace with your actual endpoint

        // try {
        //     $response = $http->post($url, $jsonData, ['Content-Type' => 'application/json']);
        //     $body = $response->getBody();

        //     // Optionally handle response
        //     echo new JsonResponse(['success' => true, 'response' => $body]);
        // } catch (\Exception $e) {
        //     echo new JsonResponse(['success' => false, 'error' => $e->getMessage()]);
        // }

        // // Prevent Joomla from further processing
        // Factory::getApplication()->close();

        echo new JsonResponse(['message' => 'Controller executed korrekhar']);
        Factory::getApplication()->close();

    }
}