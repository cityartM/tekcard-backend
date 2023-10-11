<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use CURLFile;

class HomeController extends Controller
{

    private $companies;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $orders_by_state = [50,60,90]; ,compact('orders_by_state')

        return view('dashboard.dashboard');

    }

    public static function uploadFile($apiToken, $path)
    {
        $url = 'https://api.assemblyai.com/v2/transcript/upload';

        $headers = [
            'Authorization: ' . $apiToken,
            'Content-Type: application/octet-stream',
        ];

        $file = new \CURLFile($path, mime_content_type($path), basename($path));

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, ['file' => $file]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        if (isset($response['upload_url'])) {
            return $response['upload_url'];
        } else {
            throw new Exception('Error uploading file: ' . $response['message']);
        }
    }

    public static function createTranscript($apiToken, $audioUrl)
    {
        $url = 'https://api.assemblyai.com/v2/transcript';

        $headers = [
            'Authorization: ' . $apiToken,
            'Content-Type: application/json',
        ];

        $data = [
            'audio_url' => $audioUrl,
        ];

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        $transcriptId = $response['id'];

        $pollingEndpoint = "https://api.assemblyai.com/v2/transcript/$transcriptId";

        while (true) {
            sleep(3);

            $pollingResponse = curl_init($pollingEndpoint);

            curl_setopt($pollingResponse, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($pollingResponse, CURLOPT_RETURNTRANSFER, true);

            $transcriptionResult = json_decode(curl_exec($pollingResponse), true);

            if ($transcriptionResult['status'] === 'completed') {
                return $transcriptionResult;
            } elseif ($transcriptionResult['status'] === 'error') {
                throw new Exception('Transcription failed: ' . $transcriptionResult['error']);
            }
        }
    }

}
