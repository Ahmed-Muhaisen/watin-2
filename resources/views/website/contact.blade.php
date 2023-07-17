@extends('website.master')
@section('title', 'Home Page')
@section('style_header','background:black;color:#fff')
@section('contint')

<div style="margin-top:100px "></div>
<!-- CONTACT -->
<section id="contact" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
            <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                <div id="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.0914417586837!2d34.445001270511526!3d31.52164837568305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7fb84d887323%3A0xe087afcc1e6f2321!2z2YXYt9i52YUg2KjYp9mE2YXZitix2Kc!5e0!3m2!1sen!2sus!4v1689454510986!5m2!1sen!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                        <h2>تواصل معنا</h2>
                    </div>
                </div>

                <!-- CONTACT FORM -->
                <form action="{{ route('website.contact') }}" method="post" class="wow fadeInUp" id="contact-form"
                    role="form" data-wow-delay="0.8s">

                    <!-- IF MAIL SENT SUCCESSFUL  // connect this with custom JS -->
                    <h6 class="text-success">Your message has been sent successfully.</h6>

                    <!-- IF MAIL NOT SENT -->
                    <h6 class="text-danger">E-mail must be valid and message must be longer than 1 character.</h6>

                    <div class="col-md-6 col-sm-6">
                        <input type="text" class="form-control" id="cf-name" name="name" placeholder="الإسم كاملا">
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <input type="email" class="form-control" id="cf-email" name="email" placeholder="الإيميل">
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="الموضوع">

                        <textarea class="form-control" rows="6" id="cf-message" name="message"
                            placeholder="أخبرنا حول تجربتك"></textarea>

                        <button type="submit" class="form-control" id="cf-submit" name="submit">إرسال</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
