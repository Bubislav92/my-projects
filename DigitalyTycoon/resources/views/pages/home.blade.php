<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <title>Digitaly Tycoon Web Development</title>
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
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-9">
          <div class="left-info">


    <!-- Dropdown za jezike -->


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
            <a href="{{ route('about') }}" class="logo">
              <img src="{{ asset('frontend/assets/images/dglogo.png') }}" alt="" style="max-width: 112px;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->

            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">{{ __('navigation.home') }}</a></li>
              <li class="scroll-to-section"><a href="#services">{{ __('navigation.services') }}</a></li>
              <li class="scroll-to-section"><a href="#projects">{{ __('navigation.projects') }}</a></li>
              <li class="scroll-to-section"><a href="#infos">{{ __('navigation.infos') }}</a></li>
              <li class="scroll-to-section"><a href="#contact">{{ __('navigation.contact') }}</a></li>
              <li><a href="{{ route('about') }}">{{ __('navigation.about') }}</a></li>
            </ul>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="caption header-text">
            <h6>{{ $homePost->banner_title }} {{ $homePost->banner_subtitle }}</h6>
            <div class="line-dec"></div>
            <h4>{{ $homePost->banner_text_item_first }} <em>{{ $homePost->banner_text_item_second }}</em> {{ $homePost->banner_text_item_third }}<span>{{ $homePost->banner_text_item_fourth }}</span></h4>
            <p>{{ $homePost->banner_description}}</p>
            <div class="main-button scroll-to-section"><a href="#services">{{ $homePost->button_first }}</a></div>
            <span>-</span>
            <div class="second-button"><a href="{{ route('faqs') }}">{{ $homePost->button_second }}</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h2>{{ $homePost->service_title_first }} <em>{{ $homePost->service_title_second }}</em> &amp;
                  <span>{{ $homePost->service_title_third }}</span> {{ $homePost->service_title_fourth }}
                </h2>
                <div class="line-dec"></div>
                <p>{{ $homePost->service_description }}</p>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="{{ asset('frontend/assets/images/services-01.jpg') }}" alt="discover SEO" class="templatemo-feature">
                </div>
                <h4>{{ $homePost->service_item_first }}</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="{{ asset('frontend/assets/images/services-02.jpg') }}" alt="data analysis" class="templatemo-feature">
                </div>
                <h4>{{ $homePost->service_item_second }}</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="{{ asset('frontend/assets/images/services-03.jpg') }}" alt="precise data" class="templatemo-feature">
                </div>
                <h4>{{ $homePost->service_item_third }}</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="{{ asset('frontend/assets/images/services-04.jpg') }}" alt="SEO marketing" class="templatemo-feature">
                </div>
                <h4>{{ $homePost->service_item_fourth }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="projects section" id="projects">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>{{ $homePost->project_title_first }} <em>{{ $homePost->project_title_second }}</em> &amp; <span>{{ $homePost->project_title_third }}</span></h2>
            <div class="line-dec"></div>
            <p>{{ $homePost->project_description }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-features owl-carousel">
            <div class="item">
              <img src="{{ asset('frontend/assets/images/project1.png') }}" alt="">
              <div class="down-content">
                <h4>{{ $homePost->project_subtitle_first }}</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="{{ asset('frontend/assets/images/project2.png') }}" alt="">
              <div class="down-content">
                <h4>{{ $homePost->project_subtitle_second }}</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="{{ asset('frontend/assets/images/project3.png') }}" alt="">
              <div class="down-content">
                <h4>{{ $homePost->project_subtitle_third }}</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="{{ asset('frontend/assets/images/project4.png') }}" alt="">
              <div class="down-content">
                <h4>{{ $homePost->project_subtitle_fourth }}</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="{{ asset('frontend/assets/images/project5.png') }}" alt="">
              <div class="down-content">
                <h4>{{ $homePost->project_subtitle_fifth }}</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
            <div class="item">
              <img src="{{ asset('frontend/assets/images/project6.png') }}" alt="">
              <div class="down-content">
                <h4>{{ $homePost->project_subtitle_sixth }}</h4>
                <a href="#"><i class="fa fa-link"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="infos section" id="infos">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-content">
            <div class="row">
              <div class="col-lg-6">
                <div class="left-image">
                  <img src="{{ asset('frontend/assets/images/left-infos.jpg') }}" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section-heading">
                  <h2>{{ $homePost->info_title_first }} <em>{{ $homePost->info_title_second }}</em> &amp; <h2>{{ $homePost->info_title_third }} <em>{{ $homePost->info_title_fourth }}</em>
                  <div class="line-dec"></div>
                  <p>{{ $homePost->info_description_first }}</p>
                </div>
                <div class="skills">
                  <div class="skill-slide marketing">
                    <div class="fill"></div>
                    <h6>{{ $homePost->skill_step_first }}</h6>
                    <span>90%</span>
                  </div>
                  <div class="skill-slide digital">
                    <div class="fill"></div>
                    <h6>{{ $homePost->skill_step_second }}</h6>
                    <span>80%</span>
                  </div>
                  <div class="skill-slide media">
                    <div class="fill"></div>
                    <h6>{{ $homePost->skill_step_third }}</h6>
                    <span>95%</span>
                  </div>
                </div>
                <p class="more-info">{{ $homePost->info_description_second }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-us-content">
            <div class="row">
              <div class="col-lg-4">
                <div class="section-heading">
                  <h2><em>{{ $homePost->cta_section_item_first }}</em> &amp; {{ $homePost->cta_section_item_second }} <span>{{ $homePost->cta_section_item_third }}</span></h2>
                </div>
                <h6>{{ __('our_partners.find_us_on') }}</h6>
                <div class="icon">
                <li><a href="https://www.upwork.com/agencies/1899198109977511065/"><img src="{{ asset('frontend/assets/images/Upwork-logo.svg') }}" alt="discover SEO" class="templatemo-feature"></a></li>

                </div>
                <h6>{{ __('our_partners.hosting_provider') }}</h6>
                <div class="icon">
                <li><a href="https://panel.unlimited.rs/aff.php?aff=578"><img src="{{ asset('frontend/assets/images/unlimited.rs_logo.svg') }}" alt="discover SEO" class="templatemo-feature"></a></li>

                </div>
              </div>

              <div class="col-lg-8">

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
                        <h2><em>{{ $homePost->cta_section_contact_item_first }}</em> &amp; {{ $homePost->cta_section_contact_item_second }} <span>{{ $homePost->cta_section_contact_item_third }}</span></h2>
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
