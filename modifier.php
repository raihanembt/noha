<?php
require 'database.php'; 
if(isset($_GET["id"])){
    
    $id = $_GET["id"];
    $statement = $pdo -> prepare('SELECT * FROM livre WHERE id = :id');
    $statement -> execute([
        'id' =>  $id
    ]);
    $livre = $statement ->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <div class="heading text-center font-bold text-3xl m-5 text-yellow-500">Modifier un livre</div>
    <div class="heading text-center text-l m-5 text-black-400">Veuillez remplir tous les champs</div>

    <style>
        body {background:white !important;}
    </style>

    <form action="traitementModifier.php" method="POST">
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input type="hidden" name="id" value="<?php echo $livre ['id']; ?>">

            <div>
                <label  class="mb-2 block text-base font-medium text-[#07074D]"> titre </label>
                <input type="text" name="titre" id="titre" value="<?php echo $livre ['titre']; ?>" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label  class="mb-2 block text-base font-medium text-[#07074D]"> auteur </label>
                <input type="text" name="auteur" id="auteur" value="<?php echo $livre['auteur']; ?>" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div>
                <label  class="mb-2 block text-base font-medium text-[#07074D]"> anne de pulication </label>
                <input type="number" name="AnnePublication" id="AnnePublication" value="<?php echo $livre ['AnnePublication']; ?>" class="w-full bg-gray-100 p-2 mb-4 rounded-md border border-[#e0e0e0] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="buttons flex">
                <input class="btn border border-yellow-500 p-1 px-4 font-semibold cursor-pointer text-gray-100 ml-2 bg-yellow-500 hover:bg-yellow-600" type="submit" value="Save">
            </div>
        </div>
    </form>
</body>
</html>