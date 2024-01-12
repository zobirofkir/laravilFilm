@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbs5e2d/ToUE5/1F/i7X1o7OjcIM9xXnYl5frV7bf6BZHExlVRgmvL4eXaCF0zj" crossorigin="anonymous">
    <link rel="icon" href="/assets/images/logo.png" type="image/x-icon">
    <title>Movie Post Form</title>
</head>
<body class="bg-dark text-white">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Post Your Movie</h2>
        <form action="{{ route('store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Movie Description</label>
                <textarea class="form-control" id="text" name="text" rows="5" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="text-center btn bg-black text-white">Submit</button>
            </div>
            @if(isset($message))
                <div class="alert alert-success text-center m-5">
                    {{ $message }}
                </div>
            @endif
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iKl8KC7R5f7ZEBAHtwEIlxue8Sln3gVMNcA7lKq6ikdyBhkwM5I9k" crossorigin="anonymous"></script>
</body>
</html>
@endsection 
