<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 

    // Make a GET request to the video-info endpoint
    $base_url='api.dentairedz.com';
    // $videoInfoUrl = $base_url+'/get_all_articles';



    $videoInfoUrl = $base_url.'/get_all_articles';


    // $base_url = 'https://3.82.226.43:8080';
    // $videoInfoResponse = file_get_contents($videoInfoUrl);

    $ch = curl_init();

    
    curl_setopt($ch, CURLOPT_URL, $videoInfoUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $videoInfoResponse = curl_exec($ch);

    curl_close($ch);

    


    // $videoInfo = json_decode($videoInfoResponse, true);


    $articles = json_decode($videoInfoResponse, true);
    // echo $videoInfoResponse;
    // exit;
    // if (isset($videoInfo[0]['title'])) {
    //     echo $videoInfo[0]['title'];
    // } else {
    //     echo 'Error: Title not found in the response';
    // }
    // exit;  

    // // Parse the response to get the video title
    // $title = $videoInfo['title'];

    // // Make a GET request to the download-audio endpoint
    // $audioUrl = 'http://3.84.5.107/download-audio?url=' . urlencode($youtubeUrl);
    // $audioResponse = file_get_contents($audioUrl);

    // // Check if the request was successful
    // if ($audioResponse !== false) {
    //     // Parse the response to get the audio URL
    //     $audioData = json_decode($audioResponse, true);

    //     // Check if the audio URL exists in the response
    //     if (isset($audioData['url'])) {
    //         $audioUrl = $audioData['url'];

    //         // Insert into the video table
    //         $videoId = 'hggh'; // Set the video ID
    //         $transcript = 'jhg'; // Set the video transcript
    //         $summarization = 'jgg'; // Set the video summarization
    //         $article = 'hjh'; // Set the video article
    //         $url = $youtubeUrl; // Set the video URL

    //         // Add your logic here to insert into the video table
    //         $sql = "INSERT INTO videos (title, transcript, summarization, lang, url) VALUES ('$title', '$transcript', '$summarization', '$language', '$url')";

    //         // Execute the SQL query
    //         if ($conn->query($sql) === TRUE) {
    //             echo "New record created successfully";
    //         } else {
    //             echo "Error: " . $sql . "<br>" . $conn->error;
    //         }

    //         // Return the audio URL in the response
    //         $response = [
    //             'message' => 'This is the API endpoint response',
    //             'data' => [
    //                 'audio_url' => $audioUrl
    //             ]
    //         ];

    //         // Set the response headers
    //         header('Content-Type: application/json');
    //         http_response_code(200);

    //         // Output the response as JSON
    //         echo json_encode($response);
    //         exit;
    //     } else {
    //         echo 'Error: Audio URL not found in the response';
    //     }
    // } else {
    //     echo 'Error: Failed to make a GET request to the download-audio endpoint';
    // }
// }
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
<body>
    <div class="container mx-auto"> <!-- Add mx-auto class for horizontal centering -->
        <div>
            <?php $current_page = 'home'; include('sidebar.php'); ?>
            
            <h1 class="text-4xl font-bold mb-6 text-center">Youtube Tools</h1>


        

                                    <button  class="mb-8 mt-8 bg-green-500 hover:bg-green-700 text-white font-bold mt-2 py-2 px-4 rounded-lg text-xl w-full">
                                        <a href="/create_blog" target="_blank">Create New Article</a>
                                    </button>



<?php
// $articles = [
//     [
//         'title' => 'Article 1',
//         'lang' => 'English',
//         'url' => 'https://example.com/article1'
//     ],
//     [
//         'title' => 'Article 2',
//         'lang' => 'French',
//         'url' => 'https://example.com/article2'
//     ],
//     [
//         'title' => 'Article 3',
//         'lang' => 'Spanish',
//         'url' => 'https://example.com/article3'
//     ]
// ];

if (!empty($articles)) {
    echo '<table id="videosTable" class="table-auto">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="px-4 py-2">Article_id</th>';

    echo '<th class="px-4 py-2">Title</th>';
    // echo '<th class="px-4 py-2">Article</th>';
    echo '<th class="px-4 py-2">URL</th>';
    echo '<th class="px-4 py-2">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($articles as $article) {
        echo '<tr>';
        echo '<td class="border px-4 py-2">' . $article['article_id'] . '</td>';

        echo '<td class="border px-4 py-2">' . $article['title'] . '</td>';
        echo '<td class="border px-4 py-2"><a href=https://www.youtube.com/watch?v="' . $article['video_id'] . '" target="_blank">https://www.youtube.com/watch?v=' . $article['video_id'] . '</a></td>';
        echo '<td class="border px-4 py-2"><a target="_blank" href="/blog?video_id=' . $article['video_id'] . '?&article_id='.$article['article_id'].'"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg" ><i class="fas fa-arrow-right"></i> Go</button></a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    // Add DataTables library and initialize the table
    echo '<script>';
    echo '$(document).ready(function() {';
    echo '    $("#videosTable").DataTable();';
    echo '});';
    echo '</script>';
} else {
    echo "No articles found";
}

?>
            

            
         

            
        </div>
    </div>

    <script>

        // function validateYouTubeUrl(url) {
        //     // Regular expression to validate YouTube URL
        //     var pattern = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/
        //     return pattern.test(url);
        // }

        // function sendRequest() {
        //     var youtubeUrl = document.getElementById('youtube_url').value;
        //     var language = document.getElementById('language').value;

        //     if (validateYouTubeUrl(youtubeUrl)) {
        //         // Disable the button and show spinner
        //         var button = document.getElementById('go_button');
        //         button.disabled = true;
        //         button.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';

        //         // Send request to /create_video
        //         var xhr = new XMLHttpRequest();
        //         xhr.open('POST', '/create_video', true);
        //         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //         xhr.onreadystatechange = function() {
        //             if (xhr.readyState === 4) {
        //                 if (xhr.status === 200) {
        //                     // Request successful, reload the page
        //                     location.reload();
        //                 } else {
        //                     // Request failed, show error alert
        //                     alert('Request failed');
        //                 }

        //                 // Enable the button and restore its original text
        //                 button.disabled = false;
        //                 button.innerHTML = 'Go';
        //             }
        //         };
        //         xhr.send('youtube_url=' + encodeURIComponent(youtubeUrl) + '&language=' + encodeURIComponent(language));
        //     } else {
        //         // Invalid YouTube URL, show error message
        //         alert('Invalid YouTube URL');
        //     }
        // }

        // document.getElementById('go_button').addEventListener('click', sendRequest);

    </script>


</body>
</html>
