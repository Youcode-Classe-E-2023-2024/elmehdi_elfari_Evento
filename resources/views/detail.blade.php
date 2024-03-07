<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $event->title }}</title>
    <!-- Add your CSS stylesheets or links here -->
</head>

<body>

@include('layouts.nav')

<div class="bg-white">

    <div class="mb-5 px-4 sm:px-10">
        <div class="max-w-7xl w-full mx-auto">
            <div class="grid lg:grid-cols-2 items-center gap-10">
                <div class="mt-10">
                    <h2 class="md:text-4xl text-3xl font-extrabold mb-6">{{ $event->title }}</h2>
                </div>
            </div>
        </div>
        <div class="my-8">
            <a href="{{ url('/') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Roteur
            </a>
        </div>
    </div>

    <div class="px-4 sm:px-10">
        <div class="max-w-7xl w-full mx-auto">
            <div class="grid md:grid-cols-2 items-center gap-10">
                <div class="w-3/4 ml-5 mt-5">
                    <img src="{{ asset("storage/$event->image") }}" alt="{{ $event->title }}" class="w-full h-auto">
                </div>
                <div class="bg-white">
                    <div class="container mx-auto p-4 sm:p-10 mt-3">
                        <div class="bg-gray-200 p-8 rounded-xl shadow-md">
                            <h1 class="text-3xl font-bold mb-4">Reservation</h1>
                            <div class="w-full lg:w-1/2">
                                <h4 class="text-gray-700">Available Places: {{ $event->available_places }}</h4>
                            </div>
                            <div class="d-block flex justify-between mt-6">
                                <button id="reserveButton" class="lg:w-2/3 mx-auto bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">
                                    Reserve
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto p-4 sm:p-10 mt-5">
            <div class="bg-white">
                <h1 class="text-3xl font-bold mb-4">Description</h1>
                <div class="w-full lg:w-1/2">
                    <p class="text-gray-700">{{ $event->description }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl w-full mx-auto">
            <div class="px-4 sm:px-10 mt-5">
                <div class="grid md:grid-cols-2 items-center gap-10">
                    <!-- Add more details or sections as needed -->
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</div>

<script>
    document.getElementById('reserveButton').addEventListener('click', function () {

        alert('Place reserved!');
    });
</script>
<script>
    document.getElementById('reserveButton').addEventListener('click', function () {
        // AJAX request to handle reservation
        fetch("{{ route('events.reserve', ['eventId' => $event->id]) }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Display the message from the backend
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>

</body>

</html>
