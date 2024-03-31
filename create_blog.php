

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
     <input type="link" id="url" placeholder="Insert any YouTube video" 
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
  </section>



  <div id="blog-settings" class="bg-white rounded-lg shadow-md p-6"> 
  <div class="text-lg font-semibold mb-4">Blog Settings</div>

  <div class="grid grid-cols-2 gap-4 mb-6">
    <div>
      <label for="blog-size" class="block text-sm font-medium text-gray-700 mb-2">Blog Size</label>
      <select id="blog-size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="Small">Small</option>
        <option value="Medium" selected>Medium</option>
        <option value="Large">Large</option>
      </select>
    </div>
    <div>
      <label for="blog-tone" class="block text-sm font-medium text-gray-700 mb-2">Blog Tone</label>
      <select id="blog-tone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="engaging" selected>Engaging</option>
        <option value="inspirational">Inspirational</option>
        <option value="informative">Informative</option>
        <option value="professional">Professional</option>
        <option value="conversational">Conversational</option>
        <option value="promotional">Promotional</option>
        <option value="storytelling">Storytelling</option>
        <option value="educational">Educational</option>
        <option value="news">News</option>
        <option value="humorous">Humorous</option>
        <option value="casual">Casual</option>
        <option value="review">Review</option>
        <option value="how-to">How To</option>
      </select>
    </div>
    <div>
      <label for="media-language" class="block text-sm font-medium text-gray-700 mb-2">Media Language</label>
      <select id="media-language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
  <option value="en" selected>English</option>
  <option value="es">Spanish</option>
  <option value="fr">French</option>
  <option value="de">German</option>
  <option value="it">Italian</option>
  <option value="pt">Portuguese</option>
  <option value="nl">Dutch</option>
  <option value="ru">Russian</option>
  <option value="zh">Chinese</option> 
  <option value="ja">Japanese</option>
  <option value="ko">Korean</option>
  <option value="ar">Arabic</option>
  <option value="hi">Hindi</option>
  <option value="bn">Bengali</option>
  <option value="tr">Turkish</option>
  <option value="pl">Polish</option>
  <option value="sv">Swedish</option>
  <option value="da">Danish</option>
  <option value="no">Norwegian</option>
  <option value="fi">Finnish</option>
  <option value="telgu">Telgu</option>


      </select>
    </div>
    <div>
      <label for="blog-language" class="block text-sm font-medium text-gray-700 mb-2">Blog Language</label>
      <select id="blog-language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="english" selected>English</option>
        <option value="spanish">Spanish</option>
        <option value="french">French</option>
        <option value="german">German</option>
        <option value="italian">Italian</option>
        <option value="portuguese">Portuguese</option>
        <option value="dutch">Dutch</option>
        <option value="russian">Russian</option>
        <option value="chinese">Chinese</option>
        <option value="japanese">Japanese</option>
        <option value="korean">Korean</option>
        <option value="arabic">Arabic</option>
        <option value="hindi">Hindi</option>
        <option value="bengali">Bengali</option>
        <option value="turkish">Turkish</option>
        <option value="polish">Polish</option>
        <option value="swedish">Swedish</option>
        <option value="danish">Danish</option>
        <option value="norwegian">Norwegian</option>
        <option value="finnish">Finnish</option>
          <option value="telgu">Telgu</option>

      </select>
    </div>

    <!-- <div id="blog-settings" class="bg-white rounded-lg shadow-md p-6">  -->
  <div class="mb-6"> 
    <label for="writers-pov" class="block text-sm font-medium text-gray-700 mb-2">Writer's Point of View</label>
    <select id="writers-pov" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
      <option value="first-person">FirstPerson = "First Person (I and We)"</option>
      <option value="second-person">SecondPerson = "Second Person (You)"</option>
      <option value="third-person" selected>ThirdPerson = "Third Person (He, She, They, It)"</option>
    </select>
  </div>

  <!-- </div> -->

  </div>

  <!-- <div class="mb-6">
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
  </div> -->

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

<script>
document.getElementById('go_button').addEventListener('click', function() {
  var youtubeUrl = document.getElementById('url').value;
  var language = document.getElementById('blog-language').value;
  var blogSize = document.getElementById('blog-size').value;
  var blogTone = document.getElementById('blog-tone').value;
  var mediaLanguage = document.getElementById('media-language').value;
  var writersPov = document.getElementById('writers-pov').value;
  const base_url = 'https://api.findapply.com';

  function generateRandomString(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }

  var randomString = generateRandomString(6);
  video_id=randomString

var now = new Date();
var article_id = `${video_id}_${now.getFullYear()}${(now.getMonth() + 1).toString().padStart(2, '0')}${now.getDate().toString().padStart(2, '0')}${now.getHours().toString().padStart(2, '0')}${now.getMinutes().toString().padStart(2, '0')}${now.getSeconds().toString().padStart(2, '0')}${now.getMilliseconds().toString().padStart(3, '0')}`;
  



  // Make an XHR POST request to the create_article endpoint
  var xhr = new XMLHttpRequest();
  xhr.open('POST', base_url + '/create_article', true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Success
        alert('Request successful');
      } else {
        // Failure
        alert('Request failed');
      }
    }
  };

  var data = JSON.stringify({
    youtube_url: youtubeUrl,
    writer_point_of_view: writersPov,
    blog_generation_mode: 'auto-Pilot', // Assuming this value is fixed
    blog_language: language,
    media_language: mediaLanguage,
    blog_tone: blogTone,
    blog_size: blogSize,
    article_id: article_id
  });

  document.getElementById('go_button').disabled = true;
  document.getElementById('go_button').innerHTML = 'Waiting...';

  xhr.addEventListener('loadstart', function() {
    // Code to execute when the XHR request starts sending
    window.location.href = '/waiting?' + "article_id" + '=' + article_id;

    console.log('XHR request started sending');
  });
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.status === 'success') {
          var responseObj = JSON.parse(xhr.responseText);
          window.location.href = '/waiting?' + "article_id" + '=' + article_id;
        } else {
          alert('Request failed: ' + response.message);
        }
      } else {
        alert('Request failed');
      }
      document.getElementById('go_button').disabled = false;
      document.getElementById('go_button').innerHTML = 'Generate New Article';
    }
  };

  xhr.send(data);
  });
</script>

</body>
</html>
