<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="">
    <title>Bencke</title>
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="shortcut icon" href="assets/img/bencke_logo.png">


</head>
<body>

    <header>
        <div class="menu">
            <a href="index.php?page=start">Start</a>
            <a href="index.php?page=product">Produkte</a>
            <a href="index.php?page=question">Anfragen</a>
            <a href="index.php?page=speaker">Ansprechpartner</a>
        </div>
        <div class="shopcart">
            <a href="index.php?page=shopcart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </header>

    <div class="content">
    <?php

        $headline = "Herzlich Willkommen";
        $products = [];

        if(file_exists("products.txt")){
            $text = file_get_contents("products.txt", true);
            $products = json_decode($text, true);
        }

        if(isset($_POST["name"])){
            echo "Produkt <b>".$_POST['name']."</b> wurde hinzugefügt!";

            $newProduct = [
                "name" => $_POST["name"]
            ];
            array_push($products, $newProduct);
            file_put_contents("products.txt", json_encode($products, JSON_PRETTY_PRINT));
        }

        if($_GET["page"] == "product"){
            $headline = "Produkte";
        }
        if($_GET["page"] == "question"){
            $headline = "Anfragen";
        }
        if($_GET["page"] == "shopcart"){
            $headline = "Warenkorb";
        }
        if($_GET["page"] == "delete"){
            $headline = "Entfernt!!!";
        }
        if($_GET["page"] == "speaker"){
            $headline = "Ansprechpartner";
        }

        echo "<h1>$headline</h1>";

        if($_GET["page"] == "start"){
            echo "<p>Herzlich willkomme auf der Startseite von Bencke!</p>";
        }else if($_GET["page"] == "product"){
            echo "<p>Auf dieser Seite sind die Produkte!</p>
                <div class='container'>
                    
                    <div class='box'>
                        <img src='assets/img/schale.JPEG' alt='Holzschale'>
                        <div class='info'>
                            <h1>Holzschale</h1>
                            <p>Eine tolle Holzschale die aus reiner manpower gemacht wurde!</p>
                            <form action='?page=shopcart' method='POST'>
                                <button type='submit' name='name' value='Holzschale'>In den Warenkorb</button>
                            </form>
                        </div>
                    </div>

                    <div class='box'>
                        <img src='assets/img/honig.JPEG' alt='Honiglöffel'>
                        <div class='info'>
                            <h1>Honiglöffel</h1>
                            <p>Ein toller Honiglöffel der aus reiner manpower gemacht wurde!</p>
                            <form action='?page=shopcart' method='POST'>
                                <button type='submit' name='name' value='Honiglöffel'>In den Warenkorb</button>
                            </form>
                        </div>
                    </div>

                    <div class='box'>
                        <img src='assets/img/stift.JPEG' alt='Holzstift'>
                        <div class='info'>
                            <h1>Holzstift</h1>
                            <p>Ein toller Holzstift der aus reiner manpower gemacht wurde!</p>
                            <form action='?page=shopcart' method='POST'>
                                <button type='submit' name='name' value='Holzstift'>In den Warenkorb</button>
                            </form>
                        </div>
                    </div>

                    <div class='box'>
                        <img src='assets/img/kerzenständer_2.JPEG' alt='Kerzenständer'>
                        <div class='info'>
                            <h1>Kerzenständer</h1>
                            <p>Ein toller Kerzenständer der aus reiner manpower gemacht wurde!</p>
                            <form action='?page=shopcart' method='POST'>
                                <button type='submit' name='name' value='Kerzenständer'>In den Warenkorb</button>
                            </form>
                        </div>
                    </div>
                </div>
            ";
        }else if($_GET["page"] == "question"){
            echo "<p>Hier kannst du Produkte anfragen die nicht im Shop sind!</p>
                    <div class='question'>
                        <form action='?page=shopcart' method='POST'>
                            <input name='name' placeholder='Produktname'><br>
                            <button type='submit'>Fertig</button>
                        </form>
                    </div>  
            ";
        }
        if($_GET['page'] == "delete"){
            echo "<p>Dein Kontakt wurde gelöscht</p>";
            $index = $_GET["delete"];

            unset($products[$index]);

            file_put_contents("products.txt", json_encode($products, JSON_PRETTY_PRINT));
        }
        else if($_GET["page"] == "shopcart"){
            echo "<p>Hier ist dein Warenkorb</p>";

            foreach($products as $index=>$row){
                $name = $row["name"];

                echo "
                        <div class='card'>
                            <img src='assets/img/mountain.png'>
                            <b>$name</b>

                            <a class='delete' href='?page=delete&delete=$index'>Löschen</a>

                        </div>
                ";
            }
        }else if($_GET["page"] == "delete"){
            echo "Das Produkt wurde erfolgreich entfernt";
            
            $index = $_GET["delete"];

            unset($products[$index]);

            file_put_contents("products.txt", json_encode($products, JSON_PRETTY_PRINT));
        }else if($_GET["page"] == "speaker"){
            echo "<p>Hier ist der Ansprechpartner für ihre Fragen</p>
                    <div class='speaker'>
                        <img src='assets/img/cooler_Ben.JPG'>
                        <p>Ben J. Mohncke</p>
                        <a href='tel:015731107874'>Anrufen</a>
                        <a href='mailto:benmohncke@gmail.com'>Mailen</a>
                    </div>
                    <div class='speaker'>
                        <img src='assets/img/cooler_Jim.jpg'>
                        <p>Jim S. Mohncke</p>
                        <a href='tel:4915753082835'>Anrufen</a>
                        <a href='mailto:jim.mohncke@gmail.com'>Mailen</a>
                    </div>
            ";
        }

    ?>
    </div>

    
    <script src="https://kit.fontawesome.com/350675982b.js" crossorigin="anonymous"></script>
    
</body>
</html>