@extends('admin.portal')

@section('title', 'GRESB Water')
@section('header_title', 'GRESB Water Performance Tool')

@push('styles')
    <style>
        .form-select,
        .form-textarea {
            background: var(--surface-hi) !important;
            color: var(--text-1) !important;
            border-color: var(--border) !important;
        }
    </style>
@endpush

@section('content')
    <div clasQs="page-hdr"><div class="page-hdr-left"><h2>Schedule Audit &amp; Advisory Call</h2><p>Book a session with a WST water performance advisor</p></div></div>

    @if(session('success'))
    <div style="grid-column:1/-1; margin-top:5px;">
        <div id="flash-message" 
            style="padding:12px 16px;border-radius:8px;background:rgba(0,201,167,.08);border:1px solid rgba(0,201,167,.2);color:var(--accent);display:flex;align-items:center;gap:10px;font-size:13px;">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    </div>
    @endif

    @if(session('error') || $errors->any())
    <div style="grid-column:1/-1;">
        <div style="padding:12px 16px;border-radius:8px;background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.2);color:#ef4444;display:flex;align-items:center;gap:10px;font-size:13px;">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ session('error') ?? 'Please fix the errors in the form.' }}
        </div>
    </div>
    @endif

    <div style="display:grid;grid-template-columns:1fr 360px;gap:20px;margin-top: 10px;">
        <div class="card">
            <div class="card-hdr"><div class="card-title"><i class="fa-solid fa-calendar-plus" style="color:var(--accent);font-size:11px;"></i>Session Details</div></div>
            <div class="card-body">
                <form id="bookingForm" action="{{ route('member-dashboard.gresb-water.store') }}" method="POST">
                    @csrf
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input
                                type="text"
                                name="first_name"
                                id="firstName"
                                value="{{ old('first_name', $user->name ?? '') }}"
                                required
                                class="form-input
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
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                            <input
                                type="text"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                id="lastName"
                                required
                                class="form-input
                                @error('last_name')
                                    border-red-500 focus:border-red-500
                                @else
                                    border-black/10 focus:border-blue-500
                                @enderror"
                                placeholder="Doe"
                            />
                        </div>
                    </div>
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">Work Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email ?? '') }}"
                                required
                                class="form-input
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
                        <div class="form-group">
                            <label class="form-label">Company</label>
                            <input
                                type="text"
                                name="company"
                                id="company"
                                value="{{ old('company', $user->company ?? '') }}"
                                required
                                class="form-input
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
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label class="form-label">Session Type</label>
                            <select
                                id="interest"
                                name="interest"
                                class="form-select
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
                        <div class="form-group">
                            <label class="form-label">Portfolio Size</label>
                            <input
                                type="number"
                                name="portfolio_size"
                                id="portfolioSize"
                                value="{{ old('portfolio_size') }}"
                                class="form-input
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
                    <div class="form-group">
                    <label class="form-label">Preferred Date &amp; Time</label>
                        <input 
                            type="datetime-local" 
                            id="timePreference" 
                            name="time_preference"
                            value="{{ old('time_preference', now()->format('Y-m-d\TH:i')) }}"
                            class="form-input
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
                    <div class="form-group">
                        <label class="form-label">Specific Challenges or Goals</label>
                        <textarea
                            id="notes"
                            name="notes"
                            rows="2"
                            class="form-textarea
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
                    <button class="btn btn-primary" style="width:100%;justify-content:center;padding:12px;">
                        <i class="fa-solid fa-paper-plane"></i> Submit Request
                    </button>
                </form>
            </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:14px;">
          <div class="card">
            <div class="card-hdr"><div class="card-title"><i class="fa-solid fa-circle-info" style="color:var(--blue);font-size:11px;"></i>What to Expect</div></div>
            <div class="card-body">
              <div style="display:flex;flex-direction:column;gap:14px;">
                <div style="display:flex;gap:12px;"><div style="width:28px;height:28px;border-radius:50%;background:var(--accent-dim);border:1px solid rgba(0,201,167,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:11px;font-weight:700;color:var(--accent);">1</div><div><div style="font-size:12px;font-weight:600;color:var(--text-1);margin-bottom:3px;">Portfolio Review</div><div style="font-size:11px;color:var(--text-3);">We analyse your current water spend, billing history, and asset profile.</div></div></div>
                <div style="display:flex;gap:12px;"><div style="width:28px;height:28px;border-radius:50%;background:var(--accent-dim);border:1px solid rgba(0,201,167,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:11px;font-weight:700;color:var(--accent);">2</div><div><div style="font-size:12px;font-weight:600;color:var(--text-1);margin-bottom:3px;">Savings Identification</div><div style="font-size:11px;color:var(--text-3);">We identify billing errors, ESG gaps, and efficiency opportunities.</div></div></div>
                <div style="display:flex;gap:12px;"><div style="width:28px;height:28px;border-radius:50%;background:var(--accent-dim);border:1px solid rgba(0,201,167,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:11px;font-weight:700;color:var(--accent);">3</div><div><div style="font-size:12px;font-weight:600;color:var(--text-1);margin-bottom:3px;">Action Plan Delivered</div><div style="font-size:11px;color:var(--text-3);">You receive a documented plan with verified financial projections.</div></div></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body" style="text-align:center;padding:20px;">
              <div style="font-family:var(--font-display);font-size:36px;font-weight:300;color:var(--accent);line-height:1;">90 min</div>
              <div style="font-size:11px;color:var(--text-3);margin-top:6px;">No obligation — every session reviewed personally by a WST advisor</div>
            </div>
          </div>
        </div>
      </div>

<iframe src='https://outlook.office.com/book/ScheduleYourWaterAdvisoryCall@ertwtr.com/?ismsaljsauthenabled' width='100%' height='100%' scrolling='yes' style='border:0'></iframe>
@endsection