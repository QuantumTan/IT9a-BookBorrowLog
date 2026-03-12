<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <div class="container-fluid d-flex justify-content-center my-5">
        <h1 class="display-6 fw-bold">Book Borrow Log</h1>
    </div>
    <div class="container p-5">
        <div class="row justify-content-between m-5">
        <h2 class="fs-2 fw-semibold p-0 m-0 col-1">Logs</h2>
        <a href="{{ route('create') }}" class="btn btn-primary col-2"><i class="bi bi-plus"></i>Add Log</a>
    </div>

    <div class="row justify-content-center m-5">
        @foreach ($borrowed_records as $record)
        <div class="card m-3 p-3 row">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p><span class="fw-semibold">Book Title: </span><span class="fs-6 fw-bold">{{ $record->bookTitle }}</span></p>
                    <p><span class="fw-semibold">Borrowed by:</span> {{ $record->name }}</p>
                    <p><span class="fw-semibold">Borrow time:</span> {{ $record->created_at->format('M j, Y g:i A') }}</p>
                </div>

                <div class="d-flex align-items-center gap-3">
                    @if($record->status=="pending")
                    <div class="badge bg-warning fw-bold w-20 my-3">{{$record->status}}</div>
                    @else
                    <div class="badge bg-success fw-bold w-20 my-3">{{$record->status}}</div>
                    @endif
                    <div class="my-3 flex d-flex card-text  gap-3">
                        <a href="{{route('edit', $record->id)}}" class="btn btn-warning w-30">Edit</a>
                        <form class="w-60" action="{{ route('delete',$record->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-30">Delete</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        @endforeach
    </div>
    </div>
    
</body>

</html>