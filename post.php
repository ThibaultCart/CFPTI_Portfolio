<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Lave vaiselle</title>
  <link rel="stylesheet" href="style.css">
  <link href="cssbootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
  
</head>
<body>
 <ul class="nav justify-content-center">
  <li class="nav-item">
      <a class="nav-link active" href="index.php">Liste</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="ajout.php">Ajout</a>
  </li>
  
</ul>
    </ul>
   
    

    
  <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Prenom</th>
      <th scope="col">Remarque</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
      <?php

$value=afficher();
$toto=  array_reverse($value);
foreach ($toto as $u) {
    echo ' <tr>
      <td>'.$u["Prenom"].'</td>
      <td>'.$u["Remarque"].'</td>
      <td>'.$u["Date"].'</td>';
}



?>
   
   
  </tbody>
</table>
</body>
</html>