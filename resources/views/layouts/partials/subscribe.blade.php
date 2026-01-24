<div class="mt-5 max-w-md mx-auto">
    <form id="subscribeForm" class="relative">
        @csrf
        <div class="flex items-center gap-2">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa-regular fa-envelope text-gray-400"></i>
                </div>
                <input type="email" name="email" id="emailInput"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-teal-500 focus:border-teal-500" 
                    placeholder="Enter your email address..." required>
            </div>
            
            <button type="submit" id="btnSubscribe"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-4 disabled:opacity-50 disabled:cursor-not-allowed transition">
                Subscribe
            </button>
        </div>
        <p id="subscribeError" class="mt-2 text-sm text-red-600 hidden"></p>
    </form>
</div>

<div id="successModal" tabindex="-1" aria-hidden="true" 
     class="fixed inset-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center bg-black/50 backdrop-blur-sm">
    
    <div class="relative w-full max-w-md max-h-full animate-fade-in-up">
        <div class="relative bg-white rounded-2xl shadow-2xl p-6 text-center">
            
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 text-green-500">
                <i class="fa-solid fa-check text-3xl"></i>
            </div>

            <h3 class="mb-2 text-2xl font-bold text-gray-800">Subscribed!</h3>
            <p class="text-gray-500 mb-6">
                Thank you for joining our newsletter. We've added <span id="successEmail" class="font-semibold text-gray-800"></span> to our list.
            </p>

            <button type="button" id="closeModalBtn"
                class="text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition">
                Awesome, thanks!
            </button>
        </div>
    </div>
</div>