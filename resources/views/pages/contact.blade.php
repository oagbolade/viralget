@extends('layouts.app')

@section('content')
<header class="header pt-10 pb-0">
      <div class="container text-center">
        <h1 class="display-4">Let's Get In Touch</h1>
        <p class="lead-2 mt-6">Here are the ways you can contact us with any questions you have</p>
      </div>
    </header>


<section class="section">
        <div class="container">

          <div class="row">
            <form class="col-lg-6 mx-auto p-6 bg-gray rounded" action="#" method="POST" data-form="mailer">
              <div class="alert alert-success d-on-success">We received your message and will contact you back soon.</div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <input class="form-control form-control-lg" type="text" name="name" placeholder="Your Name">
                </div>

                <div class="form-group col-md-6">
                  <input class="form-control form-control-lg" type="email" name="email" placeholder="Your Email Address">
                </div>
              </div>


              <div class="form-group">
                <textarea class="form-control form-control-lg" rows="4" placeholder="Your Message" name="message"></textarea>
              </div>

              <div class="text-center">
                <button class="btn btn-lg btn-primary" type="submit">Submit Inquiry</button>
              </div>
            </form>
          </div>

        </div>
      </section>    
@endsection