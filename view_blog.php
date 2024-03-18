<?php
$video_id = $_GET['video_id'];
$article_id = $_GET['article_id'];


$base_website="http://localhost:8080";

$api_url = $base_website."/get_article?video_id=".$video_id."&article_id=".$article_id;
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

if ($response) {
    // Process the response here
    // echo $response;
    $response = json_decode($response, true);
    // echo $response;



} else {
    // Handle the error here
    echo "Failed to fetch data from API";
    exit;
}

// echo $api_url;
// exit;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>




        <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/docxtemplater/3.29.1/docxtemplater.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script> 


    <!-- <script src="your_custom_script.js"></script>  -->

  
    <title>Blog View</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<body style="background-color: rgb(229, 231, 235);"></body>


    <div class="container mx-auto mb-6">
        <h1 class="text-2xl font-bold text-left mt-8 ">View Blog</h1>

    </div>




    <div class="container mx-auto mb-8">
        
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white p-4 shadow-lg rounded-lg col-span-2" id="blog">
                <h2 class="text-xl font-bold" ><?php echo $response["title"]; ?></h2>
       
                <?php echo $response["article"]; ?>

            </div>

            <div class="col-span-1">
      <div class="bg-white p-4 shadow-lg rounded-lg mb-4">
                <h2 class="text-xl font-bold">Action :</h2>
               
                <div class="flex justify-between mt-4 grid grid-cols-2 gap-2">
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="copyText()">
                        <i class="fas fa-copy"></i> Copy Text
                    </button>
                    <script>
                        function copyText() {
                            console.log("Button clicked");
                            var blogText = document.getElementById("blog").innerText;
                            navigator.clipboard.writeText(blogText)
                                .then(function() {
                                    console.log('Text copied to clipboard');
                                })
                                .catch(function() {
                                    console.error('Failed to copy text to clipboard');
                                });
                        }
                    </script>
                    <button class="copy-button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-copy"></i> Copy HTML
                    </button>
                    <button class="download-pdf bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-download"></i> Download PDF
                    </button>
                    <button class="download-doc  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-download"></i> Download DOC
                    </button>
                    <button class="edit-blog bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-edit"></i> Edit Blog
                    </button>
                    <button class="delete-blog bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-trash"></i> Delete Blog
                    </button>
                </div>
            </div>

                  <div class="bg-white p-4 shadow-lg rounded-lg mb-4">

                            <h2 class="text-xl font-bold mb-4">Source :</h2>
                            <!-- FILEPATH: /C:/mabrouk/codecanyon/react_pure/fastapi/static/blog_view.html -->
                            <!-- BEGIN: youtube_embed -->
                            <div class="container mx-auto">
                                <!-- <h2 class="text-2xl font-bold">Watch this YouTube video:</h2> -->
                                <div class="video-container" style="width: 100%;">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        <!-- END: youtube_embed -->

                   </div>


                    <div class="bg-white p-4 shadow-lg rounded-lg mb-8">
                        <h2 class="text-xl font-bold mb-4">Keywords :</h2>
                        <ul class="flex flex-wrap">
                            <?php foreach ($response["keywords"] as $keyword) { ?>
                                <li class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full mr-2 mb-2"><?php echo $keyword; ?></li>
                            <?php } ?>
                        </ul>
                    </div>


                     <div class="bg-white p-4 shadow-lg rounded-lg mb-8">
                                <h2 class="text-xl font-bold mb-4">Transcription :</h2>
                            <p class="text-gray-700"><?php echo $response["transcript"]; ?></p>
                           
                   </div>

                   
                     <div class="bg-white p-4 shadow-lg rounded-lg ">
                                <h2 class="text-xl font-bold mb-4">Summirization :</h2>
                            <p class="text-gray-700"><?php echo $response["summarization"]; ?></p>
                           
                   </div>




            </div>
           
      
        </div>

       
    </div>




    <script>
    function copyText() {
        console.log("Button clicked");

        var blogText = document.getElementById("blog").innerText;
        navigator.clipboard.writeText(blogText)
            .then(function() {
                console.log('Text copied to clipboard');
                alert('Text copied to clipboard');
            })
            .catch(function() {
                console.error('Failed to copy text to clipboard');
                alert('Failed to copy text to clipboard');
            });
    }

