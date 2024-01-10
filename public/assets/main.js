// Define the API endpoint and API key
const apiUrl = 'https://api.themoviedb.org/3';
const apiKey = 'd1eccf2c9bc079f7211acdc695ce3c60'; // Replace with your actual API key
const dataOne = document.getElementById("data");
const imagePath = document.getElementById("imagePath");
const pagination = document.getElementById("pagination");
const searchForm = document.getElementById("searchForm");
const searchInput = document.getElementById("searchInput");

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

// Set up the fetch options
const options = {
  method: 'GET',
  headers: {
    'Content-Type': 'application/json',
  },
};

// Function to fetch data from the API
function fetchData(url = `${apiUrl}/discover/movie?include_adult=false&include_video=false&language=en-US&page=${currentPage}&sort_by=popularity.desc&api_key=${apiKey}`) {
  // Make the API request for the selected page
  fetch(url, options)
    .then(response => response.json())
    .then(data => {
      let allImagesHTML = '';

      // Check if there are any results
      if (data.results && data.results.length > 0) {
        // Iterate through all results
        data.results.forEach(movie => {
          const title = movie.title;
          const image = movie.backdrop_path;
          const overview = movie.overview.substring(0, 100) + ' ...';

          // Accumulate HTML content for all images
          allImagesHTML += `
            <div class="col-md-4 mb-4">
              <div class="card bg-dark text-white">
                <img src="https://image.tmdb.org/t/p/w500${image}" class="card-img-top" alt="${title}">
                <div class="card-body">
                  <h5 class="card-title">${title}</h5>
                  <p class="card-text">${overview}</p>
                  <a href="#" class="btn btn-light">Watch</a>
                </div>
              </div>
            </div>
          `;
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
    })
    .catch(err => console.error(err));
}

// Event listener for the search form
searchForm.addEventListener('submit', function (event) {
  event.preventDefault();
  currentPage = 1;
  const searchQuery = searchInput.value.trim();
  const searchUrl = searchQuery ? `${apiUrl}/search/movie?query=${searchQuery}&page=${currentPage}&api_key=${apiKey}` : `${apiUrl}/discover/movie?page=${currentPage}&api_key=${apiKey}`;
  fetchData(searchUrl);
});

// Initial call to fetch data and generatePagination with total pages
fetchData();
