   <div class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-inner">
         <div class="container">
            <div id='logged-info' class='brand'>
               <?php if (isset($_SESSION['user']['name'])) { ?>
                  Olá <?= $_SESSION['user']['name'] ?>
                  <?= link_to('/login/sign_out', 'Logout'); ?>
               <?php } else { ?>
                  <?= link_to('/login/log_in', 'Login'); ?>
               <?php } ?>
            </div>

            <a class="brand" href="/new/">GHack</a>
            <div class="menu-padd">
               <ul class="nav">
                  <li>
                     <a href="/new/shop/">
                        Loja
                     </a>
                  </li>
                  <li>
                     <a href="/new/shop/cart">
                        <i class="icon-shopping-cart icon-white"></i> <?= quantity() ?>
                     </a>
                  </li>
                  <li>
                     <a href="/new/contact/new">
                        Contato
                     </a>
                  </li>
                  <li>
                     <a href="/new/files/">
                        Arquivos
                     </a>
                  </li>
               </ul>
            </div>

         </div>
      </div>
   </div>