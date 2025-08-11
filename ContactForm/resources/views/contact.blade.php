@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

{{-- Prikaz svih grešaka validacije na vrhu forme --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="contact-form" action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="section-heading">
                <h2><em>Contact Us</em> &amp; Get In <span>Touch</span></h2>
            </div>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger mt-1" style="font-size: 0.9em;">{{ $message }}</div>
                @enderror
            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <input type="surname" name="surname" id="surname" placeholder="Your Surname..." autocomplete="on" required value="{{ old('surname') }}">
                @error('surname')
                     <div class="text-danger mt-1" style="font-size: 0.9em;">{{ $message }}</div>
                @enderror
            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required value="{{ old('email') }}">
                 @error('email')
                    <div class="text-danger mt-1" style="font-size: 0.9em;">{{ $message }}</div>
                @enderror
            </fieldset>
        </div>
        <div class="col-lg-6">
            <fieldset>
                <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" value="{{ old('subject') }}">
                 @error('subject')
                    <div class="text-danger mt-1" style="font-size: 0.9em;">{{ $message }}</div>
                @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <textarea name="message" id="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                 @error('message')
                    <div class="text-danger mt-1" style="font-size: 0.9em;">{{ $message }}</div>
                @enderror
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
                <button type="submit" id="form-submit" class="orange-button">Send Message Now</button>
            </fieldset>
        </div>
    </div>
</form>