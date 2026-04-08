@extends('layouts.app')

@section('title', 'Destinations')

@section('content')
    <header id="page-hero">
      <img
        src="https://picsum.photos/seed/dest-page-hero/1920/800"
        alt="Scenic View of a Bay and Mountains"
      />
      <h1 class="hero-banner-title">DESTINATIONS</h1>
    </header>
    <main class="py-5">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <h2 class="display-5 fw-bold text-primary-custom mb-4">
              Experience The New Adventure
            </h2>
            <p class="lead text-muted mb-4">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
              commodo ligula eget dolor. Aenean massa. Cum sociis natoque
              penatibus et magnis dis parturient montes, nascetur ridiculus mus.
              Donec quam felis.
            </p>

            <div class="feature-box">
              <i class="fas fa-plane-departure"></i>
              <div>
                <h6>Safe Traveling</h6>
                <p>
                  Lorem ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem ipsum has been
                </p>
              </div>
            </div>

            <div class="feature-box">
              <i class="fas fa-wallet"></i>
              <div>
                <h6>Affordable Price</h6>
                <p>
                  Lorem ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem ipsum has been
                </p>
              </div>
            </div>

            <div class="feature-box">
              <i class="fas fa-hotel"></i>
              <div>
                <h6>Comfort Accommodation</h6>
                <p>
                  Lorem ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem ipsum has been
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="position-relative mb-4">
              <img
                src="https://picsum.photos/seed/adventure-main/800/500"
                class="img-fluid rounded shadow"
                alt="Main adventure image"
              />
            </div>
            <div class="row g-3">
              <div class="col-6">
                <div class="video-thumbnail-container">
                  <img
                    src="https://picsum.photos/seed/adventure-video1/400/250"
                    class="img-fluid rounded"
                    alt="Video thumbnail 1"
                  />
                  <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
              </div>
              <div class="col-6">
                <div class="video-thumbnail-container">
                  <img
                    src="https://picsum.photos/seed/adventure-video2/400/250"
                    class="img-fluid rounded"
                    alt="Video thumbnail 2"
                  />
                  <div class="play-icon"><i class="fas fa-play"></i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-5" />
        <div class="row g-4" id="destinationGrid">
          <div
            class="col-lg-6 col-md-6 col-span-2 destination-item"
            data-continent="asia"
            data-budget="medium"
            data-category="beach"
          >
            <a
              href="{{ route('packages') }}"
              class="text-decoration-none destination-card h-100 shadow"
            >
              <div class="card-img-wrapper">
                <img
                  src="https://picsum.photos/seed/klingking/600/600"
                  alt="Kelingking Beach, Bali"
                />
                <i class="fas fa-arrow-right card-arrow"></i>
                <div class="card-image-overlay">
                  <h5 class="title">Kelingking Beach</h5>
                  <p class="subtitle">Nusa Penida, Bali</p>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col-lg-3 col-md-6 destination-item"
            data-continent="asia"
            data-budget="low"
            data-category="culture"
          >
            <a
              href="{{ route('packages') }}"
              class="text-decoration-none destination-card h-100 shadow"
            >
              <div class="card-img-wrapper">
                <img
                  src="https://picsum.photos/seed/palace/300/300"
                  alt="Grand Palace, Bangkok"
                />
                <i class="fas fa-arrow-right card-arrow"></i>
                <div class="card-image-overlay">
                  <h5 class="title">Grand Palace</h5>
                  <p class="subtitle">Bangkok, Thailand</p>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col-lg-3 col-md-6 destination-item"
            data-continent="europe"
            data-budget="medium"
            data-category="city"
          >
            <a
              href="{{ route('packages') }}"
              class="text-decoration-none destination-card h-100 shadow"
            >
              <div class="card-img-wrapper">
                <img
                  src="https://picsum.photos/seed/cappadocia/300/300"
                  alt="Hot Air Balloons, Cappadocia"
                />
                <i class="fas fa-arrow-right card-arrow"></i>
                <div class="card-image-overlay">
                  <h5 class="title">Cappadocia</h5>
                  <p class="subtitle">Turkey</p>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col-lg-6 col-md-6 destination-item"
            data-continent="asia"
            data-budget="high"
            data-category="adventure"
          >
            <a
              href="{{ route('packages') }}"
              class="text-decoration-none destination-card h-100 shadow"
            >
              <div class="card-img-wrapper">
                <img
                  src="https://picsum.photos/seed/padar/600/300"
                  alt="Padar Island, Indonesia"
                />
                <i class="fas fa-arrow-right card-arrow"></i>
                <div class="card-image-overlay">
                  <h5 class="title">Padar Island</h5>
                  <p class="subtitle">East Nusa Tenggara</p>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col-lg-3 col-md-6 destination-item"
            data-continent="europe"
            data-budget="medium"
            data-category="culture"
          >
            <a
              href="{{ route('packages') }}"
              class="text-decoration-none destination-card h-100 shadow"
            >
              <div class="card-img-wrapper">
                <img
                  src="https://picsum.photos/seed/destinationRome/400/220"
                  alt="Rome, Italy"
                />
                <i class="fas fa-arrow-right card-arrow"></i>
                <div class="card-image-overlay">
                  <h5 class="title">Rome, Italy</h5>
                  <p class="subtitle">History & Architecture</p>
                </div>
              </div>
            </a>
          </div>

          <div
            class="col-lg-3 col-md-6 destination-item"
            data-continent="americas"
            data-budget="high"
            data-category="adventure"
          >
            <a
              href="{{ route('packages') }}"
              class="text-decoration-none destination-card h-100 shadow"
            >
              <div class="card-img-wrapper">
                <img
                  src="https://picsum.photos/seed/destinationPatagonia/400/220"
                  alt="Patagonia, Argentina"
                />
                <i class="fas fa-arrow-right card-arrow"></i>
                <div class="card-image-overlay">
                  <h5 class="title">Patagonia</h5>
                  <p class="subtitle">Argentina & Chile</p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-12 text-center my-5 d-none" id="noResults">
            <i class="fas fa-map-marked-alt fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">
              No destinations match your current filters.
            </h4>
          </div>
        </div>
      </div>
    </main>
@endsection
