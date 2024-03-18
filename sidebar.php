

<?php
$current_page = $_SERVER['REQUEST_URI'];
?>

<div class="fixed top-0 left-0 h-screen w-64 bg-gray-800">
    <div class="flex flex-col justify-between h-full p-4">
        <div>
            <a href="/" class="text-white font-bold">Your App</a>
        </div>

        <ul class="space-y-2">
            <li>
                <a href="/" class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700 
                   <?php if($current_page == 'home') echo 'bg-gray-700'; ?>"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li>
                <a href="/settings" class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700
                    <?php if($current_page == 'settings') echo 'bg-gray-700'; ?>"> <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                    <span class="ml-3">Settings</span>
                </a>
            </li>
        </ul>

        </div>
</div>
