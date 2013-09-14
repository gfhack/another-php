<?php 
 if (!isset($file)){
    $file = new File();
 }
?>
   <div class="span10">

      <section>
         <header class='page-header'>
            <h1>Formulário de Arquivos</h1>
         </header>
      </section> 
      <form id='file' action='<?= $sendTo ?>' method='POST' class='form-vertical' novalidate>
   
         <div class="control-group <?= isset($file->errors()['name']) ? 'error' :'' ?> " >
            <label class='control-label' for='file_name'>Nome *</label>
            <div class="controls">
               <?php if (!is_null(@$disabled)) { ?>
                  <input type='hidden' id='file_name' name='file[name]' value="<?= @$files['name'] ?>" />
               <?php } ?>               
               <input type='text' placeholder="Nome do arquivo" id="file_name" name='file[name]' value='<?= @$files['name'] ?>' <?= @$disabled ?> />
               <span class='help-inline'><?= @$file->errors()['name']?></span>
            </div>
         </div>

         <div class="control-group <?= isset($file->errors()['body']) ? 'error' :'' ?>" >
            <label class='control-label' for='file_body'>Texto *</label>
            <div class="controls">
               <textarea id='file_body' name='file[body]' placeholder='Texto do arquivo'><?= @$files['body'] ?></textarea>
               <span class='help-inline'><?= @$file->errors()['body']?></span>
            </div>
         </div>

         <input type='submit' value='Enviar' class='btn btn-primary'/>
      </form>
   </div>
