<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<body>
    @include('layouts.nav')
    <!-- component -->



    <body>
        <form method="GET" action="{{ route('search') }}">
            <div
                class="bg-white mb-4 flex px-1 py-1 rounded-full border border-blue-500 overflow-hidden max-w-md mx-auto font-[sans-serif]">
                <input type='search' name="query" placeholder='Search Something...'
                    class="w-full outline-none bg-white pl-4 text-sm" />
                <button type='submit'
                    class="bg-blue-600 hover:bg-blue-700 transition-all text-white text-sm rounded-full px-5 py-2.5">Search</button>
            </div>
        </form>


        <div class="sliderAx h-auto">
            <div id="slider-1" class="container mx-auto">
                <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill"
                    style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
                    <div class="md:w-1/2">
                        <p class="font-bold text-sm uppercase">Services</p>
                        <p class="text-3xl font-bold">Hello world</p>
                        <p class="text-2xl mb-10 leading-none">Carousel with TailwindCSS and jQuery</p>
                        <a href="#"
                            class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact
                            us</a>
                    </div>
                </div>
                <br>
            </div>

            <div id="slider-2" class="container mx-auto">
                <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill"
                    style="background-image: url(https://images.unsplash.com/photo-1544144433-d50aff500b91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80)">

                    <p class="font-bold text-sm uppercase">Services</p>
                    <p class="text-3xl font-bold">Hello world</p>
                    <p class="text-2xl mb-10 leading-none">Carousel with TailwindCSS and jQuery</p>
                    <a href="#"
                        class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact
                        us</a>

                </div>
                <br>
            </div>
        </div>
        <div class="flex justify-between w-12 mx-auto pb-2">
            <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 "></button>
            <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
        </div>


        <div class="w-4/6 dark:bg-gray-800 mx-auto mt-8 flex flex-wrap justify-around mt-48">

            @foreach ($validatedEvents as $event)
                <div
                    class="w-1/3 bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:border-gray-700 mb-6 px-4">
                    <a href="#">
                        <img class="w-full h-96 object-cover rounded-t-lg"
                            {{--src="{{ asset('storage/') . '/' . $event->image }}" alt="{{ $event->title }}">--}}
                            src="{{ asset("storage/$event->image") }}" alt="{{ $event->title }}">
                    </a>

                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">
                                {{ $event->title }}
                            </h5>
                        </a>
                        <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{ $event->description }}</p>
                        <a href="#"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more

                            <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>




        <head>
            <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
            <script>
                var cont = 0;

                function loopSlider() {
                    var xx = setInterval(function() {
                        switch (cont) {
                            case 0: {
                                $("#slider-1").fadeOut(400);
                                $("#slider-2").delay(400).fadeIn(400);
                                $("#sButton1").removeClass("bg-purple-800");
                                $("#sButton2").addClass("bg-purple-800");
                                cont = 1;

                                break;
                            }
                            case 1: {

                                $("#slider-2").fadeOut(400);
                                $("#slider-1").delay(400).fadeIn(400);
                                $("#sButton2").removeClass("bg-purple-800");
                                $("#sButton1").addClass("bg-purple-800");

                                cont = 0;

                                break;
                            }


                        }
                    }, 8000);

                }

                function reinitLoop(time) {
                    clearInterval(xx);
                    setTimeout(loopSlider(), time);
                }



                function sliderButton1() {

                    $("#slider-2").fadeOut(400);
                    $("#slider-1").delay(400).fadeIn(400);
                    $("#sButton2").removeClass("bg-purple-800");
                    $("#sButton1").addClass("bg-purple-800");
                    reinitLoop(4000);
                    cont = 0

                }

                function sliderButton2() {
                    $("#slider-1").fadeOut(400);
                    $("#slider-2").delay(400).fadeIn(400);
                    $("#sButton1").removeClass("bg-purple-800");
                    $("#sButton2").addClass("bg-purple-800");
                    reinitLoop(4000);
                    cont = 1

                }

                $(window).ready(function() {
                    $("#slider-2").hide();
                    $("#sButton1").addClass("bg-purple-800");


                    loopSlider();






                });
            </script>
        </head>

        @include('layouts.footer')
    </body>

</html>
