@extends('layouts.app')
@section('content')
    <div class="container-fluid d-flex justify-content-center my-5">
        <h1 class="display-6 fw-bold">Edit Borrow Log</h1>
    </div>

    <div class="row justify-content-center m-5">

        <!-- TODO -->
        <!-- route  the action to update and then locate its ID and add method POST-->
        <form action="{{route('update', $borrowed->id)}}" method="POST">
            @csrf
            <!-- PUT methjod  designer in edit, none in creste -->
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-label">Borrower Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name', $borrowed->name) }}">

                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bookTitle" class="form-label">Book Title</label>
                <input type="text" name="bookTitle" id="bookTitle" class="form-control" value="{{old('bookTitle', $borrowed->bookTitle)}}">
                @error('bookTitle')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="pending" {{ old('status', $borrowed->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="returned" {{ old('status', $borrowed->status) == 'returned' ? 'selected' : '' }}>Returned</option>
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