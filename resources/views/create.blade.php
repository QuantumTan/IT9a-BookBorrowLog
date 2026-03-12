@extends('layout.app')
@section('content')
    <div class="container-fluid d-flex justify-content-center my-5">
        <h1 class="display-6 fw-bold">Create Borrow Log</h1>
    </div>

    <div class="row justify-content-center m-5">

        <!-- TODO -->
        <!-- route  the action to store and add method POST-->
        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Borrower Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Juan  Dela Cruz" required>

                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bookTitle" class="form-label">Book Title</label>
                <input type="text" name="bookTitle" id="bookTitle" class="form-control" placeholder="Biceps: A Stress Reliever" required>
                @error('bookTitle')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="pending">Pending</option>
                    <option value="returned">Returned</option>
                </select>
                                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-3">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>

@endsection