function copyHtml() {
    const blogHTML = document.getElementById('blog').outerHTML;
    navigator.clipboard.writeText(blogHTML)
        .then(() => {
            console.log('HTML copied to clipboard');
            alert('HTML copied to clipboard');
        })
        .catch(() => {
            console.error('Failed to copy HTML to clipboard');
            alert('Failed to copy HTML to clipboard');
        });
}
    



    // PDF Download
    // const downloadPDFButton = document.querySelector('.download-pdf');
    // downloadPDFButton.addEventListener('click', () => {
    //    const videoId = 'your_video_id'; // Replace 'your_video_id' with the actual video ID
    //     $videoId = 'your_video_id'; // Replace 'your_video_id' with the actual video ID

    //     $params = [
    //         'video_id' => $videoId,
    //         'type' => 'pdf'
    //     ];

    //     $queryString = http_build_query($params);
    //     $base_url = "http://localhost:8080";
    //     $url = $base_url . '/download_article?' . $queryString;

    //     $response = file_get_contents($url);
    //     console.log($response);

    //     // Handle the response here

    //     window.open(url, '_blank');
    
    //     window.open(url, '_blank');
    // });



const downloadPDFButton = document.querySelector('.download-pdf');
downloadPDFButton.addEventListener('click', () => {
    const videoId = '<?= $video_id ?>'; // Get the video ID from PHP

    fetch(`/download_article.php?video_id=${videoId}&type=pdf`)
        .then(response => {
            if (!response.ok) {
                throw new Error('PDF download failed');
            }
            // You might need to handle the response to initiate download  
        })
        .catch(error => console.error('PDF download error:', error));
});

// DOCX Download 
const downloadDOCButton = document.querySelector('.download-doc');
downloadDOCButton.addEventListener('click', () => {


  const videoId = 'your_video_id'; // Replace 'your_video_id' with the actual video ID
        $videoId = 'your_video_id'; // Replace 'your_video_id' with the actual video ID

        $params = [
            'video_id' => $videoId,
            'type' => 'docx'
        ];

        $queryString = http_build_query($params);
        $base_url = "http://localhost:8080";
        $url = $base_url . '/download_article?' . $queryString;

        $response = file_get_contents($url);
        console.log($response);

        // Handle the response here

        window.open(url, '_blank');
    
    
    });

// Copy HTML
const copyHTMLButton = document.querySelector('.copy-button');
copyHTMLButton.addEventListener('click', () => {
    const blogHTML = document.getElementById('blog').outerHTML;
    navigator.clipboard.writeText(blogHTML)
        .then(() => alert('HTML copied to clipboard'))
        .catch(() => alert('Failed to copy HTML'));
});

// Edit Blog (Illustrative)
const editBlogButton = document.querySelector('.edit-blog');
editBlogButton.addEventListener('click', () => {
    const blogId = <?php echo $response["article_id"]; ?>; // Assuming you have a way to get the blog's ID
    window.location.href = `/edit/${blogId}`; 
});

// Delete Blog
const deleteBlogButton = document.querySelector('.delete-blog');
deleteBlogButton.addEventListener('click', () => {
    if (confirm('Are you sure you want to delete this blog?')) {

        const blogId = <?php echo $response["article_id"]; ?>; // Assuming you have a way to get the blog's ID
        fetch(`/delete/${blogId}`, { method: 'DELETE' })
            .then(response => { 
                if (response.ok) {
                    // Remove blog element or display success message
                } else {
                    // Handle error 
                }
            });
    }
});



    </script>
</body>
</html>
              