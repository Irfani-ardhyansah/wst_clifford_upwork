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
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                            First Name *
                        </label>
                        <input
                            type="text"
                            name="first_name"
                            id="firstName"
                            required
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="John"
                        />
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                            Last Name *
                        </label>
                        <input
                            type="text"
                            name="last_name"
                            id="lastName"
                            required
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="Doe"
                        />
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                            Work Email *
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            required
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="john.doe@company.com"
                        />
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                            Company *
                        </label>
                        <input
                            type="text"
                            name="company"
                            id="company"
                            required
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="ABC Asset Management"
                        />
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                            Phone Number
                        </label>
                        <input
                            type="tel"
                            name="phone"
                            id="phone"
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="+1 (555) 123-4567"
                        />
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                            Portfolio Size (# of Properties)
                        </label>
                        <input
                            type="number"
                            name="portfolio_size"
                            id="portfolioSize"
                            class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="e.g., 25"
                        />
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                            Primary Interest
                        </label>
                        <select id="interest" name="interest" class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors appearance-none">
                            <option value="">Select your goal...</option>
                            <option value="gresb">Improve GRESB Score</option>
                            <option value="audit">Comprehensive Portfolio Audit</option>
                            <option value="monitoring">Smart Monitoring Implementation</option>
                            <option value="savings">Cost Reduction & Efficiency</option>
                            <option value="compliance">Regulatory Compliance</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                            Preferred Meeting Time
                        </label>
                        <select id="timePreference" name="time_preference" class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors appearance-none">
                            <option value="">Select availability...</option>
                            <option value="morning">Morning (8am - 12pm EST)</option>
                            <option value="afternoon">Afternoon (12pm - 5pm EST)</option>
                            <option value="flexible">Flexible</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs font-semibold text-black/40 uppercase tracking-widest mb-3">
                        Additional Notes
                    </label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="2"
                        class="w-full px-0 py-2 bg-transparent border-b border-black/10 focus:outline-none focus:border-blue-500 transition-colors resize-none"
                        placeholder="Tell us about your specific challenges..."
                    ></textarea>
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
@endsection