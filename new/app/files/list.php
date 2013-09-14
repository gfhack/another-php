<?php 
	if(!isset($files))
		redirect_to('/files');
?>
<?php require('_header.php'); ?>

<div class="span10">

	<section>
      <header class='page-header'>
         <h1>Lista de Arquivos</h1>
      </header>
   </section>

	<div class='span5'>
      <form id="files-search-form" class='form-search' action='search' method='GET'>
         <div class="input-prepend input-append">
            <a class="btn btn-inverse" href="new">Criar novo arquivo</a>
            <input type='text' name='search' value='<?= @$_GET['search']?>' class='span3  '>
            <button type='submit' class='btn'>Procurar</button>
         </div>
      </form>

   
      <span>Buscas recentes:</span>
      <ul class='breadcrumb'>
         <?php foreach($recent_searchs->getRecents() as $recent){ ?>
         <li>
            <span class="divider"></span>
            <a href="search?search=<?= $recent; ?>"><?= $recent; ?></a>
            <span class="divider"></span>
         </li>
         <?php } ?>
      </ul>
   </div>

	<table class='table table-bordered table-striped'>
   	<thead>
      	<tr>
	 			<th>Arquivo</th>
	 			<th>Conteúdo</th>
	 			<th>Opções</th>
      	</tr>
   	</thead>
   	<tbody>
      	<?php foreach($files as $file) {?>
      	<tr>
	 			<td><?= $file['name']; ?></td>
	 			<td><?= $file['content']; ?></td>
	 			<td>
	    			<a href="_edit?id=<?= $file['name'] ?>" class="btn btn-info">Editar</a>
	    			<a href="_delete?id=<?= $file['name'] ?>" class="btn btn-danger" data-confirm="Deseja excluir o arquivo?" >Excluir</a>
	 			</td>
      	</tr>
      	<?php } ?>
   	</tbody>
	</table>

</div>

<?php require('_footer.php'); ?>