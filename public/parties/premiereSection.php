<!-- forked from: https://codepen.io/cuonoj/pen/JjPmMaB -->

<section class="relative h-screen flex flex-col items-center justify-center text-center text-white">
    <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
        <video class="min-w-full min-h-full absolute object-cover"
            src="/service-traiteur/public/assets/Kin.mp4"
            type="video/mp4" autoplay muted loop></video>
    </div>
    <div class="relative z-10 flex flex-col justify-center items-center h-full text-center">
        <h1 class="text-6xl font-extrabold leading-tight mb-4 drop-shadow-lg">Savourez l'Excellence</h1>
        <p class="text-xl text-gray-200 mb-2">Découvrez notre service traiteur sur-mesure</p>
        <p class="text-xl font-sans text-gray-300 mb-8">Menus gourmets et événements inoubliables, livrés avec passion et soin. <br> Commandez aujourd'hui !</p>
        <a href="#menus" class="bg-yellow-500 text-black hover:bg-yellow-400 py-3 px-8 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
            Explorer Nos Menus
        </a>
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