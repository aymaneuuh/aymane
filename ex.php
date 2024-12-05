
    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>EX1</h2>
    <?php
    $etudiant = [
        'nom' => 'ayane',
        'prenom' => 'bourass',
        'matricule' => '123456'
    ];
    echo "Nom : " . $etudiant['nom'] . "<br>";
    echo "Prénom : " . $etudiant['prenom'] . "<br>";
    echo "Matricule : " . $etudiant['matricule'];
    ?>


<h2>EX2</h2>
    <?php
    $etudiant['note'] = 15;
    $etudiant['note'] = 18; 
    echo "Nom : " . $etudiant['nom'] . "<br>";
    echo "Note : " . $etudiant['note'];
    ?>

    <h2>EX3</h2>
    <?php
    $produits = [
        'Produit1' => 10,
        'Produit2' => 100,
        'Produit3' => 150
    ];
    foreach ($produits as $nom => $prix) {
        echo "$nom coûte $prix DH<br>";
    }
    ?>

    
    <h2>EX4</h2>
    <?php
    $scores = [
        'Étudiant1' => 16,
        'Étudiant2' => 14,
        'Étudiant3' => 15,
        'Étudiant4' => 19,
        'Étudiant5' => 12
    ];
    $moyenne = array_sum($scores) / count($scores);
    echo "La moyenne des scores est : $moyenne";
    ?>


    <h2>EX5</h2>
    <?php
    $pays = [
        'Maroc' => 40000000,
        'France' => 67000000,
        'Espagne' => 47000000
    ];
    arsort($pays); 
    foreach ($pays as $nom => $population) {
        echo "$nom : $population habitants<br>";
    }
    ?>

    <h2>EX6</h2>
    <form method="POST">
        Nom : <input type="text" name="nom"><br>
        Âge : <input type="text" name="age"><br>
        <button type="submit" name="submit_ex6">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['submit_ex6'])) {
        $nom = $_POST['nom'];
        $age = $_POST['age'];
        echo "Bienvenue, $nom, vous avez $age ans !";
    }
    ?>

<h2>EX7</h2>
    <form method="POST">
        Âge : <input type="text" name="age_validation"><br>
        <button type="submit" name="submit_ex7">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['submit_ex7'])) {
        $age = $_POST['age_validation'];
        if (!is_numeric($age) || $age <= 0) {
            echo "L'âge doit être un entier supérieur à 0.";
        } else {
            echo "Bienvenue, vous avez $age ans !";
        }
    }
    ?>

    <h2>EX8</h2>
    <form method="POST">
        Choisissez une couleur :
        <select name="couleur">
            <option value="rouge">Rouge</option>
            <option value="vert">Vert</option>
            <option value="bleu">Bleu</option>
        </select>
        <button type="submit" name="submit_ex8">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['submit_ex8'])) {
        $couleur = $_POST['couleur'];
        echo "Votre couleur préférée est : $couleur";
    }
    ?>

    <h2>EX8</h2>
    <form method="GET">
        Nombre 1 : <input type="text" name="nombre1"><br>
        Nombre 2 : <input type="text" name="nombre2"><br>
        <button type="submit" name="submit_ex9">Calculer</button>
    </form>
    <?php
    if (isset($_GET['submit_ex9'])) {
        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2'];
        echo "La somme est : " . ($nombre1 + $nombre2);
    }
    ?>

    <h2>EX10</h2>
    <form method="POST">
        Type de compte :
        <select name="type">
            <option value="Administrateur">Administrateur</option>
            <option value="Utilisateur">Utilisateur</option>
        </select>
        <button type="submit" name="submit_ex10">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['submit_ex10'])) {
        $type = $_POST['type'];
        if ($type == 'Administrateur') {
            echo "Bienvenue, administrateur !";
        } else {
            echo "Bienvenue, utilisateur simple !";
        }
    }
    ?>
</body>
</html>