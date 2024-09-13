<div>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only"></span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/service-traiteur/public/admin" class="flex ms-2 md:me-24">
                        <span
                            class="self-center font-semibold text-xl md:text-3xl whitespace-nowrap dark:text-white">
                            Dashboard Kin Plaza Arjaan By Rotana
                        </span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-white rounded-full border border-solid border-black focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only"></span>
                                <img class="w-8 h-8 rounded-full" src="/service-traiteur/public/img/profil.jpeg" alt="user photo">

                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Profil</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div style="padding-top: 85px;" class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/service-traiteur/public/admin"
                        class="flex items-center space-x-3 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group ">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"

                                d="M17 9h2V7h-2zm1 14q-2.075 0-3.537-1.463T13 18t1.463-3.537T18 13t3.538 1.463T23 18t-1.463 3.538T18 23m-.5-2h1v-2.5H21v-1h-2.5V15h-1v2.5H15v1h2.5zm5.5-7.875q-.975-1.05-2.275-1.588T18 11q-.275 0-.513.013t-.487.062V10l-7-5.05V3h13zM1 21V11l7-5l7 5v.675q-1.8.85-2.9 2.588T11 18q0 .775.163 1.538T11.675 21H10v-6H6v6z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>

                    </a>
                </li>

                <li>
                    <div id="accordion-flush" data-accordion="collapse"
                        data-active-classes="bg-white dark:bg-gray-900 text-white dark:text-white"
                        data-inactive-classes="text-white dark:text-white">
                        <h2 id="accordion-flush-heading-2">
                            <button type="button"
                                class="flex items-center w-full gap-3 p-2 font-medium hover:bg-gray-100 text-gray-800 rounded-lg dark:text-white dark:hover:bg-gray-700"
                                data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                aria-controls="accordion-flush-body-2">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="false"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                </svg>
                                <span class=" text-gray-900  dark:text-gray-200">
                                    Menus
                                </span>

                            </button>
                        </h2>
                        <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                            <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                <p
                                    class="mb-2 p-2 hover:bg-gray-100 rounded-lg text-gray-900 hover:text-gray dark:text-gray-400 {{ request()->routeIs('hashtags.index') ? ' bg-gray-100 dark:bg-gray-700' : 'bg-white dark:bg-gray-800' }}">
                                    <a href="/service-traiteur/public/admin/menus">Liste des plats</a>
                                </p>
                                <p
                                    class="mb-2 p-2 hover:bg-gray-100 rounded-lg text-gray-900hover:text-gray dark:text-gray-400 {{ request()->routeIs('categories.index') ? ' bg-gray-100 dark:bg-gray-700' : 'bg-white dark:bg-gray-800' }}">
                                    <a href="">Catégories</a>
                                </p>
                                <p
                                    class="mb-2 p-2 hover:bg-gray-100 rounded-lg text-gray-900 hover:text-gray dark:text-gray-400 {{ request()->routeIs('typevents.index') ? ' bg-gray-100 dark:bg-gray-700' : 'bg-white dark:bg-gray-800' }}">
                                    <a href="#">Commandes</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </aside>
</div>