@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <header id="page-hero">
      <img
        src="https://picsum.photos/seed/about-page-hero/1920/800"
        alt="Compass on a map"
      />
      <h1 class="hero-banner-title">ABOUT US</h1>
    </header>
    <main>
      <section id="company-info" class="py-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <h2 class="display-5 fw-bold text-deep-navy mb-3">
                Our Mission:
                <span class="text-primary-custom">Tailored Adventures</span>
              </h2>
              <p class="lead text-muted">
                Wanderlust Adventures was founded on the belief that travel
                should be personal, enriching, and seamless. We go beyond
                bookings to craft journeys that reflect your unique spirit and
                passions.
              </p>
              <p class="text-muted small">
                Since 2010, we've dedicated ourselves to uncovering hidden gems
                and perfecting logistics, ensuring every client experiences the
                world with confidence and wonder. Our deep roots in sustainable
                tourism and local partnerships mean your trip is not only
                memorable for you but beneficial to the places you visit.
              </p>
              <a href="{{ route('packages') }}" class="btn btn-primary-custom mt-3"
                >Plan Your Trip Today</a
              >
            </div>
            <div class="col-lg-6">
              <div class="history-card shadow">
                <img
                  src="https://picsum.photos/seed/about-office/600/400"
                  class="img-fluid rounded-lg"
                  alt="Team collaborating in an office"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="why-choose-us" class="py-5">
        <div class="container">
          <h2 class="text-center display-5 fw-bold text-deep-navy mb-5">
            Why Choose <span class="text-primary-custom">Exploreo</span>?
          </h2>

          <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
              <div class="value-card shadow-sm">
                <i class="fas fa-hand-holding-heart"></i>
                <h4 class="mb-3">Personalized Service</h4>
                <p class="text-muted small">
                  We match you with a dedicated travel concierge who understands
                  your needs, ensuring a fully customized itinerary from start
                  to finish.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="value-card shadow-sm">
                <i class="fas fa-route"></i>
                <h4 class="mb-3">Expert Curated Routes</h4>
                <p class="text-muted small">
                  Our destinations are hand-picked and tested. We offer
                  exclusive access to local guides and experiences missed by
                  typical tourists.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="value-card shadow-sm">
                <i class="fas fa-shield-alt"></i>
                <h4 class="mb-3">24/7 Global Support</h4>
                <p class="text-muted small">
                  Travel confidently knowing our support team is just a call
                  away, regardless of your time zone, ready to assist with any
                  emergency.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="statistics" class="text-white">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0">
              <div class="stat-number">
                <span class="counter" data-target="15">0</span>+
              </div>
              <div class="stat-label">Years Experience</div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
              <div class="stat-number">
                <span class="counter" data-target="45">0</span>
              </div>
              <div class="stat-label">Countries Visited</div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
              <div class="stat-number">
                <span class="counter" data-target="1200">0</span>+
              </div>
              <div class="stat-label">Happy Travelers</div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
              <div class="stat-number">
                <span class="counter" data-target="98">0</span>%
              </div>
              <div class="stat-label">Satisfaction Rate</div>
            </div>
          </div>
        </div>
      </section>

      <section id="team-section" class="py-5 bg-white">
        <div class="container">
          <h2 class="text-center display-5 fw-bold text-deep-navy mb-5">
            Meet Our <span class="text-primary-custom">Adventure</span> Experts
          </h2>

          <div class="row g-4">
            <div class="col-lg-3 col-md-6">
              <div class="team-member">
                <img
                  src="https://picsum.photos/seed/team1/300/300"
                  class="team-img"
                  alt="CEO Image"
                />
                <h5 class="mb-0">Alexia Quinn</h5>
                <p class="text-primary-custom small fw-bold">CEO & Founder</p>
                <a href="#" class="text-muted small"
                  ><i class="fab fa-linkedin"></i
                ></a>
                <a href="#" class="text-muted small ms-2"
                  ><i class="fas fa-envelope"></i
                ></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="team-member">
                <img
                  src="https://picsum.photos/seed/team2/300/300"
                  class="team-img"
                  alt="Lead Designer Image"
                />
                <h5 class="mb-0">Marcus Chen</h5>
                <p class="text-primary-custom small fw-bold">
                  Lead Travel Designer
                </p>
                <a href="#" class="text-muted small"
                  ><i class="fab fa-linkedin"></i
                ></a>
                <a href="#" class="text-muted small ms-2"
                  ><i class="fab fa-instagram"></i
                ></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="team-member">
                <img
                  src="https://picsum.photos/seed/team3/300/300"
                  class="team-img"
                  alt="Operations Manager Image"
                />
                <h5 class="mb-0">Sarah Javid</h5>
                <p class="text-primary-custom small fw-bold">
                  Operations Manager
                </p>
                <a href="#" class="text-muted small"
                  ><i class="fab fa-linkedin"></i
                ></a>
                <a href="#" class="text-muted small ms-2"
                  ><i class="fas fa-phone"></i
                ></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="team-member">
                <img
                  src="https://picsum.photos/seed/team4/300/300"
                  class="team-img"
                  alt="Support Specialist Image"
                />
                <h5 class="mb-0">David Lee</h5>
                <p class="text-primary-custom small fw-bold">
                  24/7 Support Specialist
                </p>
                <a href="#" class="text-muted small"
                  ><i class="fab fa-linkedin"></i
                ></a>
                <a href="#" class="text-muted small ms-2"
                  ><i class="fab fa-twitter"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection

@push('scripts')
<script>
      $(document).ready(function () {
        // --- ABOUT US PAGE LOGIC (Counter Animation) ---
        function animateCounters() {
          $(".counter").each(function () {
            var $this = $(this);
            var endValue = parseInt($this.attr("data-target"));

            if ($this.is(":visible") && $this.data("count-ran") !== true) {
              $({ Counter: 0 }).animate(
                { Counter: endValue },
                {
                  duration: 2000,
                  easing: "swing",
                  step: function (now) {
                    $this.text(Math.ceil(now));
                  },
                  complete: function () {
                    $this.data("count-ran", true);
                  },
                }
              );
            }
          });
        }

        // Trigger animation when the section scrolls into view
        $(window).on("scroll", function () {
          var statsTop = $("#statistics").offset().top;
          var windowBottom = $(window).scrollTop() + $(window).height();

          if (statsTop < windowBottom) {
            animateCounters();
            $(window).off("scroll", animateCounters); // Run once
          }
        });

        // Check initially in case it's already in view
        var statsTop = $("#statistics").offset().top;
        var windowBottom = $(window).scrollTop() + $(window).height();
        if (statsTop < windowBottom) {
             animateCounters();
             $(window).off("scroll", animateCounters);
        }
      });
</script>
@endpush
