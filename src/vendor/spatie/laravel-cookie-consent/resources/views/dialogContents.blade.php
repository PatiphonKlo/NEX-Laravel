<div class="js-cookie-consent cookie-consent">
    <div class="fixed z-50 inset-0 bg-gray-800 bg-opacity-50 transition-opacity"></div>
    <div style="background-color: #232631;" class=" w-screen px-6 fixed inset-x-0 bottom-0 py-4 z-50 text-center">
        <div class="flex items-center justify-center flex-nowrap">
            <div class="inline">
                <p class="font-normal text-left ml-3 text-white cookie-consent__message">
                    {!! trans('cookie-consent::texts.message') !!} <a class="underline cursor-pointer break-words" href="https://pdpa.pro/policies/view/th/W8KUPWQf5kPgft1rgbJdy4kE">อ่านนโยบายเพิ่มเติม</a>
                </p>
            </div>
            <button type="button" style="border: 2px solid #16a34a; background: #16a34a;" class="p-4 px-6 js-cookie-consent-agree cookie-consent__agree lg:mt-0 ml-2 md:ml-6 w-20 text-white cursor-pointer flex items-center justify-center rounded-lg text-sm font-semibold  hover:bg-green-800">
                {{ trans('cookie-consent::texts.agree') }}
            </button>
        </div>
    </div>
</div>
