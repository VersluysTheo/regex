<?php $Chiffre = 0 ;
$Couleur = "" ;
    if (empty($_POST['password'])){
        $Password = "";
    } else {
        $Password = $_POST['password'];
    }


    if (preg_match('/[0-9]/', $Password)){
        $Chiffre = $Chiffre + 20;
    }


    if (preg_match('/[A-Z]/', $Password)){
    $Chiffre = $Chiffre + 20;
    } 


    if (preg_match('/[a-z]/', $Password)){
    $Chiffre = $Chiffre + 20;
    } 



    if (preg_match('/[+;.:ù$£_µ?,]/', $Password)){
        $Chiffre = $Chiffre + 20;
    }


    if (strlen($Password) > 12 ){
        $Chiffre = $Chiffre + 20;
    }

if ($Chiffre == 20) {
    $Couleur = "danger";
}

else if ($Chiffre == 40) {
    $Couleur = "warning";
}

else if ($Chiffre == 60) {
    $Couleur = "secondary";
}

else if ($Chiffre == 80) {
    $Couleur = "primary";
}

else if ($Chiffre == 100) {
    $Couleur = "success";
} else {
    $Couleur = "dark";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <title>Regex</title>
</head>
<body>
<div class="container">
        <div class="flex-row justify-content-center">
        <form action="index.php" method="POST">
        <label for="password" class="font-weight-bold"> Mot de Passe (12 Caractères) :</label>
        <input type="text" name="password" id="password">
        </form>
        </div>
<div class="progress"> 
  <div class="progress-bar bg-<?php echo $Couleur ?>" role="progressbar" style="width: <?php echo $Chiffre ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<br>
<div class="container">
    <div class="justfify-content-center text-center">
    <ul class="list-group">
  <?php if ($Chiffre == 100){ echo '<li class="list-group-item">Bravo vous avez un Mot de Passe très puissant ( sauf si t\'as mis que de la D) </li>'; 
} else { echo '<li class="list-group-item">Le mot de passe doit contenir </li>'; } ?>
  <?php if (!preg_match('/[0-9]/', $Password)){ echo '<li class="list-group-item">1 Chiffre</li>'; } ?>
  <?php if (!preg_match('/[A-Z]/', $Password)){ echo '<li class="list-group-item">1 Majuscule</li>'; } ?>
  <?php if (!preg_match('/[a-z]/', $Password)){ echo '<li class="list-group-item">1 Minuscule</li>'; } ?>
  <?php if (!preg_match('/[+;.:ù$£_µ?,]/', $Password)){ echo '<li class="list-group-item">1 Caractère Spécial</li>'; } ?>
  <?php if (strlen($Password) < 12 ){ echo '<li class="list-group-item">12 Caractères</li>'; } ?>
    </ul>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>