<div class="flex fixed inset-0 justify-center items-center">
    <div id="overlay" class="fixed inset-0 bg-gray-900 bg-opacity-90 transition-opacity"></div>
    <div class="relative w-80 sm:w-[500px] p-8 bg-white rounded-lg shadow-xl">
        <button type="button" id="closeModalButton"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto flex items-center justify-end">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <h3 class="text-lg font-medium text-center text-gray-900">Login Required</h3>
        <p class="text-sm text-center text-gray-500">You must be logged in to access this feature.</p>
        <x-form
            action="{{ config('app.env') == 'production' ? secure_url('authentication/login') : url('authentication/login') }}"
            method="POST">
            <div class="mb-4 mt-6">
                <input name="email"
                    class="bg-gray-50 border border-gray-500 focus:ring-bg-primary focus:border-bg-primary rounded-lg w-full py-2 px-3 text-black"
                    id="email" type="email" placeholder="Enter email address" required />
            </div>
            <div class="mb-4">

                <input name="password"
                    class="bg-gray-50 border border-gray-500 focus:ring-bg-primary focus:border-bg-primary rounded-lg w-full py-2 px-3 text-black mb-3"
                    id="password" type="password" placeholder="Enter password" required />
            </div>
            <div class="mb-4">
                <button type="submit"
                    class="uppercase w-full bg-primary hover:bg-green-900 text-white font-bold py-2 px-4 rounded-lg">
                    Login
                </button>
            </div>
        </x-form>
    </div>
</div>
