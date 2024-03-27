@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/assets/styles/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="{{asset('/assets/images/logo.png')}}" type="image/x-icon">
    <title>{{Auth::user()->name}}</title>
</head>
<body>

   <div class="container" style="margin-top: 50px;">
   <div class="container mt-4">
    <h5 class="text-white text-center text-uppercase m-5 fs-5 fs-md-4 fs-lg-3">
        {{ Auth::user()->name }}  📽️📽️😎
    </h5>
</div>

        <form class="d-flex text-center" id="searchForm">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
            <button class="btn text-black bg-white" style="font-weight: 900;" name="submit" id="submit"  type="submit">Search</button>
        </form>   
        
    </div>

    <div class="container mt-5">
        <div class="container text-center d-flex p-10 m-10" id="dataStyle">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </a>

            <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="28">Action</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="12">Adventure</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="16">Animation</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="28">Action</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="35">Comedy</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="80">Crime</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="99">Documentary</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="18">Drama</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="10751">Family</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="14">Fantasy</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="36">History</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="10402">Music</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="9648">Mystery</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="878">Science Fiction</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="10770">TV Movie</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="53">Thriller</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="10752">War</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="37">Western</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="16">Cartoons</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="10749">Romance</a></li>
                <li><a class="dropdown-item nav-link text-dark text-uppercase" href="#" data-category="27">Horror</a></li>
                <li><hr class="dropdown-divider"></li>
            </ul>
            
            </li>
        </ul>

    <ul class="navbar-nav ">
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="yearsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Years
    </a>
        <ul class="dropdown-menu" aria-labelledby="yearsDropdown">
            <!-- Add 'All Years' link with Bootstrap classes -->
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="all"><i class="bi bi-calendar"></i> All Years</a></li>
            <!-- Existing year links -->
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="28">2024</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="35">2023</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="16">2022</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2021</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2020</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2019</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2018</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2017</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2016</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2015</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2014</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2013</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2012</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2011</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2009</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2008</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2007</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2006</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2005</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2004</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2003</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2002</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2001</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">2000</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">1999</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">1998</a></li>
            <li><a class="dropdown-item text-uppercase text-reset last-year-link" href="#" data-category="10749">1997</a></li>
            <li><hr class="dropdown-divider"></li>
        </ul>
    </li>

        </ul>


        </div>
        <div id="imagePath" class="row"></div>


        <div id="pagination"></div>

        <!-- Add this modal structure in your HTML file -->
        <div class="modal fade" id="movieDetailsModal" tabindex="-1" role="dialog" aria-labelledby="movieDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen modal-fullscreen-md-down" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movieDetailsModalLabel">Movie Details</h5>
                <button type="button" class="close bg-transparent" style="border-radius: 10px; background:white;" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="movieDetailsModalBody">
                <!-- Movie details content will be dynamically inserted here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); color: white;">
        © 2024:
        <a class="text-reset fw-bold" href="https://zobirofkir.com/">zobirofkir.com</a>
    </div>
    <!-- Copyright -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('/assets/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Bootstrap JS and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-oP6HI/t1f1q84Hhj8eZoKBV8UnBhZlNzBq+q5CKGC8=" crossorigin="anonymous"></script>

</body>
</html>
@endsection 
