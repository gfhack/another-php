<?php
  require('_header.php');
  require('_products.php');

  $cart = split_cart(searchCookie());
  $total = 0;
?>

<div class="span10">
  <header class='page-header'>
      <h1>Carrinho de Compras</h1>
   </header>

   <table class="table table-bordered table-striped">
   <thead>
      <th></th>
      <th>Nome</th>
      <th>Quantidade</th>
      <th>Preço unitário</th>
      <th>Preço Total</th>
   </thead>
   <tbody>
      <?php
        if (!empty($cart)) {
          foreach($cart['product'] as $key => $value){
      ?>
      <tr>
        <td><a href="_remove?id=<?= $value ?>" class="btn btn-small">X</a></td>
        <td><?= $products[$value]['name'] ?></td>
        <td>
          <?php
            echo '<form class="form-search" action="_buy" method="POST">
                    <input type="hidden" name="id" value="' . $value . '" />
                    <input type="number" min="1" name="amount" value="' . $cart['amount'][$key] . '" class="input-small" placeholder="Quantidade" />
                    <input type="submit" class="btn btn-primary" value="Alterar" />
                  </form>';
          ?>
          </td>
        <td><?= @$products[$value]['price'] ?></td>
        <td>
          <?php
            $total += $cart['amount'][$key] * $products[$value]['price'];
            echo @$cart['amount'][$key] * $products[$value]['price'];
          ?>
        </td>
      </tr>
      <?php }} ?>
      <tr>
        <td>Total:</td>
        <td></td>
        <td></td>
        <td>  </td>
        <td><?= $total ?></td>
      </tr>
    </tbody>
 </table>
 <a href="finish" class="btn btn-success">Efetuar compra!</a>
</div>

<?php require('_footer.php'); ?>