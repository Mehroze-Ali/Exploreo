@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <header id="page-hero">
      <img
        src="https://picsum.photos/seed/blog-page-hero/1920/800"
        alt="Person reading map on mountain"
      />
      <h1 class="hero-banner-title">TRAVEL BLOG</h1>
    </header>
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="text-deep-navy mb-4 fw-bold">Latest Articles</h2>

            <div id="blogList" class="row g-4">
              <div class="col-md-6 blog-item" data-category="city">
                <a href="{{ route('blog.details', 1) }}" class="text-decoration-none">
                  <div class="card blog-card">
                    <img
                      src="https://picsum.photos/seed/blog1/400/250"
                      class="card-img-top blog-card-img"
                      alt="Cityscape night view"
                    />
                    <div class="card-body">
                      <span class="badge bg-primary-custom mb-2"
                        >City Breaks</span
                      >
                      <h5 class="card-title fw-bold text-deep-navy">
                        The Ultimate 48-Hour Guide to Paris
                      </h5>
                      <p class="blog-meta-info">
                        <i class="fas fa-calendar-alt"></i> May 1, 2025 |
                        <i class="fas fa-user"></i> Jane Doe
                      </p>
                      <p class="card-text small text-muted">
                        Discover the essential sights and local hidden gems for
                        a perfect weekend in the City of Light...
                      </p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6 blog-item" data-category="nature">
                <a href="{{ route('blog.details', 2) }}" class="text-decoration-none">
                  <div class="card blog-card">
                    <img
                      src="https://picsum.photos/seed/blog2/400/250"
                      class="card-img-top blog-card-img"
                      alt="Mountain hiking trail"
                    />
                    <div class="card-body">
                      <span class="badge bg-danger mb-2">Nature & Hiking</span>
                      <h5 class="card-title fw-bold text-deep-navy">
                        Trekking the Dolomites: A Beginner's Guide
                      </h5>
                      <p class="blog-meta-info">
                        <i class="fas fa-calendar-alt"></i> April 20, 2025 |
                        <i class="fas fa-user"></i> Alex Smith
                      </p>
                      <p class="card-text small text-muted">
                        Everything you need to know before tackling the stunning
                        trails and vias ferratas of Northern Italy...
                      </p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6 blog-item" data-category="food">
                <a href="{{ route('blog.details', 3) }}" class="text-decoration-none">
                  <div class="card blog-card">
                    <img
                      src="https://picsum.photos/seed/blog3/400/250"
                      class="card-img-top blog-card-img"
                      alt="Delicious street food"
                    />
                    <div class="card-body">
                      <span class="badge bg-success mb-2">Food & Culture</span>
                      <h5 class="card-title fw-bold text-deep-navy">
                        Street Food Tour of Bangkok: Best Eats
                      </h5>
                      <p class="blog-meta-info">
                        <i class="fas fa-calendar-alt"></i> March 15, 2025 |
                        <i class="fas fa-user"></i> Maria K.
                      </p>
                      <p class="card-text small text-muted">
                        From Pad Thai to Mango Sticky Rice, we break down the
                        must-try dishes and markets in Thailand's capital...
                      </p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6 blog-item" data-category="city">
                <a href="{{ route('blog.details', 4) }}" class="text-decoration-none">
                  <div class="card blog-card">
                    <img
                      src="https://picsum.photos/seed/blog4/400/250"
                      class="card-img-top blog-card-img"
                      alt="London Big Ben"
                    />
                    <div class="card-body">
                      <span class="badge bg-primary-custom mb-2"
                        >City Breaks</span
                      >
                      <h5 class="card-title fw-bold text-deep-navy">
                        A Local's Guide to Hidden London Pubs
                      </h5>
                      <p class="blog-meta-info">
                        <i class="fas fa-calendar-alt"></i> March 1, 2025 |
                        <i class="fas fa-user"></i> David L.
                      </p>
                      <p class="card-text small text-muted">
                        Go beyond the tourist traps and discover where true
                        Londoners enjoy their pint...
                      </p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6 blog-item" data-category="nature">
                <a href="{{ route('blog.details', 5) }}" class="text-decoration-none">
                  <div class="card blog-card">
                    <img
                      src="https://picsum.photos/seed/blog5/400/250"
                      class="card-img-top blog-card-img"
                      alt="Iceland Northern Lights"
                    />
                    <div class="card-body">
                      <span class="badge bg-danger mb-2">Nature & Hiking</span>
                      <h5 class="card-title fw-bold text-deep-navy">
                        Chasing the Aurora: Iceland in Winter
                      </h5>
                      <p class="blog-meta-info">
                        <i class="fas fa-calendar-alt"></i> Feb 10, 2025 |
                        <i class="fas fa-user"></i> Sara W.
                      </p>
                      <p class="card-text small text-muted">
                        Tips and best spots for witnessing the Northern Lights
                        spectacle...
                      </p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6 blog-item" data-category="food">
                <a href="{{ route('blog.details', 6) }}" class="text-decoration-none">
                  <div class="card blog-card">
                    <img
                      src="https://picsum.photos/seed/blog6/400/250"
                      class="card-img-top blog-card-img"
                      alt="Italy pasta"
                    />
                    <div class="card-body">
                      <span class="badge bg-success mb-2">Food & Culture</span>
                      <h5 class="card-title fw-bold text-deep-navy">
                        Mastering Pasta Making in Bologna
                      </h5>
                      <p class="blog-meta-info">
                        <i class="fas fa-calendar-alt"></i> Jan 5, 2025 |
                        <i class="fas fa-user"></i> Chef Remo
                      </p>
                      <p class="card-text small text-muted">
                        A hands-on guide to traditional pasta making from the
                        culinary heart of Italy...
                      </p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-12 text-center my-5 d-none" id="noResults">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No posts match this category.</h4>
              </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
              <nav>
                <ul class="pagination shadow-sm">
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Previous</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="sidebar-card">
              <h4 class="text-deep-navy fw-bold mb-3">Categories</h4>
              <ul class="category-filter-list">
                <li>
                  <a href="#" data-filter="all" class="active"
                    >All Topics (6)</a
                  >
                </li>
                <li><a href="#" data-filter="city">City Breaks (2)</a></li>
                <li>
                  <a href="#" data-filter="nature">Nature & Hiking (2)</a>
                </li>
                <li><a href="#" data-filter="food">Food & Culture (2)</a></li>
                <li><a href="#" data-filter="luxury">Luxury Travel (0)</a></li>
                <li><a href="#" data-filter="budget">Budget Travel (0)</a></li>
              </ul>
            </div>

            <div class="sidebar-card">
              <h4 class="text-deep-navy fw-bold mb-3">Popular Posts</h4>
              <ul class="list-unstyled">
                <li class="mb-3">
                  <a
                    href="{{ route('blog.details', 1) }}"
                    class="text-decoration-none fw-bold text-primary-custom"
                    >Ultimate 48-Hour Guide to Paris</a
                  >
                  <p class="blog-meta-info mb-0">May 1, 2025</p>
                </li>
                <li class="mb-3">
                  <a
                    href="{{ route('blog.details', 2) }}"
                    class="text-decoration-none fw-bold text-primary-custom"
                    >Trekking the Dolomites</a
                  >
                  <p class="blog-meta-info mb-0">April 20, 2025</p>
                </li>
                <li class="mb-0">
                  <a
                    href="{{ route('blog.details', 5) }}"
                    class="text-decoration-none fw-bold text-primary-custom"
                    >Chasing the Aurora: Iceland</a
                  >
                  <p class="blog-meta-info mb-0">Feb 10, 2025</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // --- BLOG PAGE LOGIC (Category Filtering) ---
        const $blogItems = $(".blog-item");

        function filterPosts(category) {
          let resultsCount = 0;

          $blogItems.each(function () {
            const postCategory = $(this).data("category");
            if (category === "all" || postCategory === category) {
              $(this).show();
              resultsCount++;
            } else {
              $(this).hide();
            }
          });

          if (resultsCount === 0) {
            $("#noResults").removeClass("d-none");
          } else {
            $("#noResults").addClass("d-none");
          }
        }

        $(".category-filter-list a").on("click", function (e) {
          e.preventDefault();
          const selectedCategory = $(this).data("filter");

          // Update active state
          $(".category-filter-list a").removeClass("active");
          $(this).addClass("active");

          filterPosts(selectedCategory);
        });
    });
</script>
@endpush
