<?php 
 if (!isset($contact)){
    $contact = new Contact();
 }
?>
   <div class="span10">

      <section>
         <header class='page-header'>
            <h1>Formulário de Contato</h1>
         </header>
      </section> 
      <form id='new_contact' action='receive' method='POST' class='form-vertical' novalidate>
   
         <div class="control-group <?= isset($contact->errors()['name']) ? 'error' :'' ?> " >
            <label class='control-label' for='contact_name'>Nome *</label>
            <div class="controls">
               <input type='text' id='contact_name' name='contact[name]' placeholder='Seu nome' value='<?= $contact->getName() ?>' />
               <span class='help-inline'><?= @$contact->errors()['name']?></span>
            </div>
         </div>
   
         <div class="control-group <?= isset($contact->errors()['email']) ? 'error' :'' ?>" >
            <label class='control-label' for='contact_email'>Email *</label>
            <div class="controls">
               <input type='text' id='contact_email' name='contact[email]' placeholder='Seu email' value='<?= $contact->getEmail() ?>' />
               <span class='help-inline'><?= @$contact->errors()['email']?></span>
            </div>
         </div>

         <div class="control-group <?= isset($contact->errors()['body']) ? 'error' :'' ?>" >
            <label class='control-label' for='contact_body'>Comentário *</label>
            <div class="controls">
               <textarea id='contact_body' name='contact[body]' placeholder='Digite seu comentário'><?= $contact->getBody() ?></textarea>
               <span class='help-inline'><?= @$contact->errors()['name']?></span>
            </div>
         </div>

         <input type='submit' value='Enviar' class='btn btn-primary'/>
      </form>
   </div>
