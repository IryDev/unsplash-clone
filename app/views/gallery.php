<?php

require_once '../config/config.php';

require_once '../controllers/search.controller.php';

session_start();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Belles images et photos gratuites | Unsplash</title>
  <link rel="shortcut icon" href="../../public/Favicon 32x32.ico" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <nav class="top-0 w-full gap-4 p-3 flex justify-between items-center border-b border-[#d1d1d1] z-10">
    <div class="logo">
      <img class="size-8" src="../../public/assets/icons/logo.svg" alt="" />
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
      <img class="size-5" src="../../public/assets/icons/burger.svg" alt="" />
    </div>
  </nav>

  <section id="gallery">
    <div class="py-8 px-12">
      <?php if (!empty($search)): ?>
        <h1 class="text-3xl md:text-4xl font-bold">Résultats de recherche pour "<?= htmlspecialchars($search) ?>"</h1>
      <?php else: ?>
        <h1 class="text-3xl md:text-4xl font-bold">Unsplash</h1>
      <?php endif; ?>
      <p class="text-lg hidden md:block mt-2">
        La source de visuels sur Internet. <br />
        Alimentée par des créateurs et créatrices du monde entier.
      </p>
      <div class="relative w-full grow mt-4 hidden md:block">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="y_Um7 SWMue K6TWt" width="24" height="24" fill="#767676" viewBox="0 0 24 24" version="1.1"
            aria-hidden="false" style="flex-shrink: 0">
            <desc lang="en-US">A magnifying glass</desc>
            <path
              d="M16.5 15c.9-1.2 1.5-2.8 1.5-4.5C18 6.4 14.6 3 10.5 3S3 6.4 3 10.5 6.4 18 10.5 18c1.7 0 3.2-.5 4.5-1.5l4.6 4.5 1.4-1.5-4.5-4.5zm-6 1c-3 0-5.5-2.5-5.5-5.5S7.5 5 10.5 5 16 7.5 16 10.5 13.5 16 10.5 16z">
            </path>
          </svg>
        </div>
        <input type="text" id="voice-search"
          class="bg-[#eee] hover:bg-[#dedede] md:placeholder-[#767676] transition outline-none focus:border border text-gray-900 text-sm rounded-xl border-transparent focus:border-[#eee] focus:bg-white block w-full ps-10 p-2.5 py-4"
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
    </div>

    <?php if (!empty($images)): ?>
      <div class="gallery-images grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:px-12">
        <?php foreach ($images as $image): ?>
          <div class="card relative">
            <img src="data:image/jpeg;base64,<?= $image['image_data'] ?>" alt="<?= htmlspecialchars($image['title']) ?>"
              class="w-full h-80 object-cover" />

            <?php if ($role === 'admin'): ?>
              <div class="absolute top-0 right-0 p-2 bg-black bg-opacity-50 text-white">
                <a href="../controllers/delete-image.controller.php?id=<?= $image['id'] ?>" class="text-white">Supprimer</a>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p>Aucune image trouvée pour "<?= htmlspecialchars($search) ?>"</p>
    <?php endif; ?>
  </section>
</body>

</html>