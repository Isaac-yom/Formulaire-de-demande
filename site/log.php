<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire de demande</title>
    <meta name="description" content=".....................">
    <link rel="stylesheet" href="ajax/site.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
      body{
        background-color: blue;
        margin-top:2rem;
      }
    </style>

  </head>

  <body>
    <section class="main">
      <div class="container">
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


        if(isset($_POST['envoyer'])){
          $chambre = $_POST['chambre'];
          $type_chambre = $_POST['type_chambre'];
          $zone1 = $_POST['zone1'];
          $prix = $_POST['prix'];
          $date = $_POST['date'];
          $numero = $_POST['numero'];


          $preparer = $db->prepare("INSERT INTO arbre(chambre, type_chambre, zone1, prix,date, numero) VALUES (:chambre, :type_chambre, :zone1, :prix, :date, :numero)");
          $preparer->bindParam(':chambre', $chambre);
          $preparer->bindParam(':type_chambre', $type_chambre);
          $preparer->bindParam(':zone1', $zone1);
          $preparer->bindParam(':prix', $prix);
          $preparer->bindParam(':date',$date);
          $preparer->bindParam(':numero', $numero);

          if ($preparer->execute()) {
            header("Location:sit.php?msg=Votre demande a été bien envoyée, nous vous promettons une suite très favorable.");
              
          } 
          else {
            echo "Echec";
          }

        }
        ?>
        <div class="row justify-content-center">
          <div class="col-lg-7 col-md-12">
            <div class="text-center text">
              <img src="image/WhatsApp_Image_2024-07-05_at_13.57.07-removebg-preview.png" height="100px" class="mt-5 justify-content-center">
              <div  class="d-flex wrapper  justify-content-center">
                <h7  class="text-white ms-5 mt-5">RB/ABC/24A107060</h7>
                <h7  class="px-5 text-white mt-5">IFU:0202483611655</h7>
              </div>
              <h3 class="text-white mt-5 justify-content-center p-2">Welcome! Une équipe de jeunes <strong>professionnels</strong>, <strong>dynamiques</strong>, <strong>honnêtes</strong> et <strong>fiables</strong> est à votre service en <strong>Immobilier</strong> et en <strong>Commerce Géneral</strong>.</h3>
              <div class="image mt-3 justify-content-center">
                <img src="image/IMG-20240611-WA0001.jpg" height="270px" width="360px">
              </div>  

            </div>  
          </div>

          <div class="col-lg-5 col-md-10 col-sm-12">
            <h4 class="row justify-content-center text-white">Formulaire de demande de chambre</h4>

            <div class="form-box  px-5 py-4  p-5">

              <form action="loge.php"  method="POST">
                <p class="text-center text-white mb-4">Remplissez les champs</p>

                <label class="for">Choisissez la chambre.</label>
                <select id="chambre" class="form-select mb-3" name="chambre">
                  <option value="chambre"></option>
                  <option value="sanitaire"> Sanitaire</option>
                  <option value="semi-sanitaire"> Semi-sanitaire</option>
                  <option value="ordinaire"> Ordinaire</option>
                  <option value="meublée"> Meublée</option>
                </select>


                <label class="for">Choisissez le type de chambre.</label>
                <select id="type_chambre" class="form-select mb-3" name="type_chambre">
                  <option value="type_chambre"></option>
                  <option value="entrée couchée"> Entrée couchée</option>
                  <option value="1chambre 1 salon"> 1 Chambre 1 Salon</option>
                  <option value="2 chambres 1 salon"> 2 Chambres 1 Salon</option>
                  <option value="3 chambres 1 salon"> 3 Chambres 1 Salon</option>
                  <option value="4 chambres 1 salon"> 4 Chambres 1 Salon</option>
                  <option value="5 chambre 1 salon"> 5 Chambres 1 Salon</option>
                  <option value="6 chambres 1 salon"> 6 Chambres 1 Salon</option>
                  <option value="plus de 6 chambres"> plus de 6 Chambres ?</option>
                </select>
                <label class="for">Indiquez la zone</label>
                <input  class="form-control mb-3" type="text" name="zone1" placeholder="" required>

                <label class="for">Quel est votre budjet ?</label>
                <input  class="form-control mb-3" type="number" id="quantity" min="10000" name="prix" placeholder="" required>


                <label class="for">Pour quelle date au plus tard ?</label>
                <input class="form-control mb-3" type="date" id="date" min="Date du jour" name="date" placeholder="" required>

                <label class="for">Votre numero WhatsApp.</label>
                <input  class="form-control mb-4" type="tel" name="numero" required>

                <button  name="envoyer" class=" mt-1">Envoyer</button>
              </form>

              <div class="wrapper">
                <h6  class="mt-5 text-white">Besoin d'assistance ?<br>Cliquez ici <strong><a href="https://api.whatsapp.com/send/?phone=%2B22961524582&text=Bonjour+monsieur%0AJ%27esp%C3%A8re+que+vous+allez+tr%C3%A8s+bien">+229 61 52 45 82</a></strong></h6>
              </div>  

            </div>  
          </div>  
          

      
          <div class="text-center">
            <h5 style="color: #fff"  class="mt-5 p-4">Merci d'avoir choisi <strong>Yom Service !</strong></h5>
          </div>
        </div>    
      </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
