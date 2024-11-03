<?php

require_once '../middlewares/auth.middleware.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>S’inscrire | Unsplash</title>
  <link rel="stylesheet" href="../../public/css/auth.css" />
  <link rel="shortcut icon" href="../../public/Favicon 32x32.ico" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen">
  <div class="size-full flex flex-col grid grid lg:grid-cols-[0.65fr_1fr]">
    <div class="left flex items-center justify-center flex-col py-8 p-4 lg:p-8">
      <div class="left-content text-white h-full flex flex-col justify-between">
        <a href="../../index.php">
          <img class="size-7" src="../../public/assets/imgs/logo-white.svg" alt="unsplash icon" />
        </a>
        <div>
          <h1 class="text-2xl lg:text-5xl mt-5 font-bold">
            La création commence ici
          </h1>
          <p class="text-lg font-light lg:text-2xl mt-4">
            Accédez à 5 825 610 photos haute résolution gratuites que vous ne
            trouverez nulle part ailleurs.
          </p>
        </div>
        <p class="font-light hidden lg:block">
          Mis en ligne le 3 octobre 2024 par Eric Muhr
        </p>
      </div>
    </div>

    <div class="right">
      <div class="max-w-[600px] m-auto p-4 lg:p-10 h-full">
        <div class="mb-10">
          <h1 class="text-3xl lg:text-5xl text-center font-bold">
            S’inscrire à Unsplash
          </h1>
          <p class="text-black text-center mt-4">
            Vous avez déjà un compte ?
            <a class="text-gray-500 underline" href="./signin.php">Connexion</a>
          </p>
        </div>

        <form action="../controllers/signup.controller.php" method="POST">
          <div class="flex items-center gap-4 w-full">
            <div class="flex flex-col w-full">
              <label for="name">Prénom</label>
              <input class="p-2 hover:border-black border-[1px] rounded-md border-solid border-gray-300" type="text"
                name="first_name" id="first_name" required />
            </div>

            <div class="flex flex-col w-full">
              <label for="last_name">Nom</label>
              <input class="p-2 transition hover:border-black border-[1px] rounded-md border-solid border-gray-300"
                type="text" name="last_name" id="last_name" required />
            </div>
          </div>
          <div class="flex flex-col mt-8">
            <label for="email">E-mail</label>
            <input class="p-2 transition hover:border-black border-[1px] rounded-md border-solid border-gray-300"
              type="email" name="email" id="email" required />
          </div>

          <div class="flex flex-col mt-8">
            <label for="username">Nom d'utilisateur</label>
            <input class="p-2 transition hover:border-black border-[1px] rounded-md border-solid border-gray-300"
              type="text" name="username" id="username" required />
          </div>

          <div class="flex flex-col mt-8">
            <label for="password">Mot de passe</label>
            <input class="p-2 transition hover:border-black border-[1px] rounded-md border-solid border-gray-300"
              type="password" name="password" id="password" required />
          </div>

          <div class="mt-8">
            <button
              class="bg-black hover:bg-zinc-800 transition w-full border-[1px] border-black border-solid font-medium p-2 text-white cursor-pointer rounded-md"
              type="submit">
              S'inscrire
            </button>
          </div>

          <p class="text-sm text-center mt-5 text-gray-500">
            En vous inscrivant, vous reconaissez que ce site web n'est pas
            vraiment Unsplash.
          </p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>