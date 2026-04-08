@extends('layouts.app')

@section('title', 'Package Details')

@section('content')
    <header id="page-hero">
      <img
        src="https://picsum.photos/seed/details-page-hero/1920/800"
        alt="Scenic view of mountain and sea"
      />
      <h1 class="hero-banner-title" id="heroCountryName">LOADING...</h1>
    </header>
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="mb-4">
              <h2
                class="display-5 fw-bold text-deep-navy mb-1"
                id="packageTitle"
              >
                Loading Package...
              </h2>
              <h3 class="text-primary-custom fw-bold" id="packagePrice">
                $0
                <span class="small text-muted fw-normal" id="packageTagline"
                  >per person</span
                >
              </h3>
              <p class="lead text-muted mt-3" id="packageDescription">
                Loading details...
              </p>
              <hr />
            </div>

            <section id="package-slider" class="mb-5">
              <h4 class="text-deep-navy mb-3">Photo Gallery</h4>
              <div
                id="packageImageSlider"
                class="carousel slide"
                data-bs-ride="carousel"
              >
                <div class="carousel-indicators" id="sliderIndicators"></div>
                <div class="carousel-inner" id="sliderInner"></div>
                <button
                  class="carousel-control-prev"
                  type="button"
                  data-bs-target="#packageImageSlider"
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
                  data-bs-target="#packageImageSlider"
                  data-bs-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </section>

            <section id="itinerary" class="mb-5">
              <h3 class="text-deep-navy mb-3">Detailed Itinerary</h3>
              <div class="accordion" id="itineraryAccordion"></div>
            </section>

            <section id="inclusions" class="mb-5 row">
              <div class="col-md-6 mb-4 mb-md-0">
                <h3 class="text-success mb-3">
                  <i class="fas fa-check-circle me-2"></i> Included
                </h3>
                <ul class="include-list" id="includedList"></ul>
              </div>
              <div class="col-md-6">
                <h3 class="text-danger mb-3">
                  <i class="fas fa-times-circle me-2"></i> Excluded
                </h3>
                <ul class="exclude-list" id="excludedList"></ul>
              </div>
            </section>
          </div>
        </div>

        <section id="booking-form-wrapper" class="mb-5">
          <div id="booking-form-card">
            <div
              id="bookingMessageContainer"
              class="d-none text-center small mb-3"
            ></div>
            <h4 class="card-title text-center text-primary-custom fw-bold mb-4">
              Secure Your Booking Now
            </h4>
            <form
              id="inquiryForm"
              class="row g-3"
              method="POST"
              action="{{ route('book') }}"
            >
              @csrf
              <input
                type="hidden"
                id="package_id"
                name="package_id"
                value=""
                required
              />

              <div class="col-md-6">
                <label for="full_name" class="form-label small fw-bold"
                  >Full Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="full_name"
                  name="full_name"
                  placeholder="Jane Doe"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label small fw-bold"
                  >Email Address</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="email@example.com"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="phone" class="form-label small fw-bold"
                  >Phone Number</label
                >
                <input
                  type="tel"
                  class="form-control"
                  id="phone"
                  name="phone"
                  placeholder="+1 (555) 123-4567"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="travelers" class="form-label small fw-bold"
                  >Number of Travelers</label
                >
                <select
                  class="form-select"
                  id="travelers"
                  name="travelers"
                  required
                >
                  <option value="">Select...</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3-5</option>
                  <option>6+</option>
                </select>
              </div>
              <div class="col-12">
                <label for="start_date" class="form-label small fw-bold"
                  >Preferred Start Date</label
                >
                <input
                  type="date"
                  class="form-control"
                  id="start_date"
                  name="start_date"
                  required
                />
              </div>
              <div class="col-12">
                <label for="special_requests" class="form-label small fw-bold"
                  >Special Requests</label
                >
                <textarea
                  class="form-control"
                  id="special_requests"
                  name="special_requests"
                  rows="3"
                  placeholder="Dietary restrictions, flight preferences, etc."
                ></textarea>
              </div>
              <div class="col-12 mt-4">
                <button
                  type="submit"
                  class="btn btn-primary-custom w-100 py-2 fw-bold"
                >
                  Send Booking Inquiry
                </button>
              </div>
              <p class="text-center small text-muted mt-3 mb-0">
                We protect your privacy. A confirmation will be sent via email.
              </p>
            </form>
          </div>
        </section>
        
        <section class="mt-5 mb-5">
           <div class="row">
               <div class="col-12">
                   <h4 class="text-deep-navy fw-bold mb-4">You Might Also Like</h4>
                   <div class="row row-cols-1 row-cols-md-3 g-4" id="relatedPackagesList">
                       <!-- Related packages injected by JS -->
                   </div>
               </div>
           </div>
        </section>

      </div>
    </main>
