<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="">
    <title>Bencke</title>
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="shortcut icon" href="assets/img/bencke_logo.png">

    <style>
        .cash 
        {
            position: absolute;
            right: 170px;
            text-decoration: none;
            background: black;
            font-size: 1.3em;
            padding: 15px 10px;
            transition: 0.3s;
            transition-delay: 0.1s;
        }
        .cash::before
        {
            content: 'Zur Kasse';
            position: absolute;
            inset: 4px;
            background: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.3s;
        }
        .cash:hover
        {
            background: grey;
        }
        .cash:hover::before
        {
            background: grey;
        }
        .cash-card 
        {
            margin: 100px;
            background: transparent;
            padding: 20px;
            border: 1px solid black;
            border-left: none;
            border-right: none;
            display: flex;
            justify-content: space-between;
        }
        .cash-card p,
        .cash-card b
        {
            font-size: 1.2em;
        }
        .recome 
        {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50vh;
        }
        .recome a 
        {
            text-decoration: none;
            padding: 40px;
            color: black;
            font-size: 2em;
            background: #a87e4a;
        }
        .buy
        {
            text-decoration: none;
            background: black;
            padding: 15px 40px;
            position: absolute;
            transition: 0.3s;
            transition-delay: 0.1s;
            right: 250px;
            font-size: 1.4em;
        }
        .buy::before
        {
            content: 'Kaufen';
            position: absolute;
            inset: 4px;
            background: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.3s;
        }
        .buy:hover
        {
            background: grey;
        }
        .buy:hover::before
        {
            background: grey;
        }
        .abbruch
        {
            text-decoration: none;
            background: grey;
            padding: 15px 40px;
            position: absolute;
            transition: 0.3s;
            transition-delay: 0.1s;
            left: 250px;
            font-size: 1.4em;
        }
        .abbruch::before
        {
            content: 'Abbrechen';
            position: absolute;
            inset: 4px;
            background: grey;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.3s;
        }
        .abbruch:hover
        {
            background: black;
        }
        .abbruch:hover::before
        {
            background: black;
        }
    </style>


</head>
<body onload="weiter()">

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

        if(file_exists("warenkorb.txt")){
            $text = file_get_contents("warenkorb.txt", true);
            $products = json_decode($text, true);
        }

        if(isset($_POST["name"])){
            echo "Produkt <b>".$_POST['name']."</b> wurde hinzugefügt!";

            $newProduct = [
                "name" => $_POST["name"]
            ];
            array_push($products, $newProduct);
            file_put_contents("warenkorb.txt", json_encode($products, JSON_PRETTY_PRINT));
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
        if($_GET["page"] == "cash"){
            $headline = "Kasse.";
        }
        if($_GET["page"] == "bought"){
            $headline = "Vielen Dank für ihren Kauf!";
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
                            <p class='preis'>Preis: 30€</p>
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

            file_put_contents("warenkorb.txt", json_encode($products, JSON_PRETTY_PRINT));
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
            echo "<a class='cash' href='index.php?page=cash'>Weiter zur Kasse</a>";

        }else if($_GET["page"] == "delete"){
            echo "Das Produkt wurde erfolgreich entfernt";
            
            $index = $_GET["delete"];

            unset($products[$index]);

            file_put_contents("warenkorb.txt", json_encode($products, JSON_PRETTY_PRINT));
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
        }else if($_GET["page"] == "cash"){
            
            foreach($products as $index=>$row){
                $name = $row["name"];

                echo "
                        <div class='cash-card'>
                            <p>Produkt:</p><b>$name</b>
                            <p>Preis:</p><b>Verhandelbar</b>
                        </div>
                    ";
                
            }
            echo "<a class='abbruch' href='index.php?page=shopcart'>Abbrechen</a>";
            echo "<a class='buy' href='index.php?page=bought'>Kaufen</a>";
        }else if($_GET["page"] == "bought"){
            echo "
            <div class='recome'>
                <a href='index.php?page=start'>Zurück zur Startseite</a>
            </div>
            ";
        }

    ?>
    </div>

    <script src="assets/javascript/script.js"></script>

    
    <script src="https://kit.fontawesome.com/350675982b.js" crossorigin="anonymous"></script>
    
</body>
</html>