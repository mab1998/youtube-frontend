<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">  <title>Settings </title>
</head>
<body class="bg-gray-100 p-6"> 
    <div class="container mx-auto max-w-md"> 
        <h1 class="text-2xl font-bold mb-4">Settings</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <div class="mb-4">
                    <label for="openai-key" class="block text-gray-700 mb-2">Gemini Pro API Key</label>
                    <input type="text" id="openai-key" class="w-full p-3 border rounded">
                </div>



                <label for="gpt-select" class="block text-gray-700 mb-2">GPT Model</label>
                <div class="relative"> <select id="gpt-select" class="block w-full p-3 border rounded">
                        <option value="gpt-4">GPT-4</option>
                        </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>

            <form id="settings-form" action="/save_settings" method="POST">
                <!-- <div class="mb-4">
                    <label for="transcript-to-article" class="block text-gray-700 mb-2">Prompt Transcript to Article</label>
                    <textarea id="transcript-to-article" class="w-full p-3 border rounded" rows="5"></textarea>
                </div> -->

                <div class="mb-4">
                    <label for="transcript-summarization" class="block text-gray-700 mb-2">Prompt Summarize Transcript</label>
                    <textarea id="transcript-summarization" class="w-full p-3 border rounded" rows="5"></textarea>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save Settings
                </button>
            </form>
        </div>
    </div>

    <script>

        function loadSettings() {
    const base_url = 'http://localhost:8080'; 
    fetch(base_url + '/get_settings')
        .then(response => response.json())
        .then(data => {
            document.getElementById('gpt-select').value = data.gptModel || 'gpt-4'; // Default to gpt-4
            // document.getElementById('transcript-to-article').value = data.transcriptToArticle || '';
            document.getElementById('transcript-summarization').value = data.transcriptSummarization || '';
            document.getElementById('openai-key').value = data.openaiKey || '';

        })
        .catch(error => {
            console.error('Error fetching settings:', error);
        });
}

// Call the loadSettings function when the page loads
window.addEventListener('load', loadSettings); 




        document.getElementById('settings-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get the form inputs and selected option
            var gptSelect = document.getElementById('gpt-select');
            // var transcriptToArticle = document.getElementById('transcript-to-article');
            var transcriptSummarization = document.getElementById('transcript-summarization');
                var openaiKey = document.getElementById('openai-key');


            

            // Create an object with the values
            var data = {
                gptModel: gptSelect.value,
                transcriptToArticle: transcriptToArticle.value,
                transcriptSummarization: transcriptSummarization.value,
                openaiKey: openaiKey.value
            };

            const base_url = 'http://localhost:8080';
            // Send a POST request to the /save_settings endpoint
            fetch(base_url + '/save_settings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(function (response) {
                    if (response.ok) {
                        alert('Settings saved successfully');
                    } else {
                        alert('Failed to save settings');
                    }
                })
                .catch(function (error) {
                    alert('An error occurred while saving settings');
                    console.error(error);
            });
        });
    </script>
</body>
</html>

              
            <!-- </form> -->
        </div>
    </div>


    
</body>
</html>
