<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <title>Digitaly Tycoon - FAQ Page</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-tale-seo-agency.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 582 Tale SEO Agency

https://templatemo.com/tm-582-tale-seo-agency

-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Pre-Header Area Start ***** -->
  <div class="pre-header" id="top">
    <div class="container">
      <div class="row">
      <div class="col-lg-8 col-sm-9">
          <div class="left-info">
            <!-- Dropdown za jezike -->
    <div class="language">

<label for="lang">🌍</label>
  <select onchange="window.location.href = this.value"
          style="padding: 8px 30px 8px 12px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #f9f9f9;
                font-size: 16px;
                cursor: pointer;
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                position: relative;
                background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http://www.w3.org/2000/svg%22%20viewBox%3D%220 0 4 5%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M2 0L0 2h4zm0 5L0 3h4z%22/%3E%3C/svg%3E');
                background-repeat: no-repeat;
                background-position: right 10px center;
                background-size: 10px;">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                {{ app()->getLocale() == $localeCode ? 'selected' : '' }}>
                {{ $properties['native'] }}
      </option>
    @endforeach
  </select>

</div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-3">
          <div class="social-icons">
            <ul>
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Pre-Header Area End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{ route('home') }}" class="logo">
              <img src="{{ asset('frontend/assets/images/dglogo.png') }}" alt="" style="max-width: 112px;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
             
            <ul class="nav">
              <li><a href="{{ route('home') }}">{{ __('navigation.home') }}</a></li>
              <li><a href="{{ route('about') }}">{{ __('navigation.about') }}</a></li>
              <li><a href="{{ route('faqs') }}" class="active">{{ __('navigation.faqs') }}</a></li>
              <li class="scroll-to-section"><a href="#steps">{{ __('navigation.infos') }}</a></li>
              <li class="scroll-to-section"><a href="#contact-form">{{ __('navigation.contact') }}</a></li>
            </ul>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 align-self-center">
          <div class="caption  header-text">
            <h6>Digitaly Tycoon Web Development</h6>
            <div class="line-dec"></div>
            <h4>Most Frequently Asked <em>Questions</em> Here <em>?</em></h4>
          </div>
        </div>
        <div class="col-lg-5">
          <img src="{{ asset('frontend/assets/images/faqs-image.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </div>

  <div id="steps" class="happy-steps">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>{{ __('faq.step_title_first') }} {{ __('faq.step_title_second') }} {{ __('faq.step_title_third') }} &amp; {{ __('faq.step_title_fourth') }}</h2>
        </div>
        <div class="col-lg-12">
          <div class="steps">
            <div class="row">
              <div class="col-lg-3">
                <div class="item">
                  <img src="{{ asset('frontend/assets/images/services-01.jpg') }}" alt=""
                    style="max-width: 66px; border-radius: 50%; margin: 0 auto;">
                  <h4>{{ __('faq.step_item_first') }}</h4>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="item">
                  <img src="{{ asset('frontend/assets/images/services-02.jpg') }}" alt=""
                    style="max-width: 66px; border-radius: 50%; margin: 0 auto;">
                  <h4>{{ __('faq.step_item_second') }}</h4>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="item">
                  <img src="{{ asset('frontend/assets/images/services-03.jpg') }}" alt=""
                    style="max-width: 66px; border-radius: 50%; margin: 0 auto;">
                  <h4>{{ __('faq.step_item_third') }}</h4>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="item last-item">
                  <img src="{{ asset('frontend/assets/images/services-04.jpg') }}" alt=""
                    style="max-width: 66px; border-radius: 50%; margin: 0 auto;">
                  <h4>{{ __('faq.step_item_fourth') }}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="most-asked section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Most <em>Frequently</em> Asked <span>Questions</span> ?</h2>
            <div class="line-dec"></div>
            <p>{{ __('faq.faq_section_description') }}</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="accordions is-first-expanded">
            
            @if($faqs)
              @foreach($faqs as $faq)
            <article class="accordion">
              <div class="accordion-head">
                <span>{{ $faq->question }}</span>
                <span class="icon">
                  <i class="icon fa fa-chevron-right"></i>
                </span>
              </div>
              <div class="accordion-body">
                <div class="content">
                  <p>
                    {{ $faq->answer }}
                  </p>
                </div>
              </div>
            </article>
            @endforeach
            @else
              <p>Trenutno nema dostupnih često postavljanih pitanja.</p>
            @endif
            
          </div>
        </div>
        <div class="col-lg-6">

        @if(session('success'))
          <div class="alert alert-success text-green-700 bg-green-100 border border-green-300 px-4 py-2 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

          <form id="contact-form" action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h2><em>{{ __('faq.cta_section_contact_item_first') }}</em> &amp; {{ __('faq.cta_section_contact_item_second') }} <span>{{ __('faq.cta_section_contact_item_third') }}</span></h2>
                </div>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="{{ __('contact.firstname') }} ..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="surname" name="surname" id="surname" placeholder="{{ __('contact.lastname') }} ..."
                    autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="{{ __('contact.email') }} ..."
                    required="">
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="subject" name="subject" id="subject" placeholder="{{ __('contact.subject') }} ..." autocomplete="on">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" id="message" placeholder="{{ __('contact.message') }} "></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">

                  <!-- Render the necessary JavaScript for the reCAPTCHA widget -->
                  {!! NoCaptcha::renderJs() !!}
                                <!-- Display the reCAPTCHA widget -->
                                {!! NoCaptcha::display() !!}
                                <!-- Display validation error message for the reCAPTCHA response -->
                                <span style="color: red;">
                                @if (isset($errors) && $errors->has('g-recaptcha-response'))
                  {{-- Прикажи прву поруку о грешци везану за reCAPTCHA --}}
                  {{ $errors->first('g-recaptcha-response') }}
                  @endif
                                </span>

                                <br>

                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">{{ __('contact.send') }} </button>
                </fieldset>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>

  <div class="cta section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h4>Are You Ready To Work &amp; Develop With Us ?<br>Don't Hesitate &amp; Contact Us !</h4>
        </div>
        <div class="col-lg-4">
            
          
        <h4>Feel free and contact us...</h4>

          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
     <div class="col-lg-12">
        <p>Copyright © 2025 <a href="#">Digitaly Tycoon Web Development</a>. All rights reserved.

          <br>Distribution: <a
            href="https://www.digitalytycoon.com">Digitaly Tycoon</a>
        </p>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/tabs.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/popup.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

  {!! NoCaptcha::renderJs() !!}

</body>

</html>
