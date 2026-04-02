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
@endphp

<div id="auth-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden opacity-0 transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all scale-95" id="modal-content">
        
        <div class="bg-black text-white p-8 relative">
            <button type="button" class="close-modal absolute top-4 right-4 text-white-400 hover:text-white transition">X</button>
            <h3 class="text-2xl font-bold">Access Premium Content</h3>
            <p class="text-gray-400 mt-2">Register once for unlimited access.</p>
        </div>

        <div class="p-8">
            <div id="pending-asset-preview" class="bg-gray-50 rounded-lg p-4 mb-6 flex items-center gap-4 hidden">
                <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i id="modal-icon" class="fa-solid fa-file-lines text-xl text-blue-600"></i>
                    <img id="modal-image" src="" alt="Asset Preview" class="hidden w-full h-full object-cover rounded-lg">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold truncate" id="modal-asset-title">Asset Title</p>
                </div>
            </div>

            @guest
                <div id="auth-form-container">
                    <form id="ajaxUserLoginForm" method="POST" action="{{ route('login.phone') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="source_url" id="source_url_input">
                        <input type="hidden" name="case_study_id" id="modal-case-id">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company <span class="text-red-500">*</span></label>
                            <input type="text" name="company" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Work Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                            <input type="number" name="phone" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        
                        <button type="submit" id="btn-submit-auth" class="w-full bg-black hover:bg-teal-700 text-white font-bold py-3 rounded-lg mt-2 transition flex justify-center items-center gap-2">
                            <span><i class="fa-solid fa-unlock"></i></span>
                            <span>Get Instant Access</span>
                        </button>
                    </form>
                </div>

                <div id="auth-success-container" class="hidden text-center space-y-4 animate-fade-in-up">
                    
                    <p class="text-lg font-semibold">
                        Welcome back, <span id="success-user-name" class="text-teal-600">User</span>!
                    </p>

                    <p class="text-gray-500 text-sm">
                        You have successfully registered. You can now access the premium content.
                    </p>

                    <a id="success-redirect-btn" href="{{ $destination }}" 
                        class="block w-full bg-black hover:bg-gray-800 text-white font-bold py-3 rounded-lg transition">
                        <i class="fa-solid fa-arrow-right mr-2"></i> View Content
                    </a>
                </div>
            @endguest

            @auth
                <div class="text-center space-y-4 animate-fade-in-up">
                    <p class="text-lg font-semibold">
                        Welcome back, <span id="success-user-name" class="text-teal-600">User</span>!
                    </p>

                    <p class="text-gray-500 text-sm">
                        You have successfully registered. You can now access the premium content.
                    </p>

                    <a id="success-redirect-btn" href="{{ $destination }}" 
                        class="block w-full bg-black hover:bg-gray-800 text-white font-bold py-3 rounded-lg transition">
                        <i class="fa-solid fa-arrow-right mr-2"></i> View Content
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>

<script>
    document.getElementById('source_url_input').value = window.location.href;
</script>