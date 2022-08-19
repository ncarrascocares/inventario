<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?vista=home">
      <img src="./img/descarga.png" width="45" height="35">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
<!--Usuarios-->
  <div id="navbarBasicExample" class="navbar-menu">
       <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">Usuarios </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?vista=user_new">Nuevo</a>
          <a class="navbar-item" href="index.php?vista=user_list">Lista</a>
          <a class="navbar-item" href="index.php?vista=user_search">Buscar</a>
        </div>
      </div>
<!--Sucursales-->
       <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">Sucursal</a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?vista=sucursal_new">Nueva Sucursal</a>
          <a class="navbar-item" href="index.php?vista=sucursal_list">Listar sucursales</a>
          <!-- <a class="navbar-item">Buscar</a> -->
        </div>
      </div>
    <!--Inventario-->
       <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">Inventario</a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?vista=articulo_new">Nuevo</a>
          <a class="navbar-item" href="index.php?vista=articulo_list">Listar inventario</a>
          <!-- <a class="navbar-item">Categorias</a> -->
          <a class="navbar-item" href="index.php?vista=inventario_search">Buscar</a>
        </div>
      </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary is-rounded">
            Mi cuenta
          </a>
          <a href="index.php?vista=logout" class="button is-link is-rounded">
            Salir
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>