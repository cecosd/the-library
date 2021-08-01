<?php

require './app/bootstrap.php';


$searchService = new \App\Services\AuthorBookSearchService($db->getConnection());

if(isset($_GET['s']) && $_GET['s'] != '') {
    $results = $searchService->getAuthor($_GET['s']);
} else {
    $results = $searchService->getAll();
}

?>
<form action="" method="get">
<input type="text" name="s" placeholder="Search and submit">
<input type="submit" value="Search">
</form>
<ul>
<?php foreach ($results as $result) { ?>
<li>
    <p><?php echo $result['author_name'] ?></p>
    <p><?php echo $result['book_name'] ?></p>
</li>
<?php } ?>
</ul>

