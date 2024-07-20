<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="ajax/site.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
      body{
        background-color: #1d2830;
      }

      h3{
        color: white;
        margin-top: 3rem;
      }
    </style>
  </head>
  <body>
    <section class="main">
      <div class="container">
        <div class="text-center wrapper">
        
          <?php
          define('HOST', 'localhost');
          define('DB_NAME', 'quickbetrecharge');
          define('USER', 'root');
          define('PASS', '');

          try{
            $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            echo $e->getMessage();
          }

          if (isset($_POST['envoyer'])) {
            $chambre = $_POST['chambre'];
            $type_chambre = $_POST['type_chambre'];
            $zone1 = $_POST['zone1'];
            $prix = $_POST['prix'];
            $date = $_POST['date'];
            $numero = $_POST['numero'];

            $preparer = $db->prepare("INSERT INTO arbre(chambre, type_chambre, zone1, prix, date, numero) VALUES (:chambre, :type_chambre, :zone1, :prix, :date, :numero)");
            $preparer->bindParam(':chambre', $chambre);
            $preparer->bindParam(':type_chambre', $type_chambre);
            $preparer->bindParam(':zone1', $zone1);
            $preparer->bindParam(':prix', $prix);
            $preparer->bindParam(':date',$date);
            $preparer->bindParam(':numero', $numero);
            
            if ($preparer->execute()) {

              echo "<h3>Votre demande a été bien envoyée, nous vous promettons une suite très favorable.</h3>";
              
            } else {
              echo "Echec";
            }

          }

          ?>
        </div>  
  
      </section>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
