@extends('website.layouts.app')
@section('title', 'Payment Failed')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Failed</div>
                <div class="card-body">
                    <div class="alert alert-danger">
                        <h4>Payment Failed</h4>
                        <p>{{ $error_message }}</p>
                        @if($appointment_id)
                            <p>Appointment ID: {{ $appointment_id }}</p>
                        @endif
                    </div>
                    <p>You can try again or contact our support team for assistance.</p>
                    @if($appointment_id)
                        <a href="{{ route('checkout', ['appointmentId' => $appointment_id]) }}" class="btn btn-primary">Try Again</a>
                    @else
                        <a href="{{ route('appointment.index') }}" class="btn btn-primary">Return to Appointments</a>
                    @endif
                    {{-- <a href="{{ route('contact') }}" class="btn btn-outline-primary">Contact Support</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection