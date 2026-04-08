@extends('layouts.app')

@section('title', 'Packages')

@section('content')
    <header id="page-hero">
      <img
        src="https://picsum.photos/seed/packages-page-hero/1920/800"
        alt="Tropical resort pool overlooking mountains"
      />
      <h1 class="hero-banner-title">PACKAGES</h1>
    </header>
    <main class="py-5">
      <div class="container">
        <div id="filter-sort-bar" class="row align-items-center">
          <div class="col-md-4 mb-3 mb-md-0">
            <label for="sortOrder" class="form-label fw-bold mb-0 small"
              >Sort By</label
            >
            <select id="sortOrder" class="form-select form-select-sm">
              <option value="price-asc" selected>Price: Low to High</option>
              <option value="price-desc">Price: High to Low</option>
              <option value="duration">Duration</option>
            </select>
          </div>
          <div class="col-md-4 mb-3 mb-md-0">
            <label for="filterCategory" class="form-label fw-bold mb-0 small"
              >Filter By Category</label
            >
            <select id="filterCategory" class="form-select form-select-sm">
              <option value="all" selected>All Categories</option>
              <option value="luxury">Luxury Escapes</option>
              <option value="adventure">Adventure</option>
              <option value="culture">Culture & History</option>
              <option value="family">Family Trips</option>
            </select>
          </div>
          <div class="col-md-4 text-md-end">
            <span class="small text-muted">Showing 6 of 12 packages</span>
          </div>
        </div>

        <div
          id="packageList"
          class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4"
        >
          <div
            class="col package-item"
            data-price="3500"
            data-category="luxury"
            data-duration="7"
          >
            <a href="{{ route('package.details', ['id' => 'venice']) }}" class="card-content-link">
              <div
                class="package-card"
                data-target="detailsA"
                data-package-id="venice"
                style="
                  --card-image: url('https://picsum.photos/seed/packageA/600/900');
                "
              >
                <div class="overlay"></div>

                <div class="card-flags">
                  <span class="badge bg-primary-custom">LUXURY</span>
                  <span class="badge bg-light text-dark">NEW</span>
                </div>

                <i
                  class="fas fa-arrow-up-right-from-square card-arrow-link"
                ></i>

                <div class="card-content">
                  <h5 class="card-title">Venice & Rome Grand Tour</h5>

                  <div class="card-details-wrapper" id="detailsA">
                    <p class="card-description">
                      Experience the timeless beauty of Italy with a
                      comprehensive tour of Venice's canals and Rome's ancient
                      wonders. All-inclusive luxury travel.
                    </p>
                    <span class="card-price">$3,500</span>
                    <div class="card-details-expanded">
                      <p>
                        <i class="fas fa-calendar-alt"></i> 7 Days / 6 Nights
                      </p>
                      <p><i class="fas fa-map-marker-alt"></i> Italy, Europe</p>
                      <p><i class="fas fa-star"></i> 5-star Accommodation</p>
                    </div>
                  </div>
                  <span class="card-category show-more-text"
                    >Show More <i class="fas fa-chevron-down ms-1"></i
                  ></span>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col package-item"
            data-price="1800"
            data-category="adventure"
            data-duration="10"
          >
            <a
              href="{{ route('package.details', ['id' => 'himalaya']) }}"
              class="card-content-link"
            >
              <div
                class="package-card"
                data-target="detailsB"
                data-package-id="himalaya"
                style="
                  --card-image: url('https://picsum.photos/seed/packageB/600/900');
                "
              >
                <div class="overlay"></div>

                <div class="card-flags">
                  <span class="badge bg-danger">ADVENTURE</span>
                  <span class="badge bg-light text-dark">BEST SELLER</span>
                </div>

                <i
                  class="fas fa-arrow-up-right-from-square card-arrow-link"
                ></i>

                <div class="card-content">
                  <h5 class="card-title">Himalayan Base Camp Trek</h5>

                  <div class="card-details-wrapper" id="detailsB">
                    <p class="card-description">
                      Embark on an epic journey to the base of the world's
                      highest peaks. This challenging trek offers breathtaking
                      views and unforgettable adventure. Expert guides included.
                    </p>
                    <span class="card-price">$1,800</span>
                    <div class="card-details-expanded">
                      <p>
                        <i class="fas fa-calendar-alt"></i> 10 Days / 9 Nights
                      </p>
                      <p><i class="fas fa-map-marker-alt"></i> Nepal, Asia</p>
                      <p><i class="fas fa-mountain"></i> Expert Guides</p>
                    </div>
                  </div>
                  <span class="card-category show-more-text"
                    >Show More <i class="fas fa-chevron-down ms-1"></i
                  ></span>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col package-item"
            data-price="2200"
            data-category="culture"
            data-duration="5"
          >
            <a href="{{ route('package.details', ['id' => 'kyoto']) }}" class="card-content-link">
              <div
                class="package-card"
                data-target="detailsC"
                data-package-id="kyoto"
                style="
                  --card-image: url('https://picsum.photos/seed/packageC/600/900');
                "
              >
                <div class="overlay"></div>

                <div class="card-flags">
                  <span class="badge bg-success">CULTURE</span>
                </div>

                <i
                  class="fas fa-arrow-up-right-from-square card-arrow-link"
                ></i>

                <div class="card-content">
                  <h5 class="card-title">Ancient Kyoto Temples</h5>

                  <div class="card-details-wrapper" id="detailsC">
                    <p class="card-description">
                      Immerse yourself in the serene beauty and rich history of
                      Kyoto. Visit iconic temples, traditional gardens, and
                      experience a glimpse of ancient Japan.
                    </p>
                    <span class="card-price">$2,200</span>
                    <div class="card-details-expanded">
                      <p>
                        <i class="fas fa-calendar-alt"></i> 5 Days / 4 Nights
                      </p>
                      <p><i class="fas fa-map-marker-alt"></i> Japan, Asia</p>
                      <p>
                        <i class="fas fa-spa"></i> Zen Gardens & Tea Ceremonies
                      </p>
                    </div>
                  </div>
                  <span class="card-category show-more-text"
                    >Show More <i class="fas fa-chevron-down ms-1"></i
                  ></span>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col package-item"
            data-price="1200"
            data-category="family"
            data-duration="7"
          >
            <a href="{{ route('package.details', ['id' => 'florida']) }}" class="card-content-link">
              <div
                class="package-card"
                data-target="detailsD"
                data-package-id="florida"
                style="
                  --card-image: url('https://picsum.photos/seed/packageD/600/900');
                "
              >
                <div class="overlay"></div>

                <div class="card-flags">
                  <span class="badge bg-info text-dark">FAMILY</span>
                </div>

                <i
                  class="fas fa-arrow-up-right-from-square card-arrow-link"
                ></i>

                <div class="card-content">
                  <h5 class="card-title">Florida Theme Park Adventure</h5>

                  <div class="card-details-wrapper" id="detailsD">
                    <p class="card-description">
                      Create unforgettable memories with your family at
                      Florida's world-famous theme parks. Packed with thrills,
                      magic, and entertainment for all ages.
                    </p>
                    <span class="card-price">$1,200</span>
                    <div class="card-details-expanded">
                      <p>
                        <i class="fas fa-calendar-alt"></i> 7 Days / 6 Nights
                      </p>
                      <p><i class="fas fa-map-marker-alt"></i> USA, Americas</p>
                      <p>
                        <i class="fas fa-ticket-alt"></i> Park Tickets Included
                      </p>
                    </div>
                  </div>
                  <span class="card-category show-more-text"
                    >Show More <i class="fas fa-chevron-down ms-1"></i
                  ></span>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col package-item"
            data-price="4500"
            data-category="adventure"
            data-duration="14"
          >
            <a href="{{ route('package.details', ['id' => 'safari']) }}" class="card-content-link">
              <div
                class="package-card"
                data-target="detailsE"
                data-package-id="safari"
                style="
                  --card-image: url('https://picsum.photos/seed/packageE/600/900');
                "
              >
                <div class="overlay"></div>

                <div class="card-flags">
                  <span class="badge bg-danger">SAFARI</span>
                </div>

                <i
                  class="fas fa-arrow-up-right-from-square card-arrow-link"
                ></i>

                <div class="card-content">
                  <h5 class="card-title">South African Wildlife Safari</h5>

                  <div class="card-details-wrapper" id="detailsE">
                    <p class="card-description">
                      Embark on a thrilling safari adventure through South
                      Africa's iconic national parks. Witness the Big Five in
                      their natural habitat and experience the wild heart of
                      Africa.
                    </p>
                    <span class="card-price">$4,500</span>
                    <div class="card-details-expanded">
                      <p>
                        <i class="fas fa-calendar-alt"></i> 14 Days / 13 Nights
                      </p>
                      <p>
                        <i class="fas fa-map-marker-alt"></i> South Africa,
                        Africa
                      </p>
                      <p>
                        <i class="fas fa-camera-retro"></i> Wildlife Photography
                      </p>
                    </div>
                  </div>
                  <span class="card-category show-more-text"
                    >Show More <i class="fas fa-chevron-down ms-1"></i
                  ></span>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col package-item"
            data-price="2800"
            data-category="luxury"
            data-duration="5"
          >
            <a
              href="{{ route('package.details', ['id' => 'maldives']) }}"
              class="card-content-link"
            >
              <div
                class="package-card"
                data-target="detailsF"
                data-package-id="maldives"
                style="
                  --card-image: url('https://picsum.photos/seed/packageF/600/900');
                "
              >
                <div class="overlay"></div>

                <div class="card-flags">
                  <span class="badge bg-primary-custom">BEACH LUXURY</span>
                </div>

                <i
                  class="fas fa-arrow-up-right-from-square card-arrow-link"
                ></i>

                <div class="card-content">
                  <h5 class="card-title">Maldives Water Bungalow Stay</h5>

                  <div class="card-details-wrapper" id="detailsF">
                    <p class="card-description">
                      Indulge in unparalleled luxury with an exquisite stay in a
                      private water bungalow in the Maldives. Crystal-clear
                      waters, white-sand beaches, and ultimate relaxation await.
                    </p>
                    <span class="card-price">$2,800</span>
                    <div class="card-details-expanded">
                      <p>
                        <i class="fas fa-calendar-alt"></i> 5 Days / 4 Nights
                      </p>
                      <p>
                        <i class="fas fa-map-marker-alt"></i> Maldives, Asia
                      </p>
                      <p>
                        <i class="fas fa-umbrella-beach"></i> Private Island
                        Resort
                      </p>
                    </div>
                  </div>
                  <span class="card-category show-more-text"
                    >Show More <i class="fas fa-chevron-down ms-1"></i
                  ></span>
                </div>
              </div>
            </a>
          </div>
          
           <div class="col-12 text-center my-5 d-none" id="noResults">
            <i class="fas fa-map-marked-alt fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">
              No packages match your current filters.
            </h4>
          </div>

        </div>
      </div>
    </main>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        const $packageList = $("#packageList");
        const $packageItems = $(".package-item");

        // 1. Package Card Interaction (Show More/Show Less on Hover)
        $(".package-card").on("mouseenter", function () {
          const $card = $(this);
          const targetId = $card.data("target");
          const $targetDetails = $card.find(`#${targetId}`);

          $targetDetails.stop(true, true).slideDown(400);
        });

        $(".package-card").on("mouseleave", function () {
          const $card = $(this);
          const targetId = $card.data("target");
          const $targetDetails = $card.find(`#${targetId}`);

          // Slide up the details
          $targetDetails.stop(true, true).slideUp(400);
        });

        // Sorting and Filtering Logic
        function applySortAndFilter() {
          let packagesArray = $packageItems.get();

          const sortOrder = $("#sortOrder").val();
          const filterCategory = $("#filterCategory").val();
          let resultsCount = 0;

          // Filtering
          packagesArray = packagesArray.filter((item) => {
            const $item = $(item);
            const category = $item.data("category"); // Data on package-item column
            const categoryMatch =
              filterCategory === "all" || category === filterCategory;

            if (categoryMatch) {
              $item.removeClass("d-none");
              resultsCount++;
              return true;
            } else {
              $item.addClass("d-none");
              return false;
            }
          });

          if (resultsCount === 0) {
            $("#noResults").removeClass("d-none");
          } else {
            $("#noResults").addClass("d-none");
          }

          // Sorting
          packagesArray.sort((a, b) => {
            const $a = $(a);
            const $b = $(b);

            let aVal, bVal;
            let comparison = 0;

            if (sortOrder.startsWith("price")) {
              aVal = $a.data("price");
              bVal = $b.data("price");
              comparison = aVal - bVal;
            } else if (sortOrder === "duration") {
              aVal = $a.data("duration");
              bVal = $b.data("duration");
              comparison = aVal - bVal;
            }

            return sortOrder.endsWith("desc") ? comparison * -1 : comparison;
          });

          $.each(packagesArray, function (index, item) {
            $packageList.append(item);
          });
        }

        $("#sortOrder, #filterCategory").on("change", applySortAndFilter);
        applySortAndFilter();
      });
</script>
@endpush
