<button type="button" id="share-quotation-button-{{ $key }}" onclick="shareQuotationButton{{ $key }}()"
    {{ $quotation['product_data'] && $quotation['client_data'] ? '' : 'disabled' }}
    class="{{ $quotation['product_data'] && $quotation['client_data'] ? 'bg-primary hover:bg-green-800' : 'bg-green-200 cursor-not-allowed' }} uppercase w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white  rounded-md ">
    <img src="/svg/share.svg" alt="NA" class="w-4 h-4 mr-2">
    Share
</button>

<div id="popup-modal-share-{{ $key }}" class="hidden relative z-30">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-share-{{ $key }}"
            class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl w-200">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        SHARE PDF {{ $quotation['quotation_code'] }}
                    </h3>
                    <button type="button" id="share-close-button-{{ $key }}"
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
                <div class="p-3 pr-8 overflow-y-auto h-[50vh]">
                    <x-label>Quotation PDF link</x-label>
                    <div class="relative flex justify-end items-center mb-4">
                        <a data-copy-target='quotation-copy{{ $key }}'
                            href="{{ url('pdf-access/quotation/' . $quotation['quotation_id']) }}" target="_blank"
                            rel="noreferrer noopener"
                            class="text-blue-600 w-full bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5 pr-14 truncate">
                            {{ url('pdf-access/quotation/' . $quotation['quotation_id']) }}
                        </a>
                        <button type="button" class="absolute right-2" onclick="copy{{ $key }}()">
                            <img src="/svg/clipboard.svg" alt="Copy">
                        </button>
                    </div>
                    <x-label>Password</x-label>
                    <div class="relative flex justify-end items-center pb-4 mb-4 border-b">
                        <input disabled value="{{ $quotation['quotation_password'] ?? '' }}" type="text"
                            data-copy-target="quotation-copy{{ $key }}"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5 pr-10 truncate">
                    </div>

                    <script>
                        function copy{{ $key }}() {
                            const elements = document.querySelectorAll("[data-copy-target='quotation-copy{{ $key }}']");
                            let combinedText = '';

                            elements.forEach(element => {
                                if (element.tagName && element.tagName.toLowerCase() === 'a') {
                                    combinedText += `Quotation PDF:\n${element.href}\n`;
                                } else if (element.tagName && element.tagName.toLowerCase() === 'input' && element.type ===
                                    'text') {
                                    combinedText += `Password:\n${element.value}\n`;
                                }
                            });

                            navigator.clipboard.writeText(combinedText.trim()).then(() => {
                                alert("Copied the text:\n" + combinedText.trim());
                            }).catch(err => {
                                console.error('Could not copy text: ', err);
                            });
                        }
                    </script>

                    <x-label>Spec Sheet PDF link</x-label>
                    <div class="relative flex justify-end items-center mb-4">
                        <a data-copy-target='spec-sheet-copy{{ $key }}'
                            href="{{ url('pdf-access/spec/' . $quotation['product_id']) }}" target="_blank"
                            rel="noreferrer noopener"
                            class="text-blue-600 w-full bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5 pr-14 truncate">
                            {{ url('pdf-access/spec/' . $quotation['product_id']) }}
                        </a>
                        <button type="button" class="absolute right-2" onclick="copy2{{ $key }}()">
                            <img src="/svg/clipboard.svg" alt="Copy">
                        </button>
                    </div>
                    <x-label>Password</x-label>
                    <div class="relative flex justify-end items-center">
                        <input disabled value="{{ $quotation['product_data']['spec_password'] ?? '' }}" type="text"
                            data-copy-target="spec-sheet-copy{{ $key }}"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5 pr-10 truncate">
                    </div>

                    <script>
                        function copy2{{ $key }}() {
                            const elements = document.querySelectorAll("[data-copy-target='spec-sheet-copy{{ $key }}']");
                            let combinedText = '';

                            elements.forEach(element => {
                                if (element.tagName && element.tagName.toLowerCase() === 'a') {
                                    combinedText += `Spec. Sheet PDF:\n${element.href}\n`;
                                } else if (element.tagName && element.tagName.toLowerCase() === 'input' && element.type ===
                                    'text') {
                                    combinedText += `Password:\n${element.value}\n`;
                                }
                            });

                            navigator.clipboard.writeText(combinedText.trim()).then(() => {
                                alert("Copied the text:\n" + combinedText.trim());
                            }).catch(err => {
                                console.error('Could not copy text: ', err);
                            });
                        }
                    </script>

                    <script>
                        function copyAll{{ $key }}() {
                            const quotationElements = document.querySelectorAll("[data-copy-target='quotation-copy{{ $key }}']");
                            const specSheetElements = document.querySelectorAll("[data-copy-target='spec-sheet-copy{{ $key }}']");
                            let combinedText = '';

                            quotationElements.forEach(element => {
                                if (element.tagName && element.tagName.toLowerCase() === 'a') {
                                    combinedText += `Quotation PDF:\n${element.href}\n`;
                                } else if (element.tagName && element.tagName.toLowerCase() === 'input' && element.type ===
                                    'text') {
                                    combinedText += `Quotation Password: ${element.value}\n\n`;
                                }
                            });

                            specSheetElements.forEach(element => {
                                if (element.tagName && element.tagName.toLowerCase() === 'a') {
                                    combinedText += `Spec. Sheet PDF:\n${element.href}\n`;
                                } else if (element.tagName && element.tagName.toLowerCase() === 'input' && element.type ===
                                    'text') {
                                    combinedText += `Spec Sheet Password: ${element.value}\n`;
                                }
                            });

                            navigator.clipboard.writeText(combinedText.trim()).then(() => {
                                alert("Copied the text:\n" + combinedText.trim());
                            }).catch(err => {
                                console.error('Could not copy text: ', err);
                            });
                        }
                    </script>

                    <div class="flex justify-end mt-4">
                        <button
                            class="text-white inline-flex items-center bg-primary hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            onclick="copyAll{{ $key }}()">COPY ALL</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function shareQuotationButton{{ $key }}() {
        let share_button = document.getElementById('share-button-{{ $key }}')
        let share_modal = document.getElementById('popup-modal-share-{{ $key }}')
        let share_close_button = document.getElementById('share-close-button-{{ $key }}')
        let overlay = document.getElementById('overlay-share-{{ $key }}');

        share_modal.classList.remove('hidden')

        share_close_button.addEventListener('click', function() {
            share_modal.classList.add('hidden')
        });

        window.addEventListener('click', function(event) {
            if (event.target == overlay) {
                share_modal.classList.add('hidden')
            }
        });
    }
</script>
