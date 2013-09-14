<?php 
	unlink(APP_ROOT . 'app/files/txt' . '/' . $_GET['id']);

	flash('info', 'Excluído com sucesso!');

	redirect_to('/files/');
?>