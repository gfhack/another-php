<?php
   $file_search = new FileSearch(APP_ROOT . 'app/files/txt');
   $recent_searchs = new RecentSearchs('search');

	if (!$_GET['search'] == '') {
      $files = array();

      $_GET['search'] = trim($_GET['search']);
      $files = $file_search->find($_GET['search']);
      $recent_searchs->add($_GET['search']);
   } else {
      $files = $file_search->findAll();
      flash('warning', 'Não foi encontrado!');
   }
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