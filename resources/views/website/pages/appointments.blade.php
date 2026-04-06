@extends('website.layouts.app')
@section('title', 'Appointments')
@section('content')
    <section class="w-full px-[5%] my-5  max-w-full overflow-auto">
        <table
            class="min-w-full table-auto bg-white border-collapse border border-gray-300 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-[#ff7bac] text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium">#</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Worker</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Amount</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($appointments as $index => $appointment)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $appointment->worker->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $appointment->amount }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $appointment->status }}</td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex items-center">
                                <a href="{{route('appointment.show', ['appointment' => $appointment])}}">
                                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="3.5" stroke="#ff7bac" />
                                        <path
                                            d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z"
                                            stroke="#ff7bac" />
                                    </svg>
                                </a>
                                {{-- <button class="text-blue-600 hover:text-blue-800 focus:outline-none">Edit</button>
                                <button class="ml-4 text-red-600 hover:text-red-800 focus:outline-none">Delete</button> --}}

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No appointments found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>



    </section>
@endsection
