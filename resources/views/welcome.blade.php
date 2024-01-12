<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="/assets/images/logo.png" type="image/x-icon">
    <title>csw-movies</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" id="navStyleLogo" href="{{ url('/') }}">
            <img src="/assets/images/logo.png" style="font-size: 10px; max-height: 60px; width: auto;" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <div class="loginRegister">
                <a href="{{url('/login')}}" class="login">login</a>
                <a href="{{url('/register')}}" class="register">register</a>
            </div>

            <div id="totalResults"></div>
            </div>
        </div>
    </nav>

   <div class="container" style="margin-top: 50px;">
        <form class="d-flex text-center" id="searchForm">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
            <button class="btn text-black bg-white" style="font-weight: 900;" name="submit" id="submit"  type="submit">Search</button>
        </form>        
    </div>


    <div class="container" style="margin-top: 30px;">
        <h5 class="text-white  text-center">Welcome To CSW-Movies</h5>
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



    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
        </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>Company name
            </h6>
            <p>
                This website offre whatch all movies for free in this year 2024/2025
            </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                    Categories
                </h6>
                <p>
                    <a href="#" class="text-reset category-link" data-category="28">Action</a>
                </p>
                <p>
                    <a href="#" class="text-reset category-link" data-category="35">Comedies</a>
                </p>
                <p>
                    <a href="#" class="text-reset category-link" data-category="16">Cartoons</a>
                </p>
                <p>
                    <a href="#" class="text-reset category-link" data-category="10749">Romantic</a>
                </p>
                </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
                Last Years
            </h6>
            <p>
                <a href="#" class="text-reset last-year-link">2024</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">2023</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">2022</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">2021</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">2018</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">1999</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">1900</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">2019</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">2015</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">1889</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">1899</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">1990</a>
            </p>
            <p>
                <a href="#" class="text-reset last-year-link">1997</a>
            </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Imouzer Kandar, Morocco</p>
            <p>
                <i class="fas fa-envelope me-3"></i>
                movies@zobirofkir.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 212 619920942</p>
            <p><i class="fas fa-print me-3"></i> + 212 619920942</p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024:
        <a class="text-reset fw-bold" href="https://zobirofkir.com/">zobirofkir.com</a>
    </div>
    <!-- Copyright -->
    </footer>
<!-- Footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/assets/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>