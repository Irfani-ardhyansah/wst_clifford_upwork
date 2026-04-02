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
@endphp

<div id="auth-modal" class="co hidden opacity-0 transition-all duration-300">
    <div class="co-box scale-95" id="modal-content">
        {{-- Header --}}
        <div class="co-head">
            <div>
                <h3 class="co-title" id="co-title">Access Premium Content</h3>
                <p class="co-sub">Register once for unlimited access.</p>
            </div>
            <button class="co-x close-modal" id="co-x" aria-label="Close form">&times;</button>
        </div>

        {{-- Feature Strips --}}
        <div class="co-strips">
            <div class="co-strip">
                <div class="co-strip-lbl">Free Access</div>
                <div class="co-strip-val">No subscription required</div>
            </div>
            <div class="co-strip">
                <div class="co-strip-lbl">Unlimited</div>
                <div class="co-strip-val">All case studies & tools</div>
            </div>
            <div class="co-strip">
                <div class="co-strip-lbl">Instant</div>
                <div class="co-strip-val">One-time registration only</div>
            </div>
        </div>

        <div class="co-body">
            @guest
                {{-- Auth Form --}}
                <div id="auth-form-container" class="auth-form-container">    
                    <form id="ajaxUserLoginForm" method="POST" action="{{ route('login.phone') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="source_url" id="source_url_input">
                        <input type="hidden" name="case_study_id" id="modal-case-id">

                        <div class="co-row">
                            <div class="co-fw">
                                <label class="co-lbl" for="name">Full Name <span class="co-req">*</span></label>
                                <input type="text" name="name" id="name" required class="co-inp">
                            </div>
                            <div class="co-fw">
                                <label class="co-lbl" for="company">Company <span class="co-req">*</span></label>
                                <input type="text" name="company" id="company" required class="co-inp">
                            </div>
                        </div>

                        <div class="co-row">
                            <div class="co-fw">
                                <label class="co-lbl" for="email">Work Email <span class="co-req">*</span></label>
                                <input type="email" name="email" id="email" required class="co-inp">
                            </div>
                            <div class="co-fw">
                                <label class="co-lbl" for="phone">Phone Number <span class="co-req">*</span></label>
                                <input type="number" name="phone" id="phone" required class="co-inp">
                            </div>
                        </div>

                        {{-- Footer area --}}
                        <div class="co-foot">
                            <p class="co-note">We'll follow up within 24 hours. Every submission reviewed personally.</p>
                            <button type="submit" id="btn-submit-auth" class="co-btn">
                                <i class="fa-solid fa-unlock text-xs"></i>
                                <span>Get Instant Access</span>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Success State (guest) --}}
                <div id="auth-success-container" class="co-ok hidden text-center py-4 space-y-4">
                    <a id="success-redirect-btn" class="co-btn" href="{{ $destination }}"
                        class="flex items-center justify-center gap-2 w-full bg-black hover:bg-gray-800 text-white text-sm font-semibold py-3 rounded-lg transition">
                        <i class="fa-solid fa-arrow-right"></i> View Content
                    </a>
                </div>
            @endguest

            @auth
                {{-- Welcome State (authenticated) --}}
                <div class="co-ok show text-center py-4 space-y-4">
                    <a id="success-redirect-btn" class="co-btn" href="{{ $destination }}">
                        <i class="fa-solid fa-arrow-right"></i> View Content
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>

<script>
    document.getElementById('source_url_input').value = window.location.href;
</script>