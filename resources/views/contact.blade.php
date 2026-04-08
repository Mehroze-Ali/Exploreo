@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <header id="page-hero">
      <img
        src="https://picsum.photos/seed/contact-page-hero/1920/800"
        alt="Scenic view of telephone lines and connection"
      />
      <h1 class="hero-banner-title">CONTACT</h1>
    </header>
    <main class="py-5">
      <div class="container">
        <h2 class="text-center display-5 fw-bold text-deep-navy mb-4">
          We're Here to <span class="text-primary-custom">Help You Plan</span>
        </h2>
        <p class="text-center text-muted mb-5">
          Have questions about a destination or need custom itinerary advice?
          Reach out!
        </p>

        <div class="row mb-5">
          <div class="col-12">
            <div id="contact-form-wrapper">
              <div id="contact-form-card">
                <h3 class="text-deep-navy mb-4 fw-bold text-start">
                  Send Us a Message
                </h3>

                <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                  @csrf
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="contactName" class="form-label small fw-bold"
                        >Full Name</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        name="contactName"
                        id="contactName"
                        placeholder="Your Full Name"
                        required
                        value="{{ old('contactName') }}"
                      />
                      @error('contactName') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="contactEmail" class="form-label small fw-bold"
                        >Email Address</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        name="contactEmail"
                        id="contactEmail"
                        placeholder="email@example.com"
                        required
                        value="{{ old('contactEmail') }}"
                      />
                      @error('contactEmail') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="contactPhone" class="form-label small fw-bold"
                        >Phone Number</label
                      >
                      <input
                        type="tel"
                        class="form-control"
                        name="contactPhone"
                        id="contactPhone"
                        placeholder="+1 (555) 123-4567"
                        value="{{ old('contactPhone') }}"
                      />
                    </div>
                    <div class="col-md-6">
                      <label
                        for="contactSubject"
                        class="form-label small fw-bold"
                        >Subject / Inquiry Type</label
                      >
                      <select
                        class="form-select"
                        name="contactSubject"
                        id="contactSubject"
                        required
                      >
                        <option value="">Select...</option>
                        <option value="General Inquiry">General Inquiry</option>
                        <option value="Custom Trip Planning">Custom Trip Planning</option>
                        <option value="Existing Booking Support">Existing Booking Support</option>
                        <option value="Partnership">Partnership</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label
                        for="contactMessage"
                        class="form-label small fw-bold"
                        >Your Message</label
                      >
                      <textarea
                        class="form-control"
                        name="contactMessage"
                        id="contactMessage"
                        rows="5"
                        placeholder="Tell us about your travel dreams..."
                        required
                      >{{ old('contactMessage') }}</textarea>
                      @error('contactMessage') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12 mt-4">
                      <button
                        type="submit"
                        class="btn btn-primary-custom w-100 py-3 fw-bold"
                      >
                        Send Message
                      </button>
                    </div>
                  </div>
                </form>

                <div id="submissionMessage" class="mt-4 text-center"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row g-4 mb-5">
          <div class="col-lg-4 col-md-6">
            <div class="info-block">
              <i class="fas fa-phone-alt"></i>
              <h5 class="fw-bold">Call Us</h5>
              <p class="mb-1">
                General Inquiries:
                <a href="tel:+15551234567" class="fw-bold text-decoration-none"
                  >+1 (555) 123-4567</a
                >
              </p>
              <p class="mb-0">
                Support Line:
                <a href="tel:+15559876543" class="fw-bold text-decoration-none"
                  >+1 (555) 987-6543</a
                >
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="info-block">
              <i class="fas fa-envelope"></i>
              <h5 class="fw-bold">Email Us</h5>
              <p class="mb-1">
                General:
                <a
                  href="mailto:info@wanderlust.com"
                  class="fw-bold text-decoration-none"
                  >info@wanderlust.com</a
                >
              </p>
              <p class="mb-0">
                Support:
                <a
                  href="mailto:support@wanderlust.com"
                  class="fw-bold text-decoration-none"
                  >support@wanderlust.com</a
                >
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-12">
            <div class="info-block">
              <i class="fas fa-map-marker-alt"></i>
              <h5 class="fw-bold">Visit Us / Follow Us</h5>
              <p class="mb-2">
                123 Global Explorer Tower, Suite 500, Explorer City, Earth
              </p>
              <div class="mt-3">
                <a href="#" class="social-icon-contact"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a href="#" class="social-icon-contact"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a href="#" class="social-icon-contact"
                  ><i class="fab fa-instagram"></i
                ></a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h3 class="text-deep-navy text-center mb-4 fw-bold">
              Find Our <span class="text-primary-custom">Location</span>
            </h3>
            <div class="map-responsive">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.72895693635!2d-0.24861214041797893!3d51.528558241940984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2s!4v1677893206000!5m2!1sen!2s"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const status = sessionStorage.getItem('contactSubmissionStatus');
    if (status) {
        const $msg = $('#submissionMessage');
        if (status === 'success') {
            $msg.addClass('bg-success text-white').text('Your message has been sent successfully! We will contact you soon.').slideDown();
        } else {
            $msg.addClass('bg-danger text-white').text('There was an error processing your request. Please check your inputs.').slideDown();
        }
        sessionStorage.removeItem('contactSubmissionStatus');
    }
});
</script>
@endpush
