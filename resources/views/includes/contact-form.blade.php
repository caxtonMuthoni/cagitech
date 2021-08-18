<section class="contact" id="contact-form">
    <div class="contact__bg"></div>

    <div class="contact__form">
        <div class="contact__pad"></div>
        <div class="contact__card">
            <form action="{{route('send')}}" method="post" class="contact_us-form">
                @csrf
                <h3 class="heading-3 mb-sm">Get in touch with Us</h3>
                <div class="contact_us-form-input-group">
                    @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input minlength="5" maxlength="50" type="text" value="{{ old('name') }}" autocomplete="off" required class="contact_us-form-input contact_us-form-input--1 @error('name') is-invalid @enderror" name="name" id="name" placeholder="Fullname">
                    <label class="contact_us-form-label" for="name">Fullname</label>
                </div>

                <div class="contact_us-form-input-group">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="email" autocomplete="off" required name="email" value="{{ old('email') }}" class="contact_us-form-input contact_us-form-input--2 @error('email') is-invalid @enderror" id="subject" placeholder="Email Address">
                    <label class="contact_us-form-label" for="subject">Email Address</label>
                </div>

                <div class="contact_us-form-input-group">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="number" autocomplete="off" required name="phone" value="{{ old('phone') }}" class="contact_us-form-input contact_us-form-input--2 @error('phone') is-invalid @enderror" id="phone" placeholder="Your phone number">
                    <label class="contact_us-form-label" for="phone">Phone number</label>
                </div>

                <div class="contact_us-form-input-group">
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <textarea minlength="100" maxlength="700" class="contact_us-form-input @error('message') is-invalid @enderror" required name="message" id="message" placeholder="Your Message" cols="30" rows="5" class="contact_us-form-message">
                    {{ old('message') }}
                    </textarea>
                    <label class="contact_us-form-label" for="message">Your Message</label>
                </div>

                <button type="submit" class="btn-secondary btn-send-message">Send Message <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>

            <div class="side-info side-info--2">
                <img class="side-info__image mb-md" src="./resources/imgs/logo 2.svg" alt="Caxton">
                <h3 class="heading-3 mb-sm">Find us on social media</h3>
                <p class="side-info__name">Delivering beyond expectations</p>
                <div class="side-info__icons">
                    <a href="https://www.facebook.com/caxton.mathitu/" target="_blank" class="side-info__social side-info__social--1">
                        <i class="fab fa-facebook side-info__social--icon"></i>
                        <span class="side-info__social--name">Facebook</span>
                    </a>

                    <a href="https://www.linkedin.com/in/caxton-muthoni-7b2444175/" target="_blank" class="side-info__social">
                        <i class="fab fa-linkedin side-info__social--icon  "></i>
                        <span class="side-info__social--name">LinkedIn</span>
                    </a>

                    <a href="https://api.whatsapp.com/send?phone=+254743751575" target="_blank" class="side-info__social">
                        <i class="fab fa-whatsapp side-info__social--icon"></i>
                        <span class="side-info__social--name">Whatsapp</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>