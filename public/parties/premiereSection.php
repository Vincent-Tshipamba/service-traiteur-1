<!-- forked from: https://codepen.io/cuonoj/pen/JjPmMaB -->

<section class="relative h-screen flex flex-col items-center justify-center text-center text-white">
    <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
        <video class="min-w-full min-h-full absolute object-cover"
            src="../public/assets/Kin.mp4"
            type="video/mp4" autoplay muted loop></video>
    </div>
    <div class="video-content space-y-2 z-10">
        <h1 class="font-light text-6xl text-blue-700">Savourez l'Excellence</h1>
        <h3 class="font-light text-3xl">Découvrez notre service traiteur d'exception</h3>
        <p class="font-light text-xl mt-4">Menus raffinés, événements inoubliables, livrés avec passion et soin. Commandez dès aujourd'hui !</p>
        <a href="#menus" class="mt-6 bg-white text-black px-4 py-2 rounded-lg">Voir Nos Menus</a>
    </div>
</section>


<style>
    .video-docker video {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .video-docker::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }
</style>