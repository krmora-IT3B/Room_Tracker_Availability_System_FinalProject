@extends('layout')

@section('title', 'Availability - Room Tracker and Availability System')

@section('content')
<div class="mb-4">
    <h1 class="display-5 fw-bold">Rooms and Laboratories Availability</h1>
    <p class="text-muted">Displays the real-time availability status of all rooms and laboratories within the department.</p>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Current Status</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Room 001</strong></td>
                        <td>Lecture Room</td>
                        <td><span class="badge badge-available">Available</span></td>
                        <td>{{ now()->subMinutes(5)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Room 002</strong></td>
                        <td>Lecture Room</td>
                        <td><span class="badge badge-occupied">Occupied</span></td>
                        <td>{{ now()->subMinutes(15)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Room 003</strong></td>
                        <td>Lecture Room</td>
                        <td><span class="badge badge-available">Available</span></td>
                        <td>{{ now()->subMinutes(2)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Room 004</strong></td>
                        <td>Lecture Room</td>
                        <td><span class="badge badge-under-maintenance">Under Maintenance</span></td>
                        <td>{{ now()->subMinutes(8)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Room 005</strong></td>
                        <td>Lecture Room</td>
                        <td><span class="badge badge-available">Available</span></td>
                        <td>{{ now()->subMinutes(3)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Room 006</strong></td>
                        <td>Lecture Room</td>
                        <td><span class="badge badge-available">Occupied</span></td>
                        <td>{{ now()->subMinutes(2)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>MAC Lab</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-occupied">Occupied</span></td>
                        <td>{{ now()->subMinutes(10)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Open Lab</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-occupied">Occupied</span></td>
                        <td>{{ now()->subMinutes(23)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>IT Lab 1</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-available">Available</span></td>
                        <td>{{ now()->subMinutes(30)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>IT Lab 2</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-available">Available</span></td>
                        <td>{{ now()->subMinutes(45)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>ERP Lab</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-occupied">Occupied</span></td>
                        <td>{{ now()->subMinutes(19)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>CS Lab</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-under-maintenance">Under Maintenance</span></td>
                        <td>{{ now()->subMinutes(10)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Research Room</strong></td>
                        <td>Room</td>
                        <td><span class="badge badge-occupied">Available</span></td>
                        <td>{{ now()->subMinutes(40)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>LIS Lab</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-occupied">Occupied</span></td>
                        <td>{{ now()->subMinutes(10)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>NAS Lab</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-occupied">Available</span></td>
                        <td>{{ now()->subMinutes(29)->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td><strong>RISE Lab</strong></td>
                        <td>Laboratory</td>
                        <td><span class="badge badge-under-maintenance">Under Maintenance</span></td>
                        <td>{{ now()->subMinutes(38)->format('M d, Y h:i A') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                <i class="bi bi-bar-chart-fill me-2" style="color: var(--primary-blue);"></i>
                Summary
                </h5>
                <p class="mb-2"><strong>Total Classrooms:</strong> 16</p>
                <p class="mb-2"><strong>Available:</strong> <span class="text-success">6</span></p>
                <p class="mb-2"><strong>Occupied:</strong> <span class="text-danger">7</span></p>
                <p class="mb-0"><strong>Under Maintenance:</strong> <span class="text-danger">3</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                <i class="bi bi-info-circle-fill me-2" style="color: var(--primary-blue);"></i>
                Information
                </h5>
                <p class="mb-0">The system updates room and lab availability every 5 minutes. If you need immediate help, kindly contact the admin.</p>
            </div>
        </div>
    </div>
</div>
@endsection