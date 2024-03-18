<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $youtubeUrl = $_POST['youtube_url'];
    $language = $_POST['language'];

    // Make a GET request to the video-info endpoint
    $videoInfoUrl = 'http://3.84.5.107/video-info?url=' . urlencode($youtubeUrl);
    $videoInfoResponse = file_get_contents($videoInfoUrl);

    // Parse the response to get the video title
    $videoInfo = json_decode($videoInfoResponse, true);
    $title = $videoInfo['title'];

    // Make a GET request to the download-audio endpoint
    $audioUrl = 'http://3.84.5.107/download-audio?url=' . urlencode($youtubeUrl);
    $audioResponse = file_get_contents($audioUrl);

    // Check if the request was successful
    if ($audioResponse !== false) {
        // Parse the response to get the audio URL
        $audioData = json_decode($audioResponse, true);

        // Check if the audio URL exists in the response
        if (isset($audioData['url'])) {
            $audioUrl = $audioData['url'];

            // Insert into the video table
            $videoId = 'hggh'; // Set the video ID
            $transcript = 'jhg'; // Set the video transcript
            $summarization = 'jgg'; // Set the video summarization
            $article = 'hjh'; // Set the video article
            $url = $youtubeUrl; // Set the video URL

            // Add your logic here to insert into the video table
            $sql = "INSERT INTO videos (title, transcript, summarization, lang, url) VALUES ('$title', '$transcript', '$summarization', '$language', '$url')";

            // Execute the SQL query
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Return the audio URL in the response
            $response = [
                'message' => 'This is the API endpoint response',
                'data' => [
                    'audio_url' => $audioUrl
                ]
            ];

            // Set the response headers
            header('Content-Type: application/json');
            http_response_code(200);

            // Output the response as JSON
            echo json_encode($response);
            exit;
        } else {
            echo 'Error: Audio URL not found in the response';
        }
    } else {
        echo 'Error: Failed to make a GET request to the download-audio endpoint';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body style="background-color: #f2f2f2;">
    <div class="container mx-auto"> <!-- Add mx-auto class for horizontal centering -->
        <div>
            <?php $current_page = 'home'; include('sidebar.php'); ?>
            
            <h1 class="text-4xl font-bold mb-6 text-center">Youtube Tools</h1>


 <section class="mb-6 bg-white p-4">
     <label for="url" class="block mb-2 text-sm font-medium">Video/Audio URL</label>
     <input type="link" id="url" placeholder="Insert any YouTube video, Google Podcast, Vimeo or any downloadable video or audio link to transform it into a blog" 
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
  </section>



  <div id="blog-settings" class="bg-white rounded-lg shadow-md p-6"> 
  <div class="text-lg font-semibold mb-4">Blog Settings</div>

  <div class="grid grid-cols-2 gap-4 mb-6">
    <div>
      <label for="blog-size" class="block text-sm font-medium text-gray-700 mb-2">Blog Size</label>
      <select id="blog-size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="short">Short</option>
        <option value="medium" selected>Medium</option>
        <option value="long">Long</option>
      </select>
    </div>
    <div>
      <label for="blog-tone" class="block text-sm font-medium text-gray-700 mb-2">Blog Tone</label>
      <select id="blog-tone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="formal">Formal</option>
        <option value="engaging" selected>Engaging</option>
        <option value="humorous">Humorous</option>
      </select>
    </div>
    <div>
      <label for="media-language" class="block text-sm font-medium text-gray-700 mb-2">Media Language</label>
      <select id="media-language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="global-english" selected>Global English</option>
        <option value="spanish">Spanish</option>
        <option value="french">French</option>
      </select>
    </div>
    <div>
      <label for="blog-language" class="block text-sm font-medium text-gray-700 mb-2">Blog Language</label>
      <select id="blog-language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="english" selected>English</option>
        <option value="spanish">Spanish</option>
        <option value="french">French</option>
      </select>
    </div>

    <!-- <div id="blog-settings" class="bg-white rounded-lg shadow-md p-6">  -->
  <div class="mb-6"> 
    <label for="writers-pov" class="block text-sm font-medium text-gray-700 mb-2">Writer's Point of View</label>
    <select id="writers-pov" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
      <option value="first-person">First Person (I & We)</option>
      <option value="second-person">Second Person (You)</option>
      <option value="third-person" selected>Third Person (He, She, They, It)</option>
    </select>
  </div>

  <!-- </div> -->

  </div>

  <div class="mb-6">
    <div class="text-xs text-gray-500 mb-3">Blog Generation Mode</div>
    <div class="flex items-center space-x-4">
      <label class="flex items-center">
        <input type="radio" name="generationMode" class="form-radio h-4 w-4 text-blue-500" checked>
        <span class="ml-2 text-sm">Auto-Pilot</span>
      </label>
      <label class="flex items-center">
        <input type="radio" name="generationMode" class="form-radio h-4 w-4 text-blue-500">
        <span class="ml-2 text-sm">Co-Pilot</span>
      </label>
    </div>
  </div>

  <!-- <div class="flex items-start mb-4">
    <div class="flex items-center h-5">
      <input id="affiliate-opt-in" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
      <label for="affiliate-opt-in" class="font-medium text-gray-700">Opt In for Affiliate Commission</label>
      <p class="text-gray-500 text-xs">Beta - we're currently improving our algorithm</p>
    </div>
  </div>
  <div class="flex items-start">
    <div class="flex items-center h-5">
      <input id="content-credit" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
      <label for="content-credit" class="font-medium text-gray-700">Give credit to content creator</label>
    </div>
  </div> -->

</div>




            <button type="submit" id="go_button" class="mb-8 mt-8 bg-green-500 hover:bg-green-700 text-white font-bold mt-2 py-2 px-4 rounded-lg text-xl w-full">Generate New Article</button>
    

            
         

            
        </div>
    </div>



</body>
</html>
