<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./assets/css/templateAdmin.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>

<div class="sidenav">
  <!-- <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>  -->
  <div class="text-center"> 
      <i class="fas fa-car fa-3x text-white"></i>      
      <a href=""><i class="fas fa-sign-out-alt"></i>Deconexion</a>
</div>
  <button class="dropdown-btn">Categorie 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Ajout</a>
    <a href="index.php?action=list_cat">Liste</a>
    
  </div>

  <button class="dropdown-btn">Voiture
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Ajout</a>
    <a href="#">Liste</a>
</div>

<button class="dropdown-btn">Grade 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Ajout</a>
    <a href="#">Liste</a>
  </div>

<button class="dropdown-btn"> <i class="fas fa-users"></i> Utilisateurs    
    <i class="fa fa-caret-down"></i>
</button>
<div class="dropdown-container">
    <a href="#">Ajout</a>
    <a href="#">Liste</a>
    <a href="#">Inscription</a>
    <a href="#">Connexion</a>
</div>


<!-- <a href="#contact">Search</a> -->
</div>

<div class="main ">
  <h1 class="bg-secondary text-center text-white">Administration</h1>
  <?= $contenu; ?>
</div>

<script src="./assets/js/templateAdmin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</body>
</html> 