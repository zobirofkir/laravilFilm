// Define the API endpoint and API key
const apiUrl = 'https://api.themoviedb.org/3';
const apiKey = 'd1eccf2c9bc079f7211acdc695ce3c60'; // Replace with your actual API key
const imagePath = document.getElementById("imagePath");
const pagination = document.getElementById("pagination");
const searchForm = document.getElementById("searchForm");
const searchInput = document.getElementById("searchInput");

// Set up the fetch options
const options = {
  method: 'GET',
  headers: {
    'Content-Type': 'application/json',
  },
};

// Function to fetch detailed information about a movie by ID
async function fetchMovieDetails(movieId) {
  const detailsUrl = `${apiUrl}/movie/${movieId}?api_key=${apiKey}`;

  try {
    const response = await fetch(detailsUrl, options);
    const movieDetails = await response.json();

    // Display the detailed information
    displayMovieDetailsModal(movieDetails);

    console.log(movieDetails);
  } catch (err) {
    console.error(err);
  }
}

// Function to display movie details in a modal
function displayMovieDetailsModal(movieDetails) {
  // Customize this part based on your modal implementation
  const modalBody = document.getElementById("movieDetailsModalBody");

  // Display the detailed information
  const detailsHTML = `
  <div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <img src="https://image.tmdb.org/t/p/w500${movieDetails.poster_path}" class="img-fluid rounded" alt="${movieDetails.title} Poster">
    </div>
    <div class="col-md-6">
      <h2 class="mt-3">${movieDetails.title}</h2>
      <h4 class="mt-3">Genres:</h4>
      <div class="mb-3">
        ${movieDetails.genres.map(genre => `<span class="badge bg-dark me-2">${genre.name}</span>`).join('')}
      </div>

      <p>${movieDetails.overview}</p>
      <p><strong>Release Date:</strong> ${movieDetails.release_date}</p>
      <p><strong>Vote Average:</strong> ${movieDetails.vote_average}</p>
      <a href="${movieDetails.homepage}" class="btn btn-dark text-white text-decoration-none" target="_blank">Watch</a>

      <h4 class="mt-3">Production:</h4>
      <div class="mb-3">
        ${movieDetails.production_countries.map(production_countries => `<span class="badge bg-dark me-2">${production_countries.name}</span>`).join('')}
      </div>

      <h4 class="mt-3">Companies:</h4>
      <div class="mb-3">
        ${movieDetails.production_companies.map(production_companies => `<span class="badge bg-dark me-2">${production_companies.name}</span>`).join('')}
        ${movieDetails.production_companies.map(production_companies => `<img src="https://image.tmdb.org/t/p/w200${production_companies.logo_path}" class="img-fluid rounded me-2" alt="${movieDetails.title} Poster">`).join('')}
      </div>

      <div class="mb-3 text-center">
        <p style="font-weight: 900; text-transform: uppercase;">Video</p>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/${movieDetails.video_key}" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

  `;

  modalBody.innerHTML = detailsHTML;

  // Show the modal
  $('#movieDetailsModal').modal('show');
}

// Function to generate pagination dynamically
function generatePagination(totalPages) {
  let paginationHTML = '<nav><ul class="pagination text-center">';

  // Left arrow
  paginationHTML += `
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous" onclick="goToPage(${currentPage - 1})">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
  `;

  // Show three pagination links
  for (let i = Math.max(1, currentPage - 1); i <= Math.min(currentPage + 1, totalPages); i++) {
    paginationHTML += `<li class="page-item"><a class="page-link" href="#" onclick="goToPage(${i})">${i}</a></li>`;
  }

  // Right arrow
  paginationHTML += `
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next" onclick="goToPage(${currentPage + 1})">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul></nav>`;

  pagination.innerHTML = paginationHTML;
}

// Function to handle page navigation
function goToPage(page) {
  // Update the currentPage variable
  currentPage = page;

  // Call the function to generate pagination with the updated currentPage
  fetchData();
}

// Set up the query parameters
let currentPage = 1;

// Function to fetch data from the API
async function fetchData(url = `${apiUrl}/discover/movie?include_adult=false&include_video=false&language=en-US&page=${currentPage}&sort_by=popularity.desc&api_key=${apiKey}`) {
  try {
    const response = await fetch(url, options);
    const data = await response.json();

    // Process and display the data
    processMovieData(data);

    console.log(data);
  } catch (err) {
    console.error(err);
  }
}

// Function to process and display movie data
function processMovieData(data) {
  let allImagesHTML = '';

  // Check if there are any results
  if (data.results && data.results.length > 0) {
    // Iterate through all results
    data.results.forEach(movie => {
      const title = movie.title;
      // Check if the movie has a valid title
      if (title) {
        const image = movie.backdrop_path;
        const overview = movie.overview.substring(0, 100) + ' ...';
        const vote_average = movie.vote_average;
        const release_date = movie.release_date;
        const movieId = movie.id;

        // Accumulate HTML content for all images
        allImagesHTML += `
          <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white rounded">
              <h5 class="card-title text-light text-center">${vote_average}</h5>
              <h6 class="card-title text-light text-center">${release_date}</h6>
              <img src="https://image.tmdb.org/t/p/w500${image}" class="card-img-top" alt="${title}">
              <div class="card-body">
                <h5 class="card-title">${title}</h5>
                <p class="card-text">${overview}</p>
                <a href="#" class="btn btn-light watch-button" data-movie-id="${movieId}">Watch</a>
              </div>
            </div>
          </div>
        `;
      }
    });

    // Update the image path HTML
    imagePath.innerHTML = allImagesHTML;

    // Get total pages from the response
    const totalPages = data.total_pages;

    // Update pagination
    generatePagination(totalPages);
  } else {
    // Handle the case where there are no results
    imagePath.innerHTML = '<p class="text-danger">No results found</p>';
  }
}

