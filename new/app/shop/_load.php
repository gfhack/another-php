<?php require('_products.php'); ?>

<div class="span10">
   <ul class="thumbnails">

  <?php
    foreach($products as $key => $value){ ?> 
      <li class="spname">
        <div class="thumbnail">
          <img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>" class="product">
            <div class="caption">
              <h3><?= $value['name'] ?></h3>
              <p>R$ <?= $value['price'] ?></p>
              <p>
                <form class="form-search" action="_buy" method="POST">
                  <input type="hidden" name="id" value="<?= $key ?>" />
                  <input type="number" min="1" name="amount" class="input-small" value="1" placeholder="Quantidade" />
                  <input type="submit" class="btn btn-primary" value="Comprar!" />
                </form>
                <a class="btn" href="_add?id=<?= $key ?>">Adicionar ao carrinho</a>
              </p>
            </div>
        </div>
      </li>
      <?php } ?>

   </ul>
</div>