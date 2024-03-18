<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_URI'] === '/create_video' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the GET request for the /api/endpoint
    // Add your logic here to process the request and generate the response
    // Get the YouTube URL and language from the request parameters
    $youtubeUrl = $_POST['youtube_url'];
    $language = $_POST['language'];


    // Make a GET request to the video-info endpoint
    $videoInfoUrl = 'http://3.84.5.107/video-info?url=' . urlencode($youtubeUrl);
    $videoInfoResponse = file_get_contents($videoInfoUrl);

    // Parse the response to get the video title
    $videoInfo = json_decode($videoInfoResponse, true);
    $title = $videoInfo['title'];


    // Check if the request was successful
    if ($audioResponse !== false) {
        // Parse the response to get the audio URL
        $audioData = json_decode($audioResponse, true);
        
        // Check if the audio URL exists in the response
        if (isset($audioData['url'])) {
            $audioUrl = $audioData['url'];
            return $audioUrl;
        } else {
            return 'Error: Audio URL not found in the response';

        }
    } else {
        return 'Error: Failed to make a GET request to the download-audio endpoint';
    }
    exit;

    // Use the audio URL as needed in your code
    // ...

    // Insert into the video table
    $videoId = 'hggh'; // Set the video ID
    $title = $title; // Set the video title
    $transcript = 'jhg'; // Set the video transcript
    $summarization = 'jgg'; // Set the video summarization
    $article = 'hjh'; // Set the video article
    $url = $youtubeUrl; // Set the video URL

    // Add your logic here to insert into the video table
    $sql = "INSERT INTO videos ( title, transcript, summarization,lang ,url) VALUES ( '$title', '$transcript', '$summarization','$language' , '$url')";
    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // ...

    $response = [
        'message' => 'This is the API endpoint response',
        'data' => [
            'key' => 'value'
        ]
    ];

    // Return the YouTube URL and language in the response
    $response['data']['youtube_url'] = $youtubeUrl;
    $response['data']['language'] = $language;

    // Set the response headers
    header('Content-Type: application/json');
    http_response_code(200);

    // Output the response as JSON
    echo json_encode($response);
    exit;
} elseif ($_SERVER['REQUEST_URI'] === '/video_action' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the POST request for the /video_action route
    // Add your logic here to process the request and generate the response
    // Get the request parameters
    $params = $_POST;

    // Get the video ID from the request parameters
    $videoId = $_POST['id'];



    // Add your logic here to search for the video in the database
    // ...

    // Prepare the SQL statement
    $sql = "SELECT * FROM videos WHERE id = '$videoId'";

    // Execute the SQL query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the video data from the result
        $videoData = $result->fetch_assoc();

        // Add your logic here to process the video data
        // ...

        // Output the video data as JSON

        // Get the URL from the response
        $url = $videoData['url'];
        header('Content-Type: application/json');

        // return $url;
        // exit;   

        
        // $videoInfoUrl = 'http://3.84.5.107/video-info';

        // Make a GET request to the download-audio endpoint
        $audioUrl = 'http://3.84.5.107/download-audio?url=' . urlencode($url);
        $audioResponse = file_get_contents($audioUrl);
        return $audioResponse;
        exit;   





        // Set the response headers
        header('Content-Type: application/json');
        http_response_code(200);

        // Output the URL as JSON
        $response = [
            'url' => $url
        ];

        echo json_encode($response);
        exit;

        // Use the URL as needed in your code

    } else {
        // Handle the case when the query fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}