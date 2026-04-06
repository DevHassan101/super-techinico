@extends('workers.layouts.app')
@section('title', 'Appointment Details')
@section('page-title', 'Appointments Details')
@section('content')
    <style>
        .bg-success {
            background-color: green
        }
    </style>
    <div class="content-wrapper">
        <div class="max-w-lg mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">Appointment Details</h2>

                <div class="space-y-4">
                    <div class="flex justify-between text-gray-700">
                        <span class="text-sm font-medium">Name</span>
                        <span class="text-sm text-gray-900">{{ $appointment->user->name ?? '' }}</span>
                    </div>

                    <div class="flex justify-between text-gray-700">
                        <span class="text-sm font-medium">Email</span>
                        <span class="text-sm text-gray-900">{{ $appointment->user->email ?? '' }}</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span class="text-sm font-medium">Amount</span>
                        <span class="text-sm font-semibold text-[#ff74a8]">${{ $appointment->amount ?? '' }}</span>
                    </div>

                    <div class="flex justify-between text-gray-700">
                        <span class="text-sm font-medium">Booking Date</span>
                        <span class="text-sm text-gray-900">{{ $appointment->booking_date ? date('d M, Y', strtotime($appointment->booking_date)) : '' }}</span>
                    </div>

                    <div class="flex justify-between text-gray-700">
                        <span class="text-sm font-medium">Booking Time</span>
                        <span class="text-sm text-gray-900">{{ $appointment->booking_time ? date('h:i A', strtotime($appointment->booking_time)) : '' }}</span>
                    </div>

                    <div class="flex justify-between text-gray-700">
                        <span class="text-sm font-medium">Status</span>
                        @php
                            if ($appointment->status == 'pending') {
                                $classes = 'bg-yellow-500 text-white';
                            } elseif ($appointment->status == 'accepted') {
                                $classes = 'bg-slate-200 text-black';
                            } elseif ($appointment->status == 'rejected') {
                                $classes = 'bg-blue-500 text-white';
                            } elseif ($appointment->status == 'confirmed') {
                                $classes = 'bg-success text-white';
                            } elseif ($appointment->status == 'not_showed') {
                                $classes = 'bg-red-500 text-white';
                            } elseif ($appointment->status == 'cancelled') {
                                $classes = 'bg-black text-white';
                            } elseif ($appointment->status == 'completed') {
                                $classes = 'bg-[#e6608e] text-white';
                            }
                        @endphp
                        <span class="text-sm font-medium rounded-full px-2 {{ $classes }}">
                            {{ str_replace('_', ' ', $appointment->status) }}
                        </span>
                    </div>

                    <div class=" text-gray-700">
                        <span class="text-sm font-medium">Address</span>
                        <p class="text-sm text-gray-900">{{ $appointment->address }}</p>
                    </div>

                    <div class="text-gray-700">
                        <span class="text-sm font-medium">Detail</span>
                        <p class="text-sm text-gray-900">{{ $appointment->details }}</p>
                    </div>

                </div>

                <div class="mt-6 flex justify-center gap-4">
                    @if ($appointment->status == 'pending')
                        <a href="{{ route('worker.appointment.status', ['appointment' => $appointment, 'status' => 'accepted']) }}"
                            class="px-6 py-2 bg-blue-500 text-white text-sm font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Accept
                        </a>
                        <a href="{{ route('worker.appointment.status', ['appointment' => $appointment, 'status' => 'rejected']) }}"
                            class="px-6 py-2 bg-red-500 text-white text-sm font-semibold rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Reject
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
