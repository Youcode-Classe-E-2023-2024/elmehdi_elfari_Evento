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

    <!-- Card -->
    <div class="container">
        <div class="font-[sans-serif] space-x-4 space-y-4 text-center">
            <a href="{{ route('clients') }}" type="button"
                class="px-6 py-2.5 rounded-full text-white text-sm tracking-wider font-semibold border-none outline-none bg-[#333] hover:bg-[#222] active:bg-[#333]">Dark</a>
        </div>

        <div
            class="bg-white shadow-[0_8px_12px_-6px_rgba(0,0,0,0.2)] border p-2 w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4">
            <img src="{{ $Event->image }}" class="w-full rounded-lg" />
            <div class="px-4 my-6 text-center">
                <h3 class="text-lg font-semibold">{{ $Event->title }}</h3>
                <p class="mt-2 text-sm text-gray-400">{{ $Event->description }}</p>
                <button type="button" id="viewButton"
                    class="px-6 py-2 w-full mt-4 rounded-lg text-white text-sm tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">View</button>
            </div>
        </div>


        <!-- Details Modal -->
        <div id="detailsModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 hidden">
            <div class="flex justify-center items-center h-full">
                <div class="bg-white shadow-md p-8 rounded-lg">
                    <h2 class="text-2xl font-semibold">{{ $Event->title }}</h2>
                    <p class="mt-2 text-gray-600">{{ $Event->description }}</p>
                    <button id="closeModalButton"
                        class="mt-4 px-6 py-2 rounded-lg text-white text-sm tracking-wider font-semibold bg-blue-600 hover:bg-blue-700 active:bg-blue-600">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('viewButton').addEventListener('click', function() {
            document.getElementById('detailsModal').style.display = 'flex';
        });

        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('detailsModal').style.display = 'none';
        });
    </script>

    @include('layouts.footer')
</body>

</html>
