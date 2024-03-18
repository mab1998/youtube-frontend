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
  <title>Blog Title</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Blog Title</h1>

    
    <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/amwutoxujnznl2vsi5xpaypwgji2wjnxz76wbibyq54390vb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',


    



    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>

<div class="mt-4 mb-4">
    <input id="blog_title" type="text" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Blog Title"  value=<?php echo $response["title"]; ?>>
</div>


<textarea>
<?php echo $response["article"]; ?>
</textarea>


<button onclick="getOuterHTML()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg w-full mt-4 mb-4">Save</button>

<script>
    function getOuterHTML() {
        var editorElement = tinymce.activeEditor.getBody();
        var outerHTML = tinymce.DOM.getOuterHTML(editorElement);

        blog_title = document.getElementById('blog_title').value;

        console.log(JSON.stringify({
            "video_id": "<?php echo $video_id; ?>",
            "article_id": "<?php echo $article_id; ?>",
            "title": blog_title,
            "article": outerHTML
        }));

        // var xhr = new XMLHttpRequest();
        // xhr.open("POST", "http://localhost:8080/save_article", true);
        // xhr.setRequestHeader('Content-Type', 'application/json');
        // xhr.send(JSON.stringify({
        //     "video_id": "<?php echo $video_id; ?>",
        //     "article_id": "<?php echo $article_id; ?>",
        //     "title": blog_title,
        //     "article": outerHTML
        // }));

        // xhr.onreadystatechange = function() {
        //     if (xhr.readyState == 4) {
        //         if (xhr.status == 200) {
        //             console.log(xhr.responseText);
        //             alert("Request successful");
        //         } else {
        //             alert("Request failed");
        //         }
        //     }
        // }


        fetch('http://localhost:8080/save_article', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            video_id: 'your_video_id',
            article_id: 'pdf:108',
            title: 'your_title',
            article: 'your_article',
        }),
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch((error) => {
        console.error('Error:', error);
        });




        console.log(outerHTML);
    }
</script>



  </div>
</body>
</html>
