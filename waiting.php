<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Processing Article</title>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="container mx-auto bg-white shadow-lg rounded-lg p-8 text-center">
        <h1 class="text-2xl font-bold mb-4">Processing Article</h1>

        <div id="status-icon" class="text-gray-500 mb-2">
            <i class="fas fa-spinner fa-spin fa-3x"></i> 
        </div>

        <div id="status-message" class="mb-4">Waiting for article...</div>

        <div id="progress-bar" class="bg-gray-200 rounded-full h-4 mb-4 hidden">
            <div id="progress" class="bg-blue-500 h-4 rounded-full" style="width: 0%"></div>
        </div>

        <div id="result" class="hidden"> 
            </div>
    </div>

    <script >
      const statusIcon = document.getElementById('status-icon');
const statusMessage = document.getElementById('status-message');
const progressBar = document.getElementById('progress-bar');
const progress = document.getElementById('progress');
const result = document.getElementById('result');

const articleId = (new URLSearchParams(window.location.search)).get('article_id'); // Get article_id from URL

function fetchArticleStatus() {
    const base_url='https://api.findapply.com';
    fetch(base_url+'/article_status?article_id=' + articleId)
        .then(response => response.json())
        .then(data => {
            updateStatus(data);
        })
        .catch(error => {
            displayError("Failed to fetch article status");
        });
}

function updateStatus(data) {
    if (data.status === 'processing') {
        statusMessage.textContent = `Processing (${data.step})`;
        progressBar.classList.remove('hidden');
        // console.log(data.percentage);
        progress.style.width = data.percentage + '%'; 
    } else if (data.status === 'success') {
        
        displaySuccess(articleId,data.video_id);
    } else if (data.status === 'failed') {
        
        displayError(data.step);

        // displayError("Article processing failed");
    }
}

function displaySuccess(articleId,video_id) {
    statusIcon.innerHTML = '<i class="fas fa-check-circle text-green-500 fa-3x"></i>'; 
    statusMessage.textContent = "Article processed successfully!";
    result.innerHTML = `<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='/blog?article_id=${articleId}&video_id=${video_id}'">View Article</button>`;
    result.classList.remove('hidden'); 
}

function displayError(message) {
    statusIcon.innerHTML = '<i class="fas fa-times-circle text-red-500 fa-3x"></i>';
    statusMessage.textContent = message;
    result.innerHTML = `<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="fetchArticleStatus()">Retry</button>`;
    result.classList.remove('hidden');
}

fetchArticleStatus(); // Initial fetch
setInterval(fetchArticleStatus, 5000); // Update every 5 seconds

    </script> 
</body>
</html>
