<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Google\Client;
use Google\Service\Gmail;

class GmailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $client = new Client();
        $client->setApplicationName('online store');
        $client->setScopes(Gmail::GMAIL_READONLY);
        $client->setAccessType('offline'); // To ensure that the token does not expire too quickly
        // $client->setPrompt('select_account consent'); // Prompt user to select account and grant permissions
    
        // // Redirect URI must match the one registered in the Google Developer Console
        // $redirectUri = route('oauthCallback');
        // $client->setRedirectUri($redirectUri);
    
        $gmail = new Gmail($client);
    
        $query = 'is:unread'; // Query to fetch unread emails
        $messagesResponse = $gmail->users_messages->listUsersMessages('me', ['q' => $query]);
    
        foreach ($messagesResponse->getMessages() as $message) {
            // Get message details
            $messageDetails = $gmail->users_messages->get('me', $message->getId());
            // Process message details as needed
            return $messageDetails;
        }
    }
}
