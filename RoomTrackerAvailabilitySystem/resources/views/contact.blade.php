@extends('layout')

@section('title', 'Contact - Room Tracker and Availability System')

@section('content')
<div class="mb-4">
    <h1 class="display-5 fw-bold">Contact Us</h1>
    <p class="text-muted">For any inquiries, feedback, or technical support, feel free to get in touch with our team. We’ll be glad to help you with any issues or questions about the system.</p>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Send us a Message</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="program/year&section" class="form-label">Program / Year & Section</label>
                        <input type="text" class="form-control" id="program/year&section" placeholder="Enter program/Year&Section" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Contact Information</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h6 class="fw-bold">
                    <i class="bi bi-telephone-fill me-2" style="color: var(--primary-blue);"></i>
                        Phone
                    </h6>
                    <p class="text-muted">+63 (910) 727 4776</p>
                </div>
                <div class="mb-4">
                    <h6 class="fw-bold">
                    <i class="bi bi-envelope-fill me-2" style="color: var(--primary-blue);"></i>
                        Email
                    </h6>
                    <p class="text-muted">roomtracker@my.cspc.edu.ph</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Links</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="{{ route('rooms') }}" class="text-decoration-none">View All Classrooms</a></li>
                    <li class="mb-2"><a href="{{ route('availability') }}" class="text-decoration-none">Check Availability</a></li>
                    <li><a href="{{ route('home') }}" class="text-decoration-none">Back to Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection