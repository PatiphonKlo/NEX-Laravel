@if (isset($quotation['product_data']) && isset($quotation['client_data']))
    <button type="button" id="send-quotation-button-{{ $key }}"
        onclick="sendQuotationButton{{ $key }}()"
        class="uppercase w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-primary rounded-md hover:bg-green-900">
        <img src="/svg/attach-email.svg" alt="NA" class="w-4 h-4 mr-2">
        Mail
    </button>

    <div id="popup-modal-send-quotation-{{ $key }}" class="hidden relative z-30">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen">
            <div id="overlay-send-quotation-{{ $key }}"
                class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                <div
                    class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all w-full sm:max-w-xl md:max-w-2xl lg:max-w-4xl"">

                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                        <h3 class="text-lg font-semibold text-gray-900 uppercase">
                            Quotation: {{ $quotation['quotation_code'] }}
                        </h3>
                        <button type="button" id="send-quotation-close-button-{{ $key }}"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <form
                        action="{{ config('app.env') == 'production' ? secure_url('admin/send-quotation/' . $quotation['quotation_id']) : url('admin/send-quotation/' . $quotation['quotation_id']) }}"
                        method="POST" class="flex flex-col p-3 pr-4 h-[50vh] overflow-y-auto"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="w-full mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email
                                address</label>
                            <input type="text" name="email" value="{{ old('email') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="Type your email address">
                            @error('email')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="Type your name">
                            @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full mb-5">
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                            <input type="text" name="subject" value="{{ old('subject') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="Subject of this email">
                            @error('subject')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-10">
                            <button type="submit"
                                class="text-white inline-flex items-center bg-primary hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 12V1m0 0L4 5m4-4 4 4m3 5v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                                </svg>
                                <span class="uppercase">Send</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <button type="button" id="enquiry" disabled
        class="uppercase inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-200 rounded-lg cursor-not-allowed w-full">
        <img src="/svg/attach-email.svg" alt="NA" class="w-4 h-4 mr-2">
        Mail
    </button>
@endif


<script>
    function sendQuotationButton{{ $key }}() {
        let send_quotation_button = document.getElementById('send-quotation-button-{{ $key }}')
        let send_quotation_modal = document.getElementById('popup-modal-send-quotation-{{ $key }}')
        let send_quotation_close_button = document.getElementById(
            'send-quotation-close-button-{{ $key }}')
        let overlay = document.getElementById('overlay-send-quotation-{{ $key }}');

        send_quotation_modal.classList.remove('hidden')

        send_quotation_close_button.addEventListener('click', function() {
            send_quotation_modal.classList.add('hidden')
        });

        window.addEventListener('click', function(event) {
            if (event.target == overlay) {
                send_quotation_modal.classList.add('hidden')
            }
        });
    }
</script>
