<div class="sidebar"><b>
  <a href="dashboard.php" <?php if($active=='dashboard') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-dashboard"></span>&nbsp&nbspPagina Principal
  </a>
  <a href="add_donor.php" <?php if($active=='add') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-pencil"></span>&nbsp&nbspAgregar Donante
  </a>
  <a href="donor_list.php" <?php if($active=='list') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbspLista de Donantes
  </a>
  <a href="query.php" <?php if($active=='query') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-check"></span>&nbsp&nbspConsulta de Usuario
  </a>
  <a href="pages.php" <?php if($active=='pages') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-edit"></span>&nbsp&nbspGestionar Páginas
  </a>
  <a href="update_contact.php" <?php if($active=='contact') echo "class='act'"; ?>>
    <span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEditar Contacto
  </a>
</div>