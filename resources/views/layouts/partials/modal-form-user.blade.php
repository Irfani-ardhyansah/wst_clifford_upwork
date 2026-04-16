@php
    $destination = route('member-dashboard.index'); 

    if (request()->is('industries/*')) {
        $destination = route('member-dashboard.index', ['category' => 'case-study', 'industry_id' => $industry->id]);
    } 
    elseif (request()->is('resources/tool*')) {
        $destination = route('member-dashboard.index', ['category' => 'tool']);
    } 
    elseif (request()->is('resources/white-paper*')) {
        $destination = route('member-dashboard.index', ['category' => 'white-paper']);
    }
    elseif (request()->is('resources/webinar*')) {
        $destination = route('member-dashboard.index', ['category' => 'webinar']);
    }
    elseif (request()->is('resources/events*')) {
        $destination = route('member-dashboard.gresb-water.list');
    }
@endphp

<div id="auth-modal" class="co hidden opacity-0 transition-all duration-300">
    <div class="gate-box scale-95" id="modal-content">

        {{-- Header --}}
        <div class="gate-header">
            <button class="gate-close close-modal" id="co-x" aria-label="Close form">&times;</button>
            <div class="gate-header-eye">Access Required</div>
            <h2 class="gate-header-title" id="co-title">Access Premium Content</h2>
            <p class="gate-header-sub">Register once for unlimited access — no subscription required.</p>
        </div>

        <div class="gate-body" id="auth-form-container">
            @guest
                {{-- Auth Form --}}
                <form id="ajaxUserLoginForm" method="POST" action="{{ route('login.phone') }}">
                    @csrf
                    <input type="hidden" name="source_url" id="source_url_input">
                    <input type="hidden" name="case_study_id" id="modal-case-id">
                    {{-- Honeypot --}}
                    <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">

                    <div class="gate-row">
                        <div class="gate-field">
                            <label class="gate-label" for="name">Full Name</label>
                            <input class="gate-input" type="text" name="name" id="name" placeholder="Jane Smith" autocomplete="name" required>
                            <span class="gate-err" id="err-name">Required</span>
                        </div>
                        <div class="gate-field">
                            <label class="gate-label" for="company">Company</label>
                            <input class="gate-input" type="text" name="company" id="company" placeholder="Acme Real Estate Fund" autocomplete="organization" required>
                            <span class="gate-err" id="err-company">Required</span>
                        </div>
                    </div>

                    <div class="gate-row">
                        <div class="gate-field">
                            <label class="gate-label" for="email">Work Email</label>
                            <input class="gate-input" type="email" name="email" id="email" placeholder="jane@company.com" autocomplete="email" required>
                            <span class="gate-err" id="err-email">Please enter a valid work email.</span>
                        </div>
                        <div class="gate-field">
                            <label class="gate-label" for="phone">Phone Number</label>
                            <input class="gate-input" type="number" name="phone" id="phone" placeholder="+1 000 000 0000" autocomplete="tel" required>
                            <span class="gate-err" id="err-phone">Required</span>
                        </div>
                    </div>

                    <button class="gate-submit" type="submit" id="btn-submit-auth">
                        <i class="fa-solid fa-unlock text-xs"></i>
                        Get Instant Access
                    </button>

                    <p class="gate-legal">By registering you agree to WST's <a href="/privacy-policy">Privacy Policy</a>. We do not sell your data.</p>
                </form>
            @endguest

            @auth
                {{-- Authenticated state --}}
                <div class="gate-success" style="display:flex; flex-direction:column; align-items:center; text-align:center;">
                    <div class="gate-success-icon">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="#fff" stroke-width="2.2"><path d="M4 11l5 5 9-9"/></svg>
                    </div>
                    <div class="gate-success-title">Welcome back.</div>
                    <p class="gate-success-body">You already have full access to WST resources.</p>
                    <a class="gate-success-cta" href="{{ $destination }}">
                        <i class="fa-solid fa-arrow-right"></i> View Content
                    </a>
                </div>
            @endauth
        </div>

        {{-- Success State (guest — shown after submit) --}}
        <div class="gate-success" id="auth-success-container" style="display:none;">
            <div class="gate-success-icon">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="#fff" stroke-width="2.2"><path d="M4 11l5 5 9-9"/></svg>
            </div>
            <div class="gate-success-title">Access granted.</div>
            <p class="gate-success-body">Check your email for your member portal link. Your requested resource is now unlocked.</p>
            <a id="success-redirect-btn" class="gate-success-cta" href="{{ $destination }}">
                <i class="fa-solid fa-arrow-right"></i> View Content
            </a>
        </div>

    </div>
</div>

<script>
    document.getElementById('source_url_input').value = window.location.href;
</script>