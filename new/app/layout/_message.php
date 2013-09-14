<div class="span9">
   <?php
   foreach(flash() as $key => $value){?>
      <div class='alert alert-<?= @$key ?>'>
         <a class='close' data-dismiss='alert'>x</a>
         <?= @$value ?>
      </div>
   <?php } ?>