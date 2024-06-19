<?php
session_start(); 
require "database.php";

$statement = $pdo -> prepare('SELECT * FROM livre');
$statement ->execute();
$livres = $statement ->fetchAll(PDO::FETCH_ASSOC);


?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Liste des livre</title>
</head>
<body>
    <header class=" bg-gray-200 container mx-auto flex items-center justify-between h-24">
        <h1 class=" font-bold text-4xl m-5 text-red-500">Liste des livres</h1> 
        <a href="deconnecter.php" class="inline-flex items-center px-7 py-2.5 m-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-green-200 dark:focus:ring-green-900 hover:bg-green-800">Se déconnecter</a>
           
    </header>
    <!-- component -->
    <h2 class="heading text-center text-4xl m-5 text-red-500">Bienvenue, <?php echo $_SESSION['nom']; ?>!</h2>
   
    <a href="ajouter.php" class="inline-flex items-center px-7 py-2.5 m-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-green-200 dark:focus:ring-green-900 hover:bg-green-800">Ajouter</a>
<table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">titre</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">auteur</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ANNE DE PUBLICATION</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Action</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
            <?php foreach ($livres as $livre) :?>
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $livre['titre'] ;?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $livre['auteur'] ;?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?php echo $livre['AnnePublication'] ;?></td>
                    
                    <td class=" p-2 md:border md:border-grey-500 flex justify-center gap-5">
                    
                        <a href="modifier.php?id= "><button type="submit" name="modifier" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Modifier</button></a>
                        <a href="supprimer.php?id= <?php echo $livre['id']; ?>"><button type="submit" name="supprimer" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded" id="supprimer" onclick="confirmSuppression(event)"> Supprimer</button></a>

                        
                    </td>
                </tr>	
            <?php endforeach ?>
		</tbody>
	</table>
    <script>
        
        function confirmSuppression(event) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer ce client ?')) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>