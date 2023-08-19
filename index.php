<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <header>
        <!-- mise en place d'une barre de recherche -->
        <h1>Liste des lieux a Madagascar</h1>
            <nav class="search-bar">
             <input type="text" id="search-input" placeholder="Rechercher l'endroit ici...">
            <button id="search-button">Rechercher</button>
            </nav>
    </header>

    <!-- exportation des donnees csv -->
    <?php
    $csvFile = './assets/data.csv';
    $file = fopen($csvFile, 'r');
    if ($file !== false) {
        $csvData = array();
        
        // Utilisez une variable de contrôle pour sauter la première ligne
        $firstRow = true;
        
        while (($row = fgetcsv($file, 0, ";")) !== false) {
            
            if ($firstRow) {
                $firstRow = false;
                continue;
            }
            
            $csvData[] = $row;
        }
        fclose($file);
    } else {
        echo "Erreur lors de l'ouverture du fichier";
    }
    ?>

    
  

    <div id="cardContainer" class="container">
        <?php
        foreach ($csvData as $row) {
            echo '<div class="card">';
            // insersion d'image
            // echo '<div class="image"><img src="' . $row['image_url'] . '"></div>'; 
            
            $imagePath = './photos/images.jfif'; // image unique  
            echo '<div class="image"><img src="' . $imagePath . '"></div>';
           
            foreach ($row as $value) {
                echo '<div class="content">' . htmlspecialchars($value). '</div>';
            }
            echo '</div>';
        }
        ?>

        <script src="./assets/script.js"></script>
    </div>
</body>
</html>
