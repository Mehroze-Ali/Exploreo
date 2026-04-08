@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <header id="hero" class="mb-5">
      <div id="heroSlider" class="carousel slide carousel-fade h-100">
        <div class="carousel-inner h-100">
          <div class="carousel-item active h-100" data-bs-interval="5000">
            <img
              src="https://picsum.photos/seed/slide1/1920/1080"
              class="d-block w-100 hero-image"
              alt="Venice Canal"
            />
            <div class="hero-content">
              <h1 class="hero-title display-1 mb-4">ADVENTURE</h1>
              <a href="{{ route('packages') }}" class="btn btn-lg btn-hero-cta"
                >DISCOVER YOUR STORIES</a
              >
            </div>
          </div>

          <div class="carousel-item h-100" data-bs-interval="5000">
            <img
              src="https://picsum.photos/seed/slide2/1920/1080"
              class="d-block w-100 hero-image"
              alt="Mountain Trek"
            />
            <div class="hero-content">
              <h1 class="hero-title display-1 mb-4">EXPLORE THE GLOBE</h1>
              <a href="{{ route('destinations') }}" class="btn btn-lg btn-hero-cta"
                >VIEW DESTINATIONS</a
              >
            </div>
          </div>

          <div class="carousel-item h-100" data-bs-interval="5000">
            <img
              src="https://picsum.photos/seed/slide3/1920/1080"
              class="d-block w-100 hero-image"
              alt="Tropical Beach"
            />
            <div class="hero-content">
              <h1 class="hero-title display-1 mb-4">LUXURY TRAVEL</h1>
              <a href="{{ route('contact') }}" class="btn btn-lg btn-hero-cta"
                >BOOK YOUR GETAWAY</a
              >
            </div>
          </div>
        </div>

        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#heroSlider"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#heroSlider"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </header>

    <main class="mb-5">
      <section id="popular-destinations" class="py-5">
        <div class="container">
          <h2 class="text-center mb-4 display-5 fw-bold text-deep-navy">
            Explore
            <span class="text-primary-custom">Popular</span> Destinations
          </h2>
          <p class="text-center text-muted mb-5">
            Hand-picked places travelers love the most.
          </p>

          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="col">
              <div class="card destination-card h-100 shadow-sm border-0">
                <img
                  src="https://picsum.photos/seed/destA/400/200"
                  class="card-img-top"
                  alt="Bali"
                />
                <div class="card-body">
                  <h5 class="card-title text-deep-navy">Bali, Indonesia</h5>
                  <p class="card-text text-muted small">
                    <i class="fas fa-mountain"></i> Beaches & Culture
                  </p>
                  <a
                    href="{{ route('packages') }}"
                    class="btn btn-sm btn-outline-secondary"
                    >View Packages</a
                  >
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card destination-card h-100 shadow-sm border-0">
                <img
                  src="https://picsum.photos/seed/destB/400/200"
                  class="card-img-top"
                  alt="Paris"
                />
                <div class="card-body">
                  <h5 class="card-title text-deep-navy">Paris, France</h5>
                  <p class="card-text text-muted small">
                    <i class="fas fa-city"></i> Romance & History
                  </p>
                  <a
                    href="{{ route('packages') }}"
                    class="btn btn-sm btn-outline-secondary"
                    >View Packages</a
                  >
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card destination-card h-100 shadow-sm border-0">
                <img
                  src="https://picsum.photos/seed/destC/400/200"
                  class="card-img-top"
                  alt="Kyoto"
                />
                <div class="card-body">
                  <h5 class="card-title text-deep-navy">Kyoto, Japan</h5>
                  <p class="card-text text-muted small">
                    <i class="fas fa-leaf"></i> Temples & Gardens
                  </p>
                  <a
                    href="{{ route('packages') }}"
                    class="btn btn-sm btn-outline-secondary"
                    >View Packages</a
                  >
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card destination-card h-100 shadow-sm border-0">
                <img
                  src="https://picsum.photos/seed/destD/400/200"
                  class="card-img-top"
                  alt="Rio"
                />
                <div class="card-body">
                  <h5 class="card-title text-deep-navy">
                    Rio de Janeiro, Brazil
                  </h5>
                  <p class="card-text text-muted small">
                    <i class="fas fa-sun"></i> Festivity & Coastline
                  </p>
                  <a
                    href="{{ route('packages') }}"
                    class="btn btn-sm btn-outline-secondary"
                    >View Packages</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <section
        id="featured-packages"
        class="py-5"
        style="background-color: var(--color-sky-blue)"
      >
        <div class="container">
          <h2 class="text-center mb-4 display-5 fw-bold text-deep-navy">
            <span class="text-primary-custom">Featured</span> Packages
          </h2>
          <p class="text-center text-muted mb-5">
            Our top-rated and most recommended travel experiences.
          </p>

          <div id="packageCarousel" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <div class="card package-card shadow-lg border-0">
                      <div class="row g-0">
                        <div class="col-md-5">
                          <img
                            src="https://picsum.photos/seed/pkg1/600/400"
                            class="img-fluid rounded-start h-100"
                            style="object-fit: cover"
                            alt="European Tour"
                          />
                        </div>
                        <div class="col-md-7">
                          <div class="card-body">
                            <span class="badge bg-primary-custom mb-2"
                              ><i class="fas fa-star"></i> Top Rated</span
                            >
                            <h4 class="card-title text-deep-navy">
                              Grand European Tour (14 Days)
                            </h4>
                            <p class="card-text text-muted">
                              Visit 5 iconic cities: Paris, Rome, Berlin,
                              Prague, and Amsterdam. All-inclusive luxury
                              travel.
                            </p>
                            <p class="fw-bold mb-1 text-primary-custom">
                              $3,500
                              <span class="text-muted small">/ per person</span>
                            </p>
                            <ul class="list-unstyled small mb-3 text-success">
                              <li>
                                <i class="fas fa-check-circle me-2"></i> Flights
                                & 4-Star Hotels
                              </li>
                              <li>
                                <i class="fas fa-check-circle me-2"></i> Daily
                                Guided Tours
                              </li>
                            </ul>
                            <a
                              href="{{ route('package.details', ['id' => 1]) }}"
                              class="btn btn-primary-custom"
                              ><i class="fas fa-plane me-2"></i>Explore
                              Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <div class="card package-card shadow-lg border-0">
                      <div class="row g-0">
                        <div class="col-md-5">
                          <img
                            src="https://picsum.photos/seed/pkg2/600/400"
                            class="img-fluid rounded-start h-100"
                            style="object-fit: cover"
                            alt="Himalayan Trek"
                          />
                        </div>
                        <div class="col-md-7">
                          <div class="card-body">
                            <span class="badge bg-danger mb-2"
                              ><i class="fas fa-fire"></i> Hot Deal</span
                            >
                            <h4 class="card-title text-deep-navy">
                              Himalayan Base Camp Trek (10 Days)
                            </h4>
                            <p class="card-text text-muted">
                              A challenging but rewarding trek through the
                              stunning Nepalese Himalayas. Expert guides
                              included.
                            </p>
                            <p class="fw-bold mb-1 text-primary-custom">
                              $1,800
                              <span class="text-muted small">/ per person</span>
                            </p>
                            <ul class="list-unstyled small mb-3 text-success">
                              <li>
                                <i class="fas fa-check-circle me-2"></i> All
                                Meals & Accommodation
                              </li>
                              <li>
                                <i class="fas fa-check-circle me-2"></i>
                                Experienced Mountain Guides
                              </li>
                            </ul>
                            <a
                              href="{{ route('package.details', ['id' => 2]) }}"
                              class="btn btn-primary-custom"
                              ><i class="fas fa-plane me-2"></i>Explore
                              Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#packageCarousel"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#packageCarousel"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <section id="testimonials" class="py-5">
        <div class="container">
          <h2 class="text-center mb-4 display-5 fw-bold text-deep-navy">
            What Our <span class="text-primary-custom">Happy</span> Travelers
            Say
          </h2>
          <p class="text-center text-muted mb-5">
            Hear what our customers have to say about their adventures.
          </p>

          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div
                class="card h-100 p-4 shadow-sm border-0"
                style="border-top: 4px solid var(--color-dark-blue) !important"
              >
                <div class="card-body">
                  <i
                    class="fas fa-quote-left fa-2x text-primary-custom mb-3"
                  ></i>
                  <p class="card-text fst-italic">
                    "The Bali trip was seamless! Everything from the flights to
                    the hotel was perfectly managed. Highly recommend Wanderlust
                    Adventures!"
                  </p>
                  <div class="d-flex align-items-center mt-4">
                    <img
                      src="https://picsum.photos/seed/user1/60/60"
                      class="rounded-circle me-3"
                      alt="Customer 1"
                      style="width: 60px; height: 60px; object-fit: cover"
                    />
                    <div>
                      <h6 class="mb-0 fw-bold text-deep-navy">Alice Johnson</h6>
                      <p class="small text-muted mb-0">Traveled to Bali</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div
                class="card h-100 p-4 shadow-sm border-0"
                style="border-top: 4px solid var(--color-dark-blue) !important"
              >
                <div class="card-body">
                  <i
                    class="fas fa-quote-left fa-2x text-primary-custom mb-3"
                  ></i>
                  <p class="card-text fst-italic">
                    "The support team was fantastic! They helped us re-book a
                    flight last minute. True professionals. Five stars!"
                  </p>
                  <div class="d-flex align-items-center mt-4">
                    <img
                      src="https://picsum.photos/seed/user2/60/60"
                      class="rounded-circle me-3"
                      alt="Customer 2"
                      style="width: 60px; height: 60px; object-fit: cover"
                    />
                    <div>
                      <h6 class="mb-0 fw-bold text-deep-navy">Bob Carter</h6>
                      <p class="small text-muted mb-0">European Tour</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div
                class="card h-100 p-4 shadow-sm border-0"
                style="border-top: 4px solid var(--color-dark-blue) !important"
              >
                <div class="card-body">
                  <i
                    class="fas fa-quote-left fa-2x text-primary-custom mb-3"
                  ></i>
                  <p class="card-text fst-italic">
                    "We experienced the authentic culture of Japan thanks to the
                    custom itinerary they built for us. Best travel agency
                    ever!"
                  </p>
                  <div class="d-flex align-items-center mt-4">
                    <img
                      src="https://picsum.photos/seed/user3/60/60"
                      class="rounded-circle me-3"
                      alt="Customer 3"
                      style="width: 60px; height: 60px; object-fit: cover"
                    />
                    <div>
                      <h6 class="mb-0 fw-bold text-deep-navy">Carol Diaz</h6>
                      <p class="small text-muted mb-0">Kyoto, Japan</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
