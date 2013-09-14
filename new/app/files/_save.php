<?php

$file = File::findByName($_POST['file']['name'], 'txt/');

if ($file != null){
   $file->setBody($_POST['file']['body']);
   $file->save();
}
flash('info', 'Editado!');
redirect_to('/files/');
?>