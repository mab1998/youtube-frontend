<?php
// Get the value of the 'id' parameter from the URL
$url = $_SERVER['REQUEST_URI'];
$queryString = parse_url($url, PHP_URL_QUERY);
parse_str($queryString, $params);
// $id = isset($params['id']) ? basename($params['id'], '.php') : '';

// Display the value of the 'id' parameter
// echo "The value of the 'id' parameter is: " . $params['id'];
?>

<!-- // Generate the title based on the value of the 'id' parameter
$title = isset($params['id']) ? "Video ID: " . $params['id'] : "No video ID found"; -->
<!-- echo "<h1>" . $title . "</h1>"; -->

<!-- // Display the video player -->

<h1 class="text-4xl font-bold mb-6 text-center">Videos </h1>

<div class="w-full flex justify-center">
    <input type="text" id="youtube_url" name="youtube_url" class="mr-2 border border-gray-300 rounded-md p-2 w-full" placeholder="Enter YouTube URL" disabled value="https://www.youtube.com/watch?v=abc123">

    <select id="language" name="language" class="border border-gray-300 rounded-md p-2 w-1/4" disabled>
        <option value="en">English</option>
        <option value="fr">French</option>
        <option value="es">Spanish</option>
        <!-- Add more language options here -->
    </select>
</div>

<div class="w-2/3 mt-6 mx-auto">
    <iframe class="w-full h-auto" src="https://www.youtube.com/embed/1" frameborder="0" allowfullscreen></iframe>
</div>

<div class="w-full mt-6">
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex">
            <button class="w-1/3 py-4 px-1 text-center border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Transcript</button>
            <button class="w-1/3 py-4 px-1 text-center border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Summarize</button>
            <button class="w-1/3 py-4 px-1 text-center border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Article</button>
        </nav>
    </div>
    <div class="py-6">
        <div class="tab-content">


            <!-- Transcript contentsss -->


            <div class="flex">
                <div class="w-2/3">
                    <!-- Content for the first div -->

                        <select id="transcript-service" name="transcript-service" class="border border-gray-300 rounded-md p-2 w-full" disabled>
                            <option value="aws">AWS Transcript</option>
                            <!-- <option value="method2">AWS</option>
                            <option value="method3">Method 3</option> -->
                            <!-- Add more transcript generation methods here -->
                        </select>
                        </div>
                        <div class="w-1/3 ml-2">
                            <!-- Content for the second div -->
                            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" id="generate_transcript">Generate Transcript</button>
                            <!-- <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Generate</button> -->
                        </div>
                        </div>
                        </div>

                        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
                        <script>
                            $(document).ready(function() {
                                $('.tab-content').hide(); // Hide all tab contents initially
                                $('.tab-content:first').show(); // Show the first tab content by default

                                $('#generate_transcript').click(function() {
                                    var id = "<?php echo isset($params['id']) ? basename($params['id'], '.php') : ''; ?>";
                                    var transcriptService = $('#transcript-service').val();

                                    // Make an AJAX request to video_action with the payload
                                    $.ajax({
                                        url: 'video_action',
                                        type: 'POST',
                                        data: { id: id, transcriptService: transcriptService },
                                        success: function(response) {
                                            // Handle the response from the server
                                            console.log(response);
                                        },
                                        error: function(xhr, status, error) {
                                            // Handle any errors
                                            console.error(error);
                                        }
                                    });
                                });

                                $('button').click(function() {
                                    var index = $(this).index(); // Get the index of the clicked button
                                    $('.tab-content').hide(); // Hide all tab contents
                                    $('.tab-content').eq(index).show(); // Show the corresponding tab content
                                });
                            });
                        </script>

            </div>



            

            <div class="w-full mt-6">
                <textarea name="transcript" id="transcript" cols="30" rows="10" class="border border-gray-300 rounded-md p-2 w-full" placeholder="Enter transcript"></textarea>
            </div>

            



        
      
      
      
        </div>
        <div class="tab-content">Summarize content</div>
        <div class="tab-content">Article content</div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.tab-content').hide(); // Hide all tab contents initially
        $('.tab-content:first').show(); // Show the first tab content by default

        $('button').click(function() {
            var index = $(this).index(); // Get the index of the clicked button
            $('.tab-content').hide(); // Hide all tab contents
            $('.tab-content').eq(index).show(); // Show the corresponding tab content
        });
    });
</script>
