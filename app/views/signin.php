<?php

require_once '../middlewares/auth.middleware.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion | Unsplash</title>
  <link rel="shortcut icon" href="../../public/Favicon 32x32.ico" type="image/x-icon" />
  <link rel="stylesheet" href="../../public/css/auth.css" />

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen">
  <main class="max-w-[600px] w-full">
    <div class="content px-16">
      <div class="mb-8">
        <h1 class="text-3xl text-center font-bold mb-2">Connexion</h1>
        <p class="text-md text-center">Bon retour parmi nous.</p>
      </div>

      <div class="facebook">
        <button class="bg-blue-600 py-3 flex items-center justify-center text-white rounded-md w-full font-medium">
          <img class="size-5 mr-4" src="../../public/assets/icons/facebook.svg" alt="" />
          Se connecter avec Facebook
        </button>
      </div>

      <p class="text-center uppercase mt-8 text-sm">ou</p>

      <form action="../controllers/signin.controller.php" method="POST">
        <div class="flex flex-col mt-8">
          <label for="email">E-mail</label>
          <input class="p-2 transition hover:border-black border-[1px] rounded-md border-solid border-gray-300"
            type="email" name="email" id="email" required />
        </div>

        <div class="flex flex-col mt-8">
          <label for="password">Mot de passe</label>
          <input class="p-2 transition hover:border-black border-[1px] rounded-md border-solid border-gray-300"
            type="password" name="password" id="password" required />
        </div>

        <div class="w-full mt-8">
          <button
            class="w-full bg-black hover:bg-zinc-800 transition border-[1px] border-black border-solid font-medium p-2 text-white cursor-pointer rounded-md"
            type="submit">
            Connexion
          </button>
        </div>
      </form>
    </div>

    <div class="signup relative border-[1px] border-solid border-gray-200 p-8 mt-12 text-center">
      <p>
        Vous n’avez pas de compte ?
        <a class="underline text-gray-500" href="./signup.php">S'inscrire</a>
      </p>
    </div>
  </main>
</body>

</html>