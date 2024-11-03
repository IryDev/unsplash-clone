<?php

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['role'])) {
  header("Location: signin.php");
  exit();
}

$firstName = htmlspecialchars($_SESSION['username']);
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $firstName; ?> | Communauté photos Unsplash</title>
  <link rel="shortcut icon" href="../../public/Favicon 32x32.ico" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <nav class="top-0 w-full gap-4 p-3 flex justify-between items-center border-b border-[#d1d1d1] z-10">
    <div class="logo">
      <img class="size-8" src="../../public/assets/icons/logo.svg" alt="Logo" />
    </div>
    <div class="flex items-center justify-between grow gap-4">
      <form action="./gallery.php" class="relative w-full grow">
        <div class="relative w-full grow">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="y_Um7 SWMue K6TWt" width="24" height="24" fill="#767676" viewBox="0 0 24 24" version="1.1"
              aria-hidden="false" style="flex-shrink: 0">
              <desc lang="en-US">A magnifying glass</desc>
              <path
                d="M16.5 15c.9-1.2 1.5-2.8 1.5-4.5C18 6.4 14.6 3 10.5 3S3 6.4 3 10.5 6.4 18 10.5 18c1.7 0 3.2-.5 4.5-1.5l4.6 4.5 1.4-1.5-4.5-4.5zm-6 1c-3 0-5.5-2.5-5.5-5.5S7.5 5 10.5 5 16 7.5 16 10.5 13.5 16 10.5 16z">
              </path>
            </svg>
          </div>
          <input type="text" id="search" name="search"
            class="bg-[#eee] hover:bg-[#dedede] placeholder-[#767676] transition outline-none focus:border border text-gray-900 text-sm rounded-full border-transparent focus:border-[#eee] focus:bg-white block w-full ps-10 p-2.5 py-3"
            placeholder="Recherche d'images" required />
          <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
            <svg class="j6Xqz SWMue K6TWt" width="24" height="24" viewBox="0 0 24 24" version="1.1" aria-hidden="false"
              style="flex-shrink: 0" fill="#767676">
              <desc lang="en-US">Visual search</desc>
              <path
                d="M5 15H3v4c0 1.1.9 2 2 2h4v-2H5v-4ZM5 5h4V3H5c-1.1 0-2 .9-2 2v4h2V5Zm14-2h-4v2h4v4h2V5c0-1.1-.9-2-2-2Zm0 16h-4v2h4c1.1 0 2-.9 2-2v-4h-2v4ZM12 8c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4Zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2Z">
              </path>
            </svg>
          </button>
        </div>
      </form>
      <div class="hidden md:flex items-center grow">
        <a href="./signin.php" class="text-[#767676] px-4 py-2 hover:text-black transition">Connexion</a>
        <a href="./signup.php"
          class="text-[#767676] border-[1px] hover:border-black transition hover:text-black py-1 px-2 rounded-md shadow-sm border-[#d1d1d1]">Rejoignez<span
            class="ml-1">Unsplash</span></a>
      </div>
    </div>
    <div class="burger">
      <img class="size-5" src="../../public/assets/icons/burger.svg" alt="Burger Menu" />
    </div>
  </nav>
  <main class="flex w-full items-center p-4 flex-col">
    <div class="pt-8 md:pt-16 flex flex-col md:flex-row md:w-full md:justify-center">
      <img class="rounded-full size-32 md:size-44 md:mr-8" src="../../public/assets/imgs/avatar.avif" alt="Avatar" />
      <div>
        <h1 class="text-2xl font-bold mt-4 md:text-4xl"><?= $firstName; ?></h1>
        <p class="text-black mt-4">Téléchargez de superbes photos haute qualité sélectionnées par <?= $firstName; ?> .
        </p>
        <div class="flex gap-4 mt-8">
          <a href="./gallery.php"
            class="bg-[#f5f5f5] transition hover:bg-[#e5e5e5] text-[#767676] py-2 px-4 rounded-md shadow-sm">Télécharger
            une photo</a>
          <button
            class="bg-[#f5f5f5] transition hover:bg-[#e5e5e5] text-[#767676] py-2 px-4 rounded-md shadow-sm">Importer
            une photo</button>
          <button class="bg-[#f5f5f5] transition hover:bg-[#e5e5e5] text-[#767676] py-2 px-4 rounded-md shadow-sm">
            <a href="../controllers/signout.controller.php">Déconnexion</a>
          </button>
        </div>
      </div>
    </div>
    <?php if ($role === 'admin'): ?>
      <form class="w-full md:max-w-[600px]" action="../controllers/add-image.controller.php" method="POST"
        enctype="multipart/form-data">
        <div
          class="w-full md:max-w-[600px] md:min-w-[600px] py-4 min-h-[300px] flex-col items-center flex justify-start mt-8 border-[#d1d1d1] border-2 border-dashed">
          <img class="size-32 object-contain cursor-pointer" src="../../public/assets/imgs/upload-image.avif" alt=""
            onclick="triggerFileInput()" />
          <h2 class="text-2xl font-bold">
            Charger une photo
            <span class="shadow-md text-lg py-1 px-2 border-[#e5e5e5] text-[#767676] border rounded-md">JPEG</span>
          </h2>

          <!-- Input caché -->
          <input class="hidden" type="file" accept="image/png, image/gif, image/jpeg, image/avif" name="image_file"
            id="image_file" />

          <input type="hidden" name="token" value="<?php echo $_SESSION['csrf_image_add']; ?>">

          <div class="line3">
            <img class="max-w-[300px]" id="blah" src="#" alt="" />
          </div>
        </div>

        <div class="flex flex-col max-w-[600px] w-full">
          <input type="text" name="title" id="title"
            class="bg-[#f5f5f5] transition hover:bg-[#e5e5e5] text-[#767676] py-2 px-4 rounded-md shadow-sm mt-4"
            placeholder="Titre de l'image" />

          <input type="text" name="description" id="description"
            class="bg-[#f5f5f5] transition hover:bg-[#e5e5e5] text-[#767676] py-2 px-4 rounded-md shadow-sm mt-4"
            placeholder="Description de l'image" />
          <button type="submit"
            class="bg-[#f5f5f5] transition hover:bg-[#e5e5e5] text-[#767676] py-2 px-4 rounded-md shadow-sm mt-4">
            Publier
          </button>
        </div>
      </form>
    <?php endif; ?>
  </main>
  <script>
    const imageFile = document.getElementById("image_file");
    const blah = document.getElementById("blah");
    const line3 = document.querySelector(".line3");

    imageFile.onchange = (evt) => {
      const [file] = imageFile.files;
      if (file) {
        blah.src = URL.createObjectURL(file);
        line3.style.display = "block";
      }
    };

    function triggerFileInput() {
      document.getElementById("image_file").click();
    }
  </script>
</body>

</html>