@extends('admin.portal')

@section('title', 'GRESB Water')
@section('header_title', 'GRESB Water Performance Tool')

@section('content')

@if(session('success'))
    <div class="px-6 pt-4">
        <div id="flash-message" 
            class="p-4 rounded-xl bg-teal-50 border border-teal-100 text-teal-800 flex items-center gap-3 transition-all duration-500">
            <i class="fa-solid fa-circle-check text-teal-600"></i>
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session('error') || $errors->any())
    <div class="px-6 pt-4">
        <div 
            class="p-4 rounded-xl bg-red-50 border border-red-100 text-red-800 flex items-center gap-3 transition-all duration-500">
            <i class="fa-solid fa-circle-exclamation text-red-600"></i>
            {{ session('error') ?? 'Please fix the errors in the form.' }}
        </div>
    </div>
@endif

<div class="max-w-4xl mx-auto my-10">
    <div class="bg-white rounded-2xl shadow-sm border border-black/5 overflow-hidden">
        <div class="p-8 md:p-12">
            <div class="mb-10 text-center md:text-left">
                <h2 class="text-3xl font-light text-black mb-4">Schedule Your GRESB Consultation</h2>
                <p class="text-black/60 max-w-2xl leading-relaxed">
                    Our water performance specialists will analyze your portfolio and provide actionable strategies to maximize your GRESB score.
                </p>
            </div>
            
            <form id="bookingForm" action="{{ route('member-dashboard.gresb-water.store') }}" method="POST" class="space-y-8">
                @csrf
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3
                            @error('first_name') text-red-500 @else text-black/40 @enderror">
                            First Name *
                        </label>
                        <input
                            type="text"
                            name="first_name"
                            id="firstName"
                            value="{{ old('first_name', $user->name ?? '') }}"
                            required
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors
                            @error('first_name')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror"
                            placeholder="John"
                        />
                        @error('first_name')
                            <p class="mt-2 text-xs text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3
                            @error('last_name') text-red-500 @else text-black/40 @enderror">
                            Last Name *
                        </label>
                        <input
                            type="text"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            id="lastName"
                            required
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors
                            @error('last_name')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror"
                            placeholder="Doe"
                        />
                        @error('last_name')
                            <p class="mt-2 text-xs text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3
                            @error('email') text-red-500 @else text-black/40 @enderror">
                            Work Email *
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', $user->email ?? '') }}"
                            required
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors
                            @error('email')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror"
                            placeholder="john.doe@company.com"
                        />
                        @error('email')
                            <p class="mt-2 text-xs text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3
                            @error('company') text-red-500 @else text-black/40 @enderror">
                            Company *
                        </label>
                        <input
                            type="text"
                            name="company"
                            id="company"
                            value="{{ old('company', $user->company ?? '') }}"
                            required
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors
                            @error('company')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror"
                            placeholder="ABC Asset Management"
                        />
                        @error('company')
                            <p class="mt-2 text-xs text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3
                            @error('phone') text-red-500 @else text-black/40 @enderror">
                            Phone Number
                        </label>
                        <input
                            type="tel"
                            name="phone"
                            id="phone"
                            value="{{ old('phone', $user->phone ?? '') }}"
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors
                            @error('phone')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror"
                            placeholder="+1 (555) 123-4567"
                        />
                        @error('phone')
                            <p class="mt-2 text-xs text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3
                            @error('portfolio_size') text-red-500 @else text-black/40 @enderror">
                            Portfolio Size (# of Properties)
                        </label>
                        <input
                            type="number"
                            name="portfolio_size"
                            id="portfolioSize"
                            value="{{ old('portfolio_size') }}"
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors
                            @error('portfolio_size')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror"
                            placeholder="e.g., 25"
                        />
                        @error('portfolio_size')
                            <p class="mt-2 text-xs text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-widest mb-3
                            @error('interest') text-red-500 @else text-black/40 @enderror">
                            Primary Interest
                        </label>

                        <select
                            id="interest"
                            name="interest"
                            class="w-full px-0 py-2 bg-transparent border-b transition-colors appearance-none
                            @error('interest')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror">

                            <option value="">Select your goal...</option>

                            <option value="gresb"
                                {{ old('interest') == 'gresb' ? 'selected' : '' }}>
                                Improve GRESB Score
                            </option>

                            <option value="audit"
                                {{ old('interest') == 'audit' ? 'selected' : '' }}>
                                Comprehensive Portfolio Audit
                            </option>

                            <option value="monitoring"
                                {{ old('interest') == 'monitoring' ? 'selected' : '' }}>
                                Smart Monitoring Implementation
                            </option>

                            <option value="savings"
                                {{ old('interest') == 'savings' ? 'selected' : '' }}>
                                Cost Reduction & Efficiency
                            </option>

                            <option value="compliance"
                                {{ old('interest') == 'compliance' ? 'selected' : '' }}>
                                Regulatory Compliance
                            </option>

                        </select>

                        @error('interest')
                            <p class="mt-2 text-xs text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3
                            @error('time_preference') text-red-500 @else text-black/40 @enderror">
                            Preferred Meeting Time
                        </label>
                        <input 
                            type="datetime-local" 
                            id="timePreference" 
                            name="time_preference"
                            value="{{ old('time_preference', now()->format('Y-m-d\TH:i')) }}"
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors
                            @error('time_preference')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror"
                        >
                        @error('time_preference')
                            <p class="mt-2 text-xs text-red-500 font-medium">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3
                        @error('notes') text-red-500 @else text-black/40 @enderror">
                        Additional Notes
                    </label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="2"
                        class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors resize-none
                            @error('notes')
                                border-red-500 focus:border-red-500
                            @else
                                border-black/10 focus:border-blue-500
                            @enderror"
                        placeholder="Tell us about your specific challenges..."
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="mt-2 text-xs text-red-500 font-medium">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-6 border-t border-black/5">
                    <div class="text-sm text-black/50 italic">
                        <i class="ri-information-line mr-1"></i> 
                        We'll reach out within 24 hours to schedule a 30-minute consultation call.
                    </div>
                    
                    <button type="submit" class="cta-primary w-full md:w-auto px-10 py-4 bg-gray-900 text-white rounded-full hover:bg-black transition-all flex items-center justify-center gap-3">
                        <span>Submit Request</span>
                        <i class="ri-send-plane-fill"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <a 
    href="https://outlook.office.com/book/ScheduleYourWaterAdvisoryCall@ertwtr.com/?ismsaljsauthenabled"
    target="_blank"
    class="px-4 py-2 bg-blue-600 text-white rounded-lg"
>
    Schedule Call
</a> -->


<iframe src='https://outlook.office.com/book/ScheduleYourWaterAdvisoryCall@ertwtr.com/?ismsaljsauthenabled' width='100%' height='100%' scrolling='yes' style='border:0'></iframe>
@endsection