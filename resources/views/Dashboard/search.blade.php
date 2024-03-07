<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-...", crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body class="container mx-auto px-2 my-20">

    <div class="flex flex-wrap justify-between">
        @isset($validatedEvents)
            @foreach ($validatedEvents as $event)
                <div
                    class="w-1/3 bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700 mb-6">
                    <a href="#">
                        <img class="w-full h-96 object-cover rounded-t-lg" src="{{ asset('storage/' . $event->image) }}"
                            alt="{{ $event->title }}">
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">
                                {{ $event->title }}
                            </h5>
                        </a>
                        <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{ $event->description }}</p>
                        <a href="#"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
        @else
            <p>No events found.</p>
        @endisset
    </div>

</body>

</html>
