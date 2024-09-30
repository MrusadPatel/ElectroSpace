@extends('user.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || About
@endsection --}}

@section('content')
    

    <!--============================
        CONTACT PAGE START
    ==============================-->
    <section class="container  my-5 pt-4 ">
        <h1 class="text-center mt-5 mb-5">Contact Us</h1>
        
        <div class="row mb-5">
            <div class="col-md-6 px-5">
                <h2>Get in Touch</h2>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            <div class="col-md-6 px-5">
                <h2>Contact Information</h2>
                <p><strong>Address:</strong> 123 Tech Street, Silicon Valley, CA 94000</p>
                <p><strong>Phone:</strong> (555) 123-4567</p>
                <p><strong>Email:</strong> info@electrotech.com</p>
                <p><strong>Hours:</strong> Monday - Friday: 9am - 6pm, Saturday: 10am - 4pm, Sunday: Closed</p>
                
                <h3 class="mt-4">Find Us</h3>
                <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.0929859230787!2d72.65899977477132!3d23.05705231504155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e870349cbcfc1%3A0x545735be0100afb3!2sRadheshyam%20Residency%2C%20Nava%20Naroda!5e0!3m2!1sen!2sin!4v1726840683580!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-3">
            <div class="col-md-4">
                <h3>Customer Support</h3>
                <p>Need help with an order or have a question about our products? Our customer support team is here to assist you.</p>
                <p>Email: support@electrotech.com</p>
                <p>Phone: (555) 987-6543</p>
            </div>
            <div class="col-md-4">
                <h3>Technical Support</h3>
                <p>Having trouble with a product? Our technical support team can help you troubleshoot and resolve issues.</p>
                <p>Email: techsupport@electrotech.com</p>
                <p>Phone: (555) 246-8101</p>
            </div>
            <div class="col-md-4">
                <h3>Business Inquiries</h3>
                <p>For partnership opportunities or business-related questions, please contact our business development team.</p>
                <p>Email: business@electrotech.com</p>
                <p>Phone: (555) 369-2580</p>
            </div>
        </div>
    </section>
    <!--============================
        CONTACT PAGE END
    ==============================-->
@endsection
