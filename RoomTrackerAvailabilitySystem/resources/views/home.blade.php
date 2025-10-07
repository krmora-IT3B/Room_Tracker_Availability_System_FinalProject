@extends('layout')

@section('title', 'Home - Room Tracker and Availability System')

@section('content')
<div class="text-center mb-5">
    <h1 class="display-4 fw-bold">Welcome to Room Tracker and Availability System</h1>
    <p class="lead text-muted">Manage and track the real-time availability of rooms and laboratories</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="bi bi-book-fill display-1 mb-3" style="color: var(--primary-blue);"></i>
                <h5 class="card-title">Track Rooms and Laboratories</h5>
                <p class="card-text">Monitor all rooms or laboratories and their current status in one place.</p>
                <a href="{{ route('rooms') }}" class="btn btn-primary">View Classrooms</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="bi bi-check-circle-fill display-1 mb-3" style="color: var(--primary-blue);"></i>
                <h5 class="card-title">Check Availability</h5>
                <p class="card-text">See which rooms or laboratories are available, occupied or under maintenance right now.</p>
                <a href="{{ route('availability') }}" class="btn btn-primary">Check Now</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="bi bi-telephone-fill display-1 mb-3" style="color: var(--primary-blue);"></i>
                <h5 class="card-title">Get in Touch</h5>
                <p class="card-text">Have questions? Contact us for support and assistance.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">About This System</h5>
            </div>
            <div class="card-body">
                <p>The Room Tracker and Availability System is designed specifically for the College of Computer Studies (CCS) to help manage and monitor its classrooms and laboratories more efficiently. It gives real-time updates and has a user-friendly interface, allowing students and instructors to easily check which CCS rooms or labs are available or in use. This makes it faster and more convenient for everyone to find a space without walking around the building.</p>
                <p>Some of its main features are:</p>
                <ul>
                    <li>Real-time classroom status updates</li>
                    <li>Easy-to-navigate interface</li>
                    <li>Quick availability checks</li>
                    <li>Comprehensive classroom information</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection