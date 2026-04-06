@extends('website.layouts.app')
@section('content')
    <header class="bg-[#ff7bac] text-white p-4">
        <h1 class="text-center text-3xl font-semibold">Terms & Conditions</h1>
    </header>

    <div class="max-w-4xl mx-auto p-6 space-y-8">
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">1. Introduction</h2>
            <p>These Terms & Conditions govern your use of the Super Técnico 24 platform. By using our service, you agree to
                these terms.</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">2. User Registration</h2>
            <p>Users and technicians must register on the platform by providing accurate and up-to-date information. Users
                must provide their name, phone number, and email. Technicians must also upload their professional
                certifications.</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">3. Platform Use</h2>
            <p>Users are responsible for submitting accurate service requests. Technicians must ensure their availability
                and respond promptly. Both parties should respect the platform's guidelines to maintain professionalism.</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">4. Payment Terms</h2>
            <p>Users are required to pay a €20 advance fee for service confirmation. The final payment is made directly to
                the technician, with an additional €10 fee that goes to the platform.</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">5. Transactions and Fees</h2>
            <p>The platform processes payments through Stripe, PayPal, Google Pay, or Apple Pay. All payments are subject to
                platform fees, which are clearly stated before processing.</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">6. Reviews and Ratings</h2>
            <p>Users can leave reviews and ratings for technicians after the service is completed. Reviews are moderated and
                may be removed if they violate platform rules.</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">7. Termination and Suspension</h2>
            <p>We reserve the right to suspend or terminate accounts that violate the platform's terms. Users or technicians
                found in violation may be banned from future use.</p>
        </section>

        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">8. Liability and Indemnity</h2>
            <p>We are not liable for any damages arising from the use of the platform. Users and technicians are responsible
                for ensuring that the service is performed safely and efficiently.</p>
        </section>
    </div>
@endsection
