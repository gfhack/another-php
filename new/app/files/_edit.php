<?php 
require ('_header.php');

$file_search = new FileSearch(APP_ROOT . 'app/files/txt');
$files = $file_search->retrieve($_GET['id']);
$disabled = 'disabled = "disabled"';

$sendTo = '_save';

require ('_form.php');

require ('_footer.php');
?>