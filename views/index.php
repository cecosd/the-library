<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/pub/css/style.css?<?php echo time() ?>">
        <title>The Library</title>
    </head>
    <body>

        <div class="page-wrap">
            <input 
                class="flex-element"
                type="text" 
                value="" 
                id="search-term" 
                placeholder="Start typing and press enter to search..." 
                required
                onkeydown="submitSearch(event)"
            >

            <div id="search-results" class="flex-element"></div>
        </div>
        

        <script src="/pub/js/search.js?<?php echo time() ?>"></script>
    </body>
</html>






