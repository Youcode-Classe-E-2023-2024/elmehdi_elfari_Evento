<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="mt-5 flex flex-col justify-center max-w-lg mx-auto px-4 space-y-6 font-[sans-serif] text-[#333]">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('Events.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label class="mb-2 text-lg block">title</label>
            <input type='text' name="title" placeholder='Large Input'
                class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500" />
            <div class="text-red-500">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <label class="mb-2 text-lg block">description</label>
            <input type='text' name="description" placeholder='Large Input'
                class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500" />
            <div class="text-red-500">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <label class="mb-2 text-lg block">Start Date</label>
            <input type='date' name="date_start"
                class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500" />
            <div class="text-red-500">
                @error('date_start')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div>
            <label class="mb-2 text-lg block">End Date</label>
            <input type='date' name="date_end" placeholder='Large Input'
                class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500" />
            <div class="text-red-500">
                @error('date_end')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <label class="mb-2 text-lg block">location
                <input type='text' name="location" placeholder='Large Input'
                    class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500" />
                <div class="text-red-500">
                    @error('location')
                        {{ $message }}
                    @enderror
                </div>
        </div>
        <div>
            <label class="mb-2 text-lg block">number_places</label>
            <input type='text' name="number_places" placeholder='Large Input'
                class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500" />
            <div class="text-red-500">
                @error('number_places')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <label>Image</label>
            <input type="file"
                class="w-full text-black text-base bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2.5 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded"
                name="image" accept="image/*" />
            <div class="text-red-500">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <label class="mb-2 text-lg block">Status</label>
            <select name="status"
                class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500">
                <option value="manuel">Manuel</option>
                <option value="auto">Auto</option>
            </select>
            <div class="text-red-500">
                @error('status')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <label class="mb-2 text-lg block">Category</label>
            <select name="categories_id"
                class="px-4 py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="text-red-500">
                @error('categories_id')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="font-[sans-serif] space-x-4 space-y-4 text-center">
            <button type="submit"
                class="px-6 py-2.5 rounded text-white text-sm tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">submit</button>
        </div>
    </form>

</body>

</html>
