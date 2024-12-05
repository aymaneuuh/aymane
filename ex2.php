<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2 PHP</title>
</head>
<body>
    <h1><u>Exercice 2 PHP</u></h1>

    <?php
    $employees = [
        ["nom" => "aymane", "poste" => "Développeur", "salaire" => 20000],
        ["nom" => "amine", "poste" => "Designer", "salaire" => 9700],
        ["nom" => "ilyas", "poste" => "Manager", "salaire" => 15000],
        ["nom" => "ahmed", "poste" => "Docteur", "salaire" => 14000],
        ["nom" => "Mohamed", "poste" => "enseignant", "salaire" => 10000],
    ];

    function calculerSalaireMoyen($employes) {
        $total = array_sum(array_column($employes, "salaire"));
        return $total / count($employes);
    }

    echo "<h2>1. Salaire moyen des employés</h2>";
    echo "Salaire moyen : " . calculerSalaireMoyen($employees) . " MAD<br><br>";

    if (isset($_POST['rechercher'])) {
        $nomRecherche = $_POST['nom'];
    
        $resultat = array_filter($employees, function($e) use ($nomRecherche) {
            return stripos($e["nom"], $nomRecherche) !== false; 
        });
    
        echo "<h2>2. Résultat de recherche</h2>";
    
        
        if (!empty($resultat)) {
            foreach ($resultat as $employee) {
                echo "Nom: " . htmlspecialchars($employee["nom"]) . "<br>";
                echo "Poste: " . htmlspecialchars($employee["poste"]) . "<br>";
                echo "Salaire: " . htmlspecialchars($employee["salaire"]) . "<br><br>";
            }
        } else {
            echo "Aucun employé trouvé pour le nom : " . htmlspecialchars($nomRecherche) . "<br>";
        }
    }
    

    
    ?>

    <form method="post">
    <h2>2. Résultat de recherche</h2>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <button type="submit" name="rechercher">Rechercher</button>
    </form>

    <?php
    
    $utilisateurs = [
        ["email" => "aymane@gmail.com", "mot_de_passe" => "abc123"],
        ["email" => "ilyas@gmail.com", "mot_de_passe" => "ilyas2004"],
        ["email" => "wajih@gmail.com", "mot_de_passe" => "aujiss"],
    ];

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['mot_de_passe'];
        $found = false;

        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur['email'] === $email && $utilisateur['mot_de_passe'] === $password) {
                $found = true;
                break;
            }
        }

        echo "<h2>3. Résultat du formulaire de connexion</h2>";
        echo $found ? "Connexion réussie !" : "Échec de la connexion.";
    }
    ?>

    <form method="post">
        <h2>3. Formulaire de connexion</h2>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        <br>
        <button type="submit" name="login">Se connecter</button>
    </form>

    <?php
    $panier = [
        ["nom" => "Telephone", "quantite" => 2, "prix" => 8000],
        ["nom" => "AirPods", "quantite" => 1, "prix" => 200],
        ["nom" => "TV", "quantite" => 3, "prix" => 9000],
    ];

    $totalPanier = array_reduce($panier, function ($total, $produit) {
        return $total + ($produit["quantite"] * $produit["prix"]);
    }, 0);

    echo "<h2>4. Total du panier</h2>";
    echo "Total : $totalPanier MAD<br><br>";

    $commentaires = [];
    if (isset($_POST['commenter'])) {
        $commentaires[] = ["texte" => $_POST['commentaire'], "timestamp" => date('Y-m-d H:i:s')];
        echo "<h2>5. Commentaires soumis</h2>";
        foreach ($commentaires as $commentaire) {
            echo "<p>{$commentaire['texte']} - {$commentaire['timestamp']}</p>";
        }
    }
    ?>

    <form method="post">
        <h2>ex5</h2>
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" required></textarea>
        <br>
        <button type="submit" name="commenter">Soumettre</button>
    </form>


    <?php
    
    $villes = [
        ["ville" => "Casablanca", "temperature" => 25],
        ["ville" => "Marrakech", "temperature" => 38],
        ["ville" => "Rabat", "temperature" => 22],
    ];

    $villeMaxTemp = array_reduce($villes, function ($max, $ville) {
        return ($max["temperature"] ?? 0) > $ville["temperature"] ? $max : $ville;
    }, []);

    echo "<h2>6. Ville la plus chaude</h2>";
    echo "Ville : {$villeMaxTemp['ville']}, Température : {$villeMaxTemp['temperature']}°C<br><br>";
    ?>


<?php
    echo "<h2>7. Lecture des produits depuis CSV</h2>";
    $csvProduits = [
        ["nom" => "AirPods", "prix" => 200, "quantite" => 2],
        ["nom" => "TV", "prix" => 9000, "quantite" => 3],
        ["nom" => "Telephone", "prix" => 8000, "quantite" => 1],
    ];
    echo "<table border='1'><tr><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
    foreach ($csvProduits as $produit) {
        echo "<tr><td>{$produit['nom']}</td><td>{$produit['prix']}</td><td>{$produit['quantite']}</td></tr>";
    }
    echo "</table>";
    ?>


<?php

$produits = [
    ["nom" => "Telephone", "prix" => 8000],
    ["nom" => "AirPods", "prix" => 200],
    ["nom" => "TV", "prix" => 9000],
];

if (isset($_POST['produits_selectionnes'])) {
    $produitsSelectionnes = $_POST['produits_selectionnes'];
    $prixTotal = 0;

    echo "<h2>8. Produits sélectionnés</h2>";
    echo "<ul>";
    foreach ($produitsSelectionnes as $id) {
        $produit = $produits[$id];
        $prixTotal += $produit['prix'];
        echo "<li>{$produit['nom']} - {$produit['prix']} MAD</li>";
    }
    echo "</ul>";
    echo "Prix total : $prixTotal MAD<br>";
}
?>

<form method="post">
<h2>EX9</h2>
    <?php foreach ($produits as $index => $produit) : ?>
        <label>
            <input type="checkbox" name="produits_selectionnes[]" value="<?= $index ?>">
            <?= $produit['nom'] ?> - <?= $produit['prix'] ?> MAD
        </label><br>
    <?php endforeach; ?>
    <button type="submit">Afficher le total</button>
</form>

    <?php
    echo "<h2>9. Moyennes des étudiants</h2>";
    $etudiants = [
        ["nom" => "Mohamed", "notes" => [15, 17, 16]],
        ["nom" => "Sara", "notes" => [18, 19, 20]],
    ];
    foreach ($etudiants as $etudiant) {
        $moyenne = array_sum($etudiant['notes']) / count($etudiant['notes']);
        echo "Étudiant : {$etudiant['nom']},  Sa moyenne est: $moyenne<br>";
    }
?>