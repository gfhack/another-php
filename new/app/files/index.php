<?php
	$file_search = new FileSearch(APP_ROOT . 'app/files/txt');
	$files = $file_search->findAll();
    $recent_searchs = new RecentSearchs('search');

	require('list.php');
?>