@endsection

@push('scripts')
<script>
      // --- MOCK PACKAGE DATA ---
      const packageData = {
        venice: {
          title: "Venice & Rome Grand Tour",
          country: "Italy",
          countryId: "italy",
          price: "$3,500",
          tagline: "7-day luxury journey across Italy.",
          description:
            "Experience the timeless beauty of Italy with a comprehensive tour of Venice's canals, Rome's ancient wonders, renaissance art, and culinary delights. This all-inclusive package covers top-tier accommodation and guided excursions.",
          images: [
            "https://picsum.photos/seed/detail-venice1/1000/450",
            "https://picsum.photos/seed/detail-venice2/1000/450",
            "https://picsum.photos/seed/detail-venice3/1000/450",
          ],
          itinerary: [
            {
              title: "Day 1: Arrival in Venice & Gondola Ride",
              icon: "fas fa-check-circle",
              details:
                "Transfer from VCE. Private gondola ride and welcome dinner.",
            },
            {
              title: "Day 2: Doge's Palace & St. Mark's Square",
              icon: "fas fa-route",
              details:
                "Morning guided tour of Doge's Palace and St. Mark's Basilica.",
            },
            {
              title: "Day 3: Train to Rome",
              icon: "fas fa-train",
              details:
                "Morning high-speed train journey to Rome. Check-in near the Trevi Fountain.",
            },
            {
              title: "Day 4: Ancient Rome & Colosseum",
              icon: "fas fa-university",
              details:
                "Full-day guided tour of the Colosseum, Roman Forum, and Palatine Hill.",
            },
            {
              title: "Day 5: Vatican City & Departure",
              icon: "fas fa-crosshairs",
              details: "Morning tour of Vatican City. Evening transfer to FCO.",
            },
          ],
          included: [
            "Roundtrip flights (Economy)",
            "5 Nights in 4-star hotels",
            "Daily breakfast & 2 gourmet dinners",
            "All transfers",
            "Entry to all major sites",
          ],
          excluded: [
            "Alcoholic beverages during meals",
            "Visa and travel insurance",
            "Gratuities for local guides",
          ],
        },
        himalaya: {
          title: "Himalayan Base Camp Trek",
          country: "Nepal",
          countryId: "nepal",
          price: "$1,800",
          tagline: "10-day epic trek to the foothills of the Himalayas.",
          description:
            "A challenging but rewarding journey to experience the majesty of the Himalayas. Expert local guides, all equipment rentals included. Focus on altitude acclimatization and responsible trekking.",
          images: [
            "https://picsum.photos/seed/detail-himalaya1/1000/450",
            "https://picsum.photos/seed/detail-himalaya2/1000/450",
            "https://picsum.photos/seed/detail-himalaya3/1000/450",
          ],
          itinerary: [
            {
              title: "Day 1-2: Kathmandu Arrival & Flight to Lukla",
              icon: "fas fa-mountain",
              details:
                "Arrive in Kathmandu, followed by a scenic flight to Lukla and first short trek to Phakding.",
            },
            {
              title: "Day 3-5: Trekking to Namche Bazaar & Acclimatization",
              icon: "fas fa-campground",
              details:
                "Ascent to Namche Bazaar (Sherpa Capital). Rest day for acclimatization hikes.",
            },
            {
              title: "Day 6-8: Ascent to Base Camp",
              icon: "fas fa-person-hiking",
              details:
                "Trek through Tengboche and Dingboche, reaching the viewing point near Base Camp on Day 7.",
            },
            {
              title: "Day 9-10: Descent and Departure",
              icon: "fas fa-plane-departure",
              details:
                "Rapid descent towards Lukla. Farewell dinner and morning flight back to Kathmandu.",
            },
          ],
          included: [
            "Internal flights (Kathmandu-Lukla return)",
            "9 Nights in teahouses/lodges",
            "All meals during the trek",
            "Experienced guide",
            "Permits and national park fees",
          ],
          excluded: [
            "Main international flights",
            "Gear rental (sleeping bag, boots)",
            "Bottled water/snacks",
            "Personal spending money",
          ],
        },
        kyoto: {
          title: "Ancient Kyoto Temples",
          country: "Japan",
          countryId: "japan-kyoto",
          price: "$2,200",
          tagline: "5-day cultural immersion in Japan's historic heart.",
          description:
            "Immerse yourself in the serene beauty and rich history of Kyoto. Visit iconic temples, traditional gardens, and experience a glimpse of ancient Japan.",
          images: [
            "https://picsum.photos/seed/detail-kyoto1/1000/450",
            "https://picsum.photos/seed/detail-kyoto2/1000/450",
            "https://picsum.photos/seed/detail-kyoto3/1000/450",
          ],
          itinerary: [
            {
              title: "Day 1: Arrival & Nishiki Market",
              icon: "fas fa-landmark",
              details:
                "Arrive at Kansai International (KIX). Check-in and explore the bustling Nishiki Market.",
            },
            {
              title: "Day 2: Golden Pavilion & Zen Gardens",
              icon: "fas fa-pagelines",
              details:
                "Visit Kinkaku-ji (Golden Pavilion) and Ryoan-ji Temple's rock garden.",
            },
            {
              title: "Day 3: Fushimi Inari & Tea Ceremony",
              icon: "fas fa-torii-gate",
              details:
                "Hike through the thousands of red torii gates at Fushimi Inari. Participate in a traditional tea ceremony.",
            },
            {
              title: "Day 4: Gion District",
              icon: "fas fa-mask",
              details:
                "Explore the historic Gion district, seeking out geisha and traditional wooden machiya houses.",
            },
            {
              title: "Day 5: Departure",
              icon: "fas fa-plane-departure",
              details: "Transfer to KIX for departure.",
            },
          ],
          included: [
            "4 Nights in traditional Ryokan stay",
            "Daily breakfast",
            "Bullet train tickets (Roundtrip to Kyoto)",
            "Guided temple tours",
            "Tea ceremony experience",
          ],
          excluded: ["International airfare", "Lunch and dinner", "Souvenirs"],
        },
        florida: {
          title: "Florida Theme Park Adventure",
          country: "USA (Florida)",
          countryId: "usa-florida",
          price: "$1,200",
          tagline: "7-day family trip including all major theme parks.",
          description:
            "Create unforgettable memories with your family at Florida's world-famous theme parks. This budget-friendly package is packed with thrills, magic, and entertainment for all ages. Accommodation is near the major attractions.",
          images: [
            "https://picsum.photos/seed/detail-florida1/1000/450",
            "https://picsum.photos/seed/detail-florida2/1000/450",
            "https://picsum.photos/seed/detail-florida3/1000/450",
          ],
          itinerary: [
            {
              title: "Day 1: Arrival & Magic Kingdom",
              icon: "fas fa-magic",
              details:
                "Arrive in Orlando, check-in, and start your adventure with entry to Magic Kingdom Park.",
            },
            {
              title: "Day 2-4: Thrill Rides & Water Parks",
              icon: "fas fa-roller-coaster",
              details:
                "Dedicated days for exploring other major theme parks and a popular water park.",
            },
            {
              title: "Day 5: Shopping & Relaxation",
              icon: "fas fa-shopping-bag",
              details:
                "Free day for souvenir shopping at Disney Springs or relaxing by the hotel pool.",
            },
            {
              title: "Day 6-7: Final Park & Departure",
              icon: "fas fa-plane-arrival",
              details:
                "Visit Universal Studios. Morning departure to Orlando International Airport (MCO) on Day 7.",
            },
          ],
          included: [
            "7 Days / 6 Nights accommodation",
            "Entry to 3 major theme parks",
            "Daily breakfast",
            "Shuttle service to/from parks",
            "Airport transfers (MCO)",
          ],
          excluded: [
            "Lunch and dinner meals",
            "Flight tickets to/from Orlando",
            "Optional premium experiences (e.g., VIP tours)",
            "Travel insurance",
          ],
        },
        safari: {
          title: "South African Wildlife Safari",
          country: "South Africa",
          countryId: "south-africa",
          price: "$4,500",
          tagline: "14-day thrilling safari adventure in Kruger National Park.",
          description:
            "Embark on a thrilling safari adventure through South Africa's iconic national parks. Witness the Big Five in their natural habitat and experience the wild heart of Africa. Luxury tented camps and professional rangers provided.",
          images: [
            "https://picsum.photos/seed/detail-safari1/1000/450",
            "https://picsum.photos/seed/detail-safari2/1000/450",
            "https://picsum.photos/seed/detail-safari3/1000/450",
          ],
          itinerary: [
            {
              title: "Day 1-3: Cape Town Exploration",
              icon: "fas fa-city",
              details:
                "Arrive in Cape Town. Visit Table Mountain and Robben Island. Wine tasting tour.",
            },
            {
              title: "Day 4: Flight to Kruger & First Game Drive",
              icon: "fas fa-plane",
              details:
                "Morning flight to Kruger area. Afternoon check-in to luxury camp and first sunset game drive.",
            },
            {
              title: "Day 5-10: Safari Immersion",
              icon: "fas fa-camera-retro",
              details:
                "Daily morning and evening game drives with expert rangers. Tracking the Big Five.",
            },
            {
              title: "Day 11-14: Beach Relaxation & Departure",
              icon: "fas fa-umbrella-beach",
              details:
                "Transfer to the Eastern Cape coast for beach relaxation before departing from Port Elizabeth.",
            },
          ],
          included: [
            "International and internal flights",
            "Luxury camp stays",
            "All meals during safari",
            "Game drive permits and fees",
            "Wine tasting tour",
          ],
          excluded: ["Visa fees", "Souvenirs", "Alcohol outside meal plan"],
        },
        maldives: {
          title: "Maldives Water Bungalow Stay",
          country: "Maldives",
          countryId: "maldives",
          price: "$2,800",
          tagline: "5-day indulgent retreat in a private water bungalow.",
          description:
            "Indulge in unparalleled luxury with an exquisite stay in a private water bungalow in the Maldives. Crystal-clear waters, white-sand beaches, and ultimate relaxation await. Perfect for honeymoons and tranquil escapes.",
          images: [
            "https://picsum.photos/seed/detail-maldives1/1000/450",
            "https://picsum.photos/seed/detail-maldives2/1000/450",
            "https://picsum.photos/seed/detail-maldives3/1000/450",
          ],
          itinerary: [
            {
              title: "Day 1: Arrival & Check-in",
              icon: "fas fa-cocktail",
              details:
                "Seaplane transfer to your private island resort. Welcome drink and check-in to your overwater bungalow.",
            },
            {
              title: "Day 2: Snorkeling & Coral Reefs",
              icon: "fas fa-fish",
              details:
                "Guided snorkeling tour to explore vibrant coral reefs and marine life.",
            },
            {
              title: "Day 3: Sunset Cruise & Spa",
              icon: "fas fa-ship",
              details:
                "Afternoon at the resort spa. Evening sunset cruise on a traditional Dhoni boat.",
            },
            {
              title: "Day 4: Leisure & Fine Dining",
              icon: "fas fa-utensils",
              details:
                "Full day at leisure. Private beachfront dining experience.",
            },
            {
              title: "Day 5: Departure",
              icon: "fas fa-plane-departure",
              details:
                "Morning seaplane transfer to Male International Airport (MLE).",
            },
          ],
          included: [
            "Seaplane transfers (return)",
            "4 Nights in luxury water bungalow",
            "Half-board (breakfast and dinner)",
            "Snorkeling excursion",
            "Sunset cruise",
          ],
          excluded: [
            "International airfare",
            "Lunch meals",
            "Spa treatments",
            "Tips/Gratuities",
          ],
        },
      };

      function loadPackageDetails(packageId) {
        const data = packageData[packageId];

        if (!data) {
          $("#packageTitle").text("Error: Package Not Found");
          $("#packageDescription").text(
            "The requested package ID is invalid. Please return to the Packages page."
          );
          $("#heroCountryName").text("ERROR");
          return;
        }

        $("#package_id").val(packageId);

        // 1. Load Main Details
        $("#packageTitle").text(data.title);
        $("#packagePrice").html(
          data.price +
            ' <span class="small text-muted fw-normal" id="packageTagline">' +
            data.tagline +
            "</span>"
        );
        $("#packageDescription").text(data.description);

        // 2. Load Hero Banner Title (Country Name Only)
        const heroTitle =
          data.country.split("(")[0].trim().toUpperCase() || "DETAILS";
        $("#heroCountryName").text(heroTitle);

        // 3. Load Image Slider
        let sliderIndicators = "";
        let sliderInner = "";
        data.images.forEach((imgUrl, index) => {
          const activeClass = index === 0 ? "active" : "";
          sliderIndicators += `<button type="button" data-bs-target="#packageImageSlider" data-bs-slide-to="${index}" class="${activeClass}" aria-label="Slide ${
            index + 1
          }"></button>`;
          sliderInner += `
                      <div class="carousel-item ${activeClass}">
                          <img src="${imgUrl}" class="d-block w-100" alt="${
            data.title
          } Image ${index + 1}">
                      </div>`;
        });
        $("#sliderIndicators").html(sliderIndicators);
        $("#sliderInner").html(sliderInner);

        // 4. Load Itinerary Accordion
        let itineraryHtml = "";
        data.itinerary.forEach((item, index) => {
          const activeShow = index === 0 ? "show" : "";
          const collapsedClass = index === 0 ? "" : "collapsed";
          const expanded = index === 0 ? "true" : "false";

          itineraryHtml += `
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="heading${index}">
                               <button class="accordion-button ${collapsedClass}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index}" aria-expanded="${expanded}" aria-controls="collapse${index}">
                                   <i class="${item.icon} me-3"></i> ${item.title}
                               </button>
                          </h2>
                          <div id="collapse${index}" class="accordion-collapse collapse ${activeShow}" aria-labelledby="heading${index}" data-bs-parent="#itineraryAccordion">
                              <div class="accordion-body">
                                  ${item.details}
                              </div>
                          </div>
                      </div>`;
        });
        $("#itineraryAccordion").html(itineraryHtml);

        // 5. Load Included/Excluded Lists
        let includedHtml = data.included
          .map((item) => `<li><i class="fas fa-check-circle"></i> ${item}</li>`)
          .join("");
        let excludedHtml = data.excluded
          .map((item) => `<li><i class="fas fa-times-circle"></i> ${item}</li>`)
          .join("");

        $("#includedList").html(includedHtml);
        $("#excludedList").html(excludedHtml);

        // 6. Load Related Packages
        const relatedIds = Object.keys(packageData)
          .filter((id) => id !== packageId)
          .slice(0, 3);
        
        let relatedHtml = relatedIds
          .map((id) => {
            const p = packageData[id];
            const durationMatch = p.tagline.match(/(\d+)\s+day/i);
            const days = durationMatch ? durationMatch[1] : "?";

            return `
                      <div class="col">
                          <a href="{{ url('/package-details') }}/${id}" class="text-decoration-none text-dark">
                              <div class="card related-package-card shadow-sm h-100">
                                  <img src="https://picsum.photos/seed/related-${id}/400/180" class="card-img-top" alt="${p.title}">
                                  <div class="card-body">
                                      <h5 class="card-title fw-bold text-primary-custom">${p.title}</h5>
                                      <p class="card-text small text-muted mb-1"><i class="fas fa-calendar-alt me-1"></i> ${days} Days</p>
                                      <p class="card-text fw-bold">${p.price}</p>
                                  </div>
                              </div>
                          </a>
                      </div>`;
          })
          .join("");

        $("#relatedPackagesList").html(
          relatedHtml ||
            '<div class="col-12"><p class="text-center text-muted">No related packages found.</p></div>'
        );
      }

      $(document).ready(function () {
        const packageId = "{{ $id }}"; 
        loadPackageDetails(packageId);
        
        // Simple front-end validation handling override by Default Browser validation
        // But we add loop for Bootstrap styling
         $("#inquiryForm").on("submit", function (e) {
             if(!this.checkValidity()){
                 e.preventDefault();
                 e.stopPropagation();
                 $(this).addClass("was-validated");
             }
         });
      });
</script>
@endpush