// Event listener for the search form
searchForm.addEventListener('submit', function (event) {
  event.preventDefault();
  currentPage = 1;
  const searchQuery = searchInput.value.trim();
  const searchUrl = searchQuery ? `${apiUrl}/search/movie?query=${searchQuery}&page=${currentPage}&api_key=${apiKey}` : `${apiUrl}/discover/movie?page=${currentPage}&api_key=${apiKey}`;
  fetchData(searchUrl);
});

// Event listener for the "Watch" button
document.addEventListener('click', function (event) {
  if (event.target.classList.contains('watch-button')) {
    // Get the movie ID from the data attribute or any other way you stored it
    const movieId = event.target.dataset.movieId;

    // Fetch detailed information about the selected movie
    fetchMovieDetails(movieId);
  }
});

// Function to fetch data from the API based on category
async function fetchDataByCategory(category, page) {
  const url = `${apiUrl}/discover/movie?include_adult=false&include_video=false&language=en-US&page=${page}&sort_by=popularity.desc&api_key=${apiKey}&with_genres=${category}`;

  try {
    const response = await fetch(url, options);
    const data = await response.json();

    // Process and display the data
    processMovieData(data);

    console.log(data);
  } catch (err) {
    console.error(err);
  }
}

// Event listener for the navigation bar items
document.addEventListener('click', function (event) {
  if (event.target.classList.contains('nav-link')) {
    // Get the category from the clicked navigation bar item
    const category = event.target.getAttribute('data-category');
    
    // Reset current page to 1 when a new category is selected
    currentPage = 1;

    // Fetch data based on the selected category
    fetchDataByCategory(category, currentPage);
  }
});

// Event listener for the search form
searchForm.addEventListener('submit', function (event) {
  event.preventDefault();
  currentPage = 1;
  const searchQuery = searchInput.value.trim();
  const searchUrl = searchQuery ? `${apiUrl}/search/movie?query=${searchQuery}&page=${currentPage}&api_key=${apiKey}` : `${apiUrl}/discover/movie?page=${currentPage}&api_key=${apiKey}`;
  fetchData(searchUrl);
});



// Function to fetch data from the API based on the selected year
async function fetchDataByYear(year, page) {
  const url = `${apiUrl}/discover/movie?include_adult=false&include_video=false&language=en-US&page=${page}&sort_by=popularity.desc&api_key=${apiKey}&primary_release_year=${year}`;

  try {
    const response = await fetch(url, options);
    const data = await response.json();

    // Process and display the data
    processMovieData(data);

    console.log(data);
  } catch (err) {
    console.error(err);
  }
}

// Event listener for the "Last Years" links
document.addEventListener('click', function (event) {
  if (event.target.classList.contains('last-year-link')) {
    // Get the selected year from the clicked link
    const year = event.target.textContent.trim();

    // Reset current page to 1 when a new year is selected
    currentPage = 1;

    // Fetch data based on the selected year
    fetchDataByYear(year, currentPage);
  }
});


// ... (previous code)

// Function to set a cookie
function setCookie(name, value, days) {
  const expires = new Date();
  expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
  document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
}

// Function to get a cookie by name
function getCookie(name) {
  const cookies = document.cookie.split(';');
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i].trim();
    if (cookie.startsWith(name + '=')) {
      return cookie.substring(name.length + 1);
    }
  }
  return null;
}

// Function to fetch data from the API based on category
async function fetchDataByCategory(category, page) {
  const url = `${apiUrl}/discover/movie?include_adult=false&include_video=false&language=en-US&page=${page}&sort_by=popularity.desc&api_key=${apiKey}&with_genres=${category}`;

  try {
    const response = await fetch(url, options);
    const data = await response.json();

    // Process and display the data
    processMovieData(data);

    // Save the category in a cookie
    setCookie('category', category, 7); // Cookie expires in 7 days

    console.log(data);
  } catch (err) {
    console.error(err);
  }
}

// Function to fetch data from the API based on the selected year
async function fetchDataByYear(year, page) {
  const url = `${apiUrl}/discover/movie?include_adult=false&include_video=false&language=en-US&page=${page}&sort_by=popularity.desc&api_key=${apiKey}&primary_release_year=${year}`;

  try {
    const response = await fetch(url, options);
    const data = await response.json();

    // Process and display the data
    processMovieData(data);

    // Save the year in a cookie
    setCookie('year', year, 7); // Cookie expires in 7 days

    console.log(data);
  } catch (err) {
    console.error(err);
  }
}

// Event listener for the navigation bar items
document.addEventListener('click', function (event) {
  if (event.target.classList.contains('nav-link')) {
    // Get the category from the clicked navigation bar item
    const category = event.target.getAttribute('data-category');

    // Reset current page to 1 when a new category is selected
    currentPage = 1;

    // Fetch data based on the selected category
    fetchDataByCategory(category, currentPage);
  }
});

// Event listener for the "Last Years" links
document.addEventListener('click', function (event) {
  if (event.target.classList.contains('last-year-link')) {
    // Get the selected year from the clicked link
    const year = event.target.textContent.trim();

    // Reset current page to 1 when a new year is selected
    currentPage = 1;

    // Fetch data based on the selected year
    fetchDataByYear(year, currentPage);
  }
});

// Initial call to fetch data and generatePagination with total pages
fetchData();

// Check for saved category and year in cookies and load data accordingly
const savedCategory = getCookie('category');
const savedYear = getCookie('year');

if (savedCategory) {
  fetchDataByCategory(savedCategory, currentPage);
}

if (savedYear) {
  fetchDataByYear(savedYear, currentPage);
}


// Initial call to fetch data and generatePagination with total pages
fetchData();
