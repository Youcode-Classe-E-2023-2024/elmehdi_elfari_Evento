<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@include('layouts.nav')
<div class="container">
    <h1>Reserve Ticket</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header">{{ $event->title }}</div>
        <div class="card-body">
            <p>Description: {{ $event->description }}</p>
            <p>Date: {{ $event->date_start->format('Y-m-d H:i:s') }} to {{ $event->date_end->format('Y-m-d H:i:s') }}</p>
            <p>Location: {{ $event->location }}</p>
            <p>Available Places: {{ $event->available_places }}</p>

            @if(Auth::check())
                <form action="{{ route('events.reserve', $event) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary" @if($event->available_places <= 0 || $event->status != 'active') disabled @endif>
                        Reserve Ticket
                    </button>
                </form>
            @else
                <p>Please <a href="{{ route('login') }}">log in</a> to reserve a ticket.</p>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')

</body>
</html>
