<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <title>Digitaly Tycoon - About Page</title>
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
              <li><a href="{{ route('about') }}"  class="active">{{ __('navigation.about') }}</a></li>
              <li><a href="{{ route('faqs') }}">{{ __('navigation.faqs') }}</a></li>
              <li class="scroll-to-section"><a href="#contact-form">{{ $aboutPost->contact }}</a></li>
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
            @if($aboutPost)
            <h6>{{ $aboutPost->header_text }}</h6>

            <div class="line-dec"></div>
            <h4>{{ $aboutPost->header_text_item_first	}} <em>{{ $aboutPost->header_text_item_second }}</em></h4>
            <p>

                <p>{{ $aboutPost->header_description }}</p>

            </p>
            <div class="main-button"><a href="{{ route('about') }}">{{ $aboutPost->button_first }}</a></div>
            <span>-</span>
            <div class="second-button"><a href="{{ route('faqs') }}">{{ $aboutPost->button_second }}</a></div>
          </div>
        </div>
              @else
              <p>Prevod ne postoji u bazi podataka.</p>
              @endif
        <div class="col-lg-5 align-self-center">
          <img src="{{ asset('frontend/assets/images/about-us-image.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </div>

  <div class="video-info section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="video-thumb">
            <img src="assets/images/video-thumb.jpg" alt="">
            <a href="http://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h2>{{ $aboutPost-> section_heading_title_first	}} &amp; {{ $aboutPost-> section_heading_title_second }}</h2>
            <div class="line-dec"></div>
            <p>
              {{ $aboutPost->section_heading_description }}
            </p>
          </div>
          <div class="skills">
            <div class="skill-slide marketing">
              <div class="fill"></div>
              <h6>{{ $aboutPost->skill_first }}</h6>
              <span>90%</span>
            </div>
            <div class="skill-slide digital">
              <div class="fill"></div>
              <h6>{{ $aboutPost->skill_second }}</h6>
              <span>80%</span>
            </div>
            <div class="skill-slide media">
              <div class="fill"></div>
              <h6>{{ $aboutPost->skill_third }}</h6>
              <span>95%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="happy-clients section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            @if($aboutPost)
            <h2>{{ $aboutPost->step_first }} <em>{{ $aboutPost->step_second }} </em> &amp; <span>{{ $aboutPost->step_third }}</span></h2>
            @else
                  <p>Tekst za "O nama" stranicu ne postoji u bazi.</p>
            @endif
            <div class="line-dec"></div>

              @if($aboutPost && $aboutPost->exists) {{-- Proveravamo da li je model zaista dohvaćen iz baze --}}

                  <p>{{ $aboutPost->section_text }}</p>

                  {{-- <img src="{{ $aboutPost->menu_first_image }}" alt="Menu First Image"> --}}

              @else
                  <p>Tekst za "O nama" stranicu ne postoji u bazi.</p>
              @endif
            <p>

            </p>
              <div class="line-dec"></div>

          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">

                    @if($aboutPost)
                    <div class="active"><span>{{ $aboutPost->menu_first_title }}</span></div>
                    <div><span>{{ $aboutPost->menu_second_title }}</span></div>
                    <div><span>{{ $aboutPost->menu_third_title }}</span></div>
                    <div class="last-item"><span>{{ $aboutPost->menu_fourth_title }}</span></div>
                    @else
                    <p>Tekst za "O nama" stranicu ne postoji u bazi.</p>
                    @endif
                  </div>
                </div>
                <div class="col-lg-12">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="row">
                          <div class="col-lg-7">

                          @if($aboutPost && $aboutPost->exists)

                            <h4>{{ $aboutPost->menu_first_subtitle }}</h4>
                          <div class="line-dec"></div>
                            <p>{{ $aboutPost->menu_first_description }}</p>

                            @else
                              <p>Tekst za "O nama" stranicu ne postoji u bazi.</p>
                            @endif
                          <div class="line-dec"></div>

                            <div class="info">
                              <span>Website Design</span>
                              <span>User Interface</span>
                              <span>User Experience</span>
                              <span class="last-span">Digital Agency</span>
                            </div>
                          </div>
                          <div class="col-lg-5 align-self-center">
                            <img src="{{ asset('frontend/assets/images/happyclient-01.jpg') }}" alt="">
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="row">
                          <div class="col-lg-7">

                          <div class="line-dec"></div>

                          @if($aboutPost && $aboutPost->exists)

                            <h4>{{ $aboutPost->menu_second_subtitle }}</h4>

                            <p>{{ $aboutPost->menu_second_description }}</p>

                          @else
                            <p>Tekst za "O nama" stranicu ne postoji u bazi.</p>
                          @endif

                          <div class="line-dec"></div>

                            <div class="info">
                              <span>HTML CSS</span>
                              <span>Bootstrap 5</span>
                              <span>TemplateMo</span>
                              <span class="last-span">Development</span>
                            </div>
                          </div>
                          <div class="col-lg-5 align-self-center">
                            <img src="{{ asset('frontend/assets/images/happyclient-01.jpg') }}" alt="">
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="row">
                          <div class="col-lg-7">

                          <div class="line-dec"></div>

                          @if($aboutPost && $aboutPost->exists)

                            <h4>{{ $aboutPost->menu_third_subtitle }}</h4>

                            <p>{{ $aboutPost->menu_third_description }}</p>

                          @else
                            <p>Tekst za "O nama" stranicu ne postoji u bazi.</p>
                          @endif

                          <div class="line-dec"></div>

                            <div class="info">
                              <span>SEO Trend</span>
                              <span>Digital Agency</span>
                              <span>Best Template</span>
                              <span class="last-span">Development</span>
                            </div>
                          </div>
                          <div class="col-lg-5 align-self-center">
                            <img src="{{ asset('frontend/assets/images/happyclient-01.jpg') }}" alt="">
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="row">
                          <div class="col-lg-7">

                          <div class="line-dec"></div>

                          @if($aboutPost && $aboutPost->exists)

                            <h4>{{ $aboutPost->menu_fourth_subtitle }}</h4>

                            <p>{{ $aboutPost->menu_fourth_description }}</p>

                          @else
                            <p>Tekst za "O nama" stranicu ne postoji u bazi.</p>
                          @endif

                          <div class="line-dec"></div>

                            <div class="info">
                              <span>Data Analysis</span>
                              <span>SEO Trend</span>
                              <span>Templates</span>
                              <span class="last-span">Research</span>
                            </div>
                          </div>
                          <div class="col-lg-5 align-self-center">
                            <img src="{{ asset('frontend/assets/images/happyclient-01.jpg') }}" alt="">
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="cta section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h4>{{ $aboutPost->cta_section_item_first }} &amp; {{ $aboutPost->cta_section_item_second }}<br>{{ $aboutPost->cta_section_item_third }} &amp; {{ $aboutPost->cta_section_item_fourth }}</h4>
        </div>
        <div class="col-lg-4">

                @if(session('success'))
                  <div class="alert alert-success text-green-700 bg-green-100 border border-green-300 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                  </div>
                @endif

                @if($aboutPost)
                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>{{ $aboutPost->cta_section_contact_item_first }}</em> &amp; {{ $aboutPost->cta_section_contact_item_second }} <span>{{ $aboutPost->cta_section_contact_item_third }}</span></h2>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="{{ $aboutPost->firstname }}..." autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="surname" name="surname" id="surname" placeholder="{{ $aboutPost->lastname }}..."
                          autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="{{ $aboutPost->email }}..."
                          required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" id="message" placeholder="{{ $aboutPost->message }}"></textarea>
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
                        <button type="submit" id="form-submit" class="orange-button">{{ $aboutPost->send_message }}</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
                @else
                  <p>Tekst nije pronadjen u bazi...</p>
                @endif
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
