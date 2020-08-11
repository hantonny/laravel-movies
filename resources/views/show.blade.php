@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="/img/parasite.jpg" alt="parasite"
            class="w-64 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">
                    Parasite (2019)
                </h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star text-orange-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                    </svg>
                    <span class="ml-1">85%</span>
                    <span class="mx-2">|</span>
                    <span>Ago 09, 2020</span>
                    <span class="mx-2">|</span>
                    <span>Ação, Suspense, Comédia</span>
                </div>
                <p class="text-gray-300 mt-8">
                    efokf fokofkefekofk ofkeok oekfoekooooofokfoek kfokeofko,
                    okfokfeofkeofkeokokgokhok fkkg. O fkeofkkegoegjgrogjrgohtoh
                    orkrogkrogkrogrkogkrorkgobmboowkdo´k´s, ´kw´kékf´fkmbp
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">
                        Featured Cast
                    </h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Bong Joon-ho</div>
                            <div class="text-sm text-gray-400">Director</div>
                        </div>
                        <div class="ml-8">
                            <div>Bong Joon-ho</div>
                            <div class="text-sm text-gray-400">Director</div>
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <button class="mt-1 bg-orange-300 hover:bg-red-400 transition ease-in-out duration-150 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-play" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                        </svg>
                        <span class="text-sm uppercase">Assistir Trailer</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Elenco</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                <div class="mt-8">
                    <div class="mt-8">
                        <a href="#">
                            <img src="/img/parasite.jpg" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray:300">Ojdjrgn</a>
                            <div class="text-sm text-gray-400">
                                ffkrk
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="mt-8">
                        <a href="#">
                            <img src="/img/parasite.jpg" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray:300">Ojdjrgn</a>
                            <div class="text-sm text-gray-400">
                                ffkrk
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="mt-8">
                        <a href="#">
                            <img src="/img/parasite.jpg" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray:300">Ojdjrgn</a>
                            <div class="text-sm text-gray-400">
                                ffkrk
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
