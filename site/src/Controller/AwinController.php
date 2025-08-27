<?php

namespace Thusia\Component\AwinSignupForm\Site\Controller;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Crypt\Crypt;



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
        $app = Factory::getApplication();
        $input = $app->input;

        //Generate the hash for the password
        $hashedPassword = Crypt::hash($input->getString('password'));

        $data = [
            'firstName' => $input->getString('firstName'),
            'lastName'  => $input->getString('lastName'),
            'emailAddress'     => $input->getString('emailAddress'),
            'password'  => $hashedPassword
        ];

        $error = '';
        // Data validation here
        // First name must start with a letter and cannot be shorter than 2 characters
        if (!preg_match('/^[a-zA-Z]{2,}/', $data['firstName'])) {
            // echo new JsonResponse(['success' => false, 'error' => 'Invalid first name']);
            $error = 'Invalid first name.';
            $app->enqueueMessage($error, 'error');
        }
        // Last name must start with a letter and cannot be shorter than 2 characters
        if (!preg_match('/^[a-zA-Z]{2,}/', $data['lastName'])) {
            $error = "Invalid last name.";
            $app->enqueueMessage($error, 'error');
        }

        // Email must be a valid email format
        if (!filter_var($data['emailAddress'], FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email address.";
            $app->enqueueMessage($error, 'error');
        }

        // Password must be at least 6 characters long include a number, a lowercase letter an upper case letter and a special character
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?#&])[A-Za-z\d@$!%*?#&]{6,}$/', $data['password'])) {
            $error = "Invalid password, password must be at least 6 characters long and include a number, a lowercase letter, an uppercase letter, and one of these special character: @$!%*?#&.".' '. $data['password'];
            $app->enqueueMessage($error, 'error');
        }

        if (strlen($error) > 0 ) {
            $session = Factory::getApplication()->getSession();
            $session->set('awinsignupform.data', $data); // $data is your validated input array
            $app->redirect(Route::_('index.php?option=com_awinsignupform&view=awin', false));
            return;
        }

        // Convert to JSON
        // $jsonData = json_encode($data);

        // Send POST request
        // $http = HttpFactory::getHttp();

        $url = 'https://external-server.com/api/endpoint'; // Replace with your actual endpoint

        // try {
        //     $response = $http->post($url, $jsonData, ['Content-Type' => 'application/json']);
        //     $body = $response->getBody();

        //     // Optionally handle response
        //     echo new JsonResponse(['success' => true, 'response' => $body]);
        // } catch (\Exception $e) {
        //     echo new JsonResponse(['success' => false, 'error' => $e->getMessage()]);
        // }


        // echo new JsonResponse(['message' => 'Form submitted successfully', 'data' => $data]);

        // // Prevent Joomla from further processing
        // Factory::getApplication()->close();
        // $app->redirect("http://localhost/joomla5/index.php?option=com_awinsignupform&view=success", true);
        $app->redirect(Route::_('index.php?option=com_awinsignupform&view=success', false));
        return;

    }
}