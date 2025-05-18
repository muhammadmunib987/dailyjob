<?php

namespace App\Services;

use Google\Auth\OAuth2;
use Illuminate\Support\Facades\Http;

class FCMService
{
    /** Path to the service-account JSON */
    protected string $credentialsPath;

    /** Your Firebase project ID */
    protected string $projectId;

    public function __construct()
    {
        // pull values from config/services.php or fall back to sane defaults
        $this->credentialsPath = config(
            'services.firebase.credentials_file',
            storage_path('app/firebase/firebase-key.json')
        );

        $this->projectId = config(
            'services.firebase.project_id',
            'fir-testnotification-8730b'
        );
    }

    /**
     * Send a push notification via FCM HTTP v1
     *
     * @param  string       $deviceToken  Target device’s FCM token
     * @param  string       $title        Notification title
     * @param  string       $body         Notification body
     * @param  array<string,string> $data Optional custom key/value data
     * @return array|string              FCM JSON response or error message
     */
    public function sendNotification(
        string $deviceToken,
        string $title,
        string $body,
        array  $data = []
    ): array|string {
        /* ------------------------------------------------------------------
           1.  Read service-account JSON and build an OAuth2 access token
        ------------------------------------------------------------------ */
        if (! is_readable($this->credentialsPath)) {
            return 'Service-account JSON not found or unreadable: ' . $this->credentialsPath;
        }

        $creds = json_decode(file_get_contents($this->credentialsPath));

        $oauth = new OAuth2([
            'audience'            => 'https://oauth2.googleapis.com/token',
            'issuer'              => $creds->client_email,
            'signingAlgorithm'    => 'RS256',
            'signingKey'          => $creds->private_key,
            'tokenCredentialUri'  => 'https://oauth2.googleapis.com/token',
            'scope'               => 'https://www.googleapis.com/auth/firebase.messaging',
        ]);

        $tokenArr    = $oauth->fetchAuthToken();
        $accessToken = $tokenArr['access_token'] ?? null;

        if (! $accessToken) {
            return ['error' => 'Unable to fetch OAuth2 access token', 'details' => $tokenArr];
        }

        /* ------------------------------------------------------------------
           2.  Build the HTTP v1 endpoint and payload
        ------------------------------------------------------------------ */
        $url = sprintf(
            'https://fcm.googleapis.com/v1/projects/%s/messages:send',
            $this->projectId
        );

        $payload = [
            'message' => [
                'token'        => $deviceToken,
                'notification' => [
                    'title' => $title,
                    'body'  => $body,
                ],
                // `data` must be an object, not an array
                'data' => (object) $data,
            ],
        ];

        /* ------------------------------------------------------------------
           3.  POST to FCM
        ------------------------------------------------------------------ */
        return Http::withToken($accessToken)
            ->acceptJson()
            ->post($url, $payload)
            ->json();
    }
}
