<footer class="relative px-[5%] bg-center bg-cover bg-no-repeat"
    style="background-image: url('{{ url('assets/images/footer-bg.jpg') }}');">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-[#ff7bac]/90 z-0"></div>

    <!-- Content -->
    <div class="relative z-10 pt-10 ">
        <!-- Top Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo + Description + Social -->
            <div>
                <a href="{{ url('/') }}" class="mb-3">
                    <img src="{{ url('assets/images/logo-dark.png') }}" alt="Super Técnico 24"
                        class="rounded-full p-1 h-20 object-contain" />
                </a>
                <p class="mb-4 text-sm">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores quaerat a deleniti aliquid in
                    fugit voluptatem recusandae enim, quos beatae vero eligendi sed nihil blanditiis minus, rem maxime
                    corrupti mollitia!
                </p>
                <div class="flex space-x-4 text-lg">
                    <a href="https://www.facebook.com/" target="_blank">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5 0C5.60753 0 0 5.60753 0 12.5C0 19.392 5.60753 25 12.5 25C19.392 25 25 19.392 25 12.5C25 5.60753 19.393 0 12.5 0ZM15.6086 12.9401H13.575V20.1885H10.5615C10.5615 20.1885 10.5615 16.2279 10.5615 12.9401H9.12904V10.3782H10.5615V8.7212C10.5615 7.53444 11.1254 5.68003 13.6027 5.68003L15.8357 5.68859V8.1754C15.8357 8.1754 14.4788 8.1754 14.2149 8.1754C13.9511 8.1754 13.576 8.30732 13.576 8.87326V10.3787H15.872L15.6086 12.9401Z"
                                fill="black" />
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/" target="_blank">

                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.9434 14.8419L15.0094 12.5L10.9434 10.1582V14.8419Z" fill="black" />
                            <path
                                d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM20.3106 12.5128C20.3106 12.5128 20.3106 15.0478 19.989 16.2703C19.8088 16.9394 19.2812 17.4669 18.6121 17.647C17.3897 17.9688 12.5 17.9688 12.5 17.9688C12.5 17.9688 7.6231 17.9688 6.3879 17.6342C5.7188 17.4541 5.19123 16.9264 5.01099 16.2573C4.68922 15.0478 4.68922 12.5 4.68922 12.5C4.68922 12.5 4.68922 9.96513 5.01099 8.74271C5.19104 8.07362 5.73158 7.53307 6.3879 7.35302C7.61032 7.03125 12.5 7.03125 12.5 7.03125C12.5 7.03125 17.3897 7.03125 18.6121 7.3658C19.2812 7.54585 19.8088 8.07362 19.989 8.74271C20.3236 9.96513 20.3106 12.5128 20.3106 12.5128Z"
                                fill="black" />
                        </svg>

                    </a>
                    <a href="https://x.com/" target="_blank">

                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5 0C5.60753 0 0 5.60753 0 12.5C0 19.392 5.60753 25 12.5 25C19.392 25 25 19.392 25 12.5C25 5.60753 19.393 0 12.5 0ZM18.0763 9.63909C18.0819 9.76295 18.0849 9.88782 18.0849 10.0127C18.0849 13.8146 15.1917 18.1972 9.89839 18.1972C8.27358 18.1972 6.76106 17.7223 5.4882 16.9057C5.71326 16.9324 5.94236 16.9459 6.17447 16.9459C7.52286 16.9459 8.76299 16.4857 9.74785 15.7144C8.48908 15.6912 7.42619 14.8594 7.06014 13.716C7.23536 13.7492 7.41612 13.7678 7.6009 13.7678C7.86323 13.7678 8.118 13.7336 8.35918 13.6676C7.04302 13.4038 6.05162 12.2412 6.05162 10.8465C6.05162 10.8344 6.05162 10.8218 6.05212 10.8102C6.43982 11.0252 6.88341 11.1551 7.35469 11.1697C6.58332 10.6547 6.07528 9.77352 6.07528 8.77558C6.07528 8.24791 6.21677 7.75346 6.46449 7.32851C7.88286 9.06962 10.0036 10.2146 12.3943 10.3354C12.3449 10.1245 12.3202 9.90544 12.3202 9.67937C12.3202 8.09081 13.6082 6.80234 15.1968 6.80234C16.0245 6.80234 16.7712 7.15178 17.2969 7.71067C17.953 7.58177 18.5672 7.34311 19.1246 7.01231C18.9081 7.68448 18.4534 8.24791 17.8578 8.60439C18.4403 8.5349 18.9962 8.38083 19.5103 8.15174C19.1266 8.72775 18.6387 9.23477 18.0763 9.63909Z"
                                fill="black" />
                        </svg>

                    </a>
                    <a href="https://www.instagram.com/" target="_blank">

                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.8926 12.5C14.8926 13.8214 13.8214 14.8926 12.5 14.8926C11.1786 14.8926 10.1074 13.8214 10.1074 12.5C10.1074 11.1786 11.1786 10.1074 12.5 10.1074C13.8214 10.1074 14.8926 11.1786 14.8926 12.5Z"
                                fill="black" />
                            <path
                                d="M18.0952 8.26691C17.9802 7.95525 17.7967 7.67316 17.5583 7.4416C17.3267 7.20319 17.0448 7.0197 16.733 6.90469C16.48 6.80646 16.1001 6.68954 15.4003 6.65768C14.6433 6.62316 14.4163 6.61572 12.4998 6.61572C10.5831 6.61572 10.3561 6.62297 9.59928 6.65749C8.89948 6.68954 8.51934 6.80646 8.26662 6.90469C7.95477 7.0197 7.67267 7.20319 7.44131 7.4416C7.20289 7.67316 7.0194 7.95506 6.9042 8.26691C6.80597 8.51983 6.68905 8.89996 6.6572 9.59977C6.62267 10.3566 6.61523 10.5836 6.61523 12.5003C6.61523 14.4168 6.62267 14.6438 6.6572 15.4008C6.68905 16.1006 6.80597 16.4805 6.9042 16.7334C7.0194 17.0453 7.2027 17.3272 7.44112 17.5588C7.67267 17.7972 7.95457 17.9807 8.26643 18.0957C8.51934 18.1941 8.89948 18.311 9.59928 18.3429C10.3561 18.3774 10.5829 18.3846 12.4996 18.3846C14.4165 18.3846 14.6435 18.3774 15.4001 18.3429C16.0999 18.311 16.48 18.1941 16.733 18.0957C17.3589 17.8542 17.8537 17.3594 18.0952 16.7334C18.1934 16.4805 18.3103 16.1006 18.3424 15.4008C18.3769 14.6438 18.3841 14.4168 18.3841 12.5003C18.3841 10.5836 18.3769 10.3566 18.3424 9.59977C18.3105 8.89996 18.1936 8.51983 18.0952 8.26691ZM12.4998 16.1858C10.4641 16.1858 8.81384 14.5358 8.81384 12.5001C8.81384 10.4644 10.4641 8.81432 12.4998 8.81432C14.5353 8.81432 16.1855 10.4644 16.1855 12.5001C16.1855 14.5358 14.5353 16.1858 12.4998 16.1858ZM16.3313 9.52996C15.8556 9.52996 15.4699 9.14429 15.4699 8.6686C15.4699 8.19291 15.8556 7.80724 16.3313 7.80724C16.807 7.80724 17.1926 8.19291 17.1926 8.6686C17.1924 9.14429 16.807 9.52996 16.3313 9.52996Z"
                                fill="black" />
                            <path
                                d="M12.5 0C5.5975 0 0 5.5975 0 12.5C0 19.4025 5.5975 25 12.5 25C19.4025 25 25 19.4025 25 12.5C25 5.5975 19.4025 0 12.5 0ZM19.6344 15.4593C19.5997 16.2233 19.4782 16.745 19.3008 17.2016C18.928 18.1658 18.1658 18.928 17.2016 19.3008C16.7452 19.4782 16.2233 19.5995 15.4594 19.6344C14.694 19.6693 14.4495 19.6777 12.5002 19.6777C10.5507 19.6777 10.3064 19.6693 9.54075 19.6344C8.77686 19.5995 8.255 19.4782 7.79858 19.3008C7.31945 19.1206 6.88572 18.8381 6.52714 18.4729C6.16207 18.1145 5.87959 17.6805 5.69935 17.2016C5.52197 16.7452 5.40047 16.2233 5.36575 15.4594C5.33047 14.6938 5.32227 14.4493 5.32227 12.5C5.32227 10.5507 5.33047 10.3062 5.36556 9.54075C5.40028 8.77666 5.52158 8.255 5.69897 7.79839C5.87921 7.31945 6.16188 6.88553 6.52714 6.52714C6.88553 6.16188 7.31945 5.8794 7.79839 5.69916C8.255 5.52177 8.77666 5.40047 9.54075 5.36556C10.3062 5.33066 10.5507 5.32227 12.5 5.32227C14.4493 5.32227 14.6938 5.33066 15.4593 5.36575C16.2233 5.40047 16.745 5.52177 17.2016 5.69897C17.6805 5.87921 18.1145 6.16188 18.4731 6.52714C18.8381 6.88572 19.1208 7.31945 19.3008 7.79839C19.4784 8.255 19.5997 8.77666 19.6346 9.54075C19.6695 10.3062 19.6777 10.5507 19.6777 12.5C19.6777 14.4493 19.6695 14.6938 19.6344 15.4593Z"
                                fill="black" />
                        </svg>

                    </a>
                </div>
            </div>

            <!-- Links Section -->
            <div class="md:col-span-2 grid grid-cols-2 gap-8">
                <!-- Visit Us -->
                <div>
                    <h4 class="font-bold text-[16px] mb-4">Visit Us</h4>
                    <a href="{{ url('/') }}"
                        class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Home</a>
                    <!--<a href="#" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Who We Are</a>-->
                    <!--<a href="#" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Affiliate-->
                    <!--    Programs</a>-->
                    <a href="{{ url('workers') }}"
                        class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Workers</a>
                </div>

                <!-- For Client -->
                {{-- <div>
                    <h4 class="font-bold text-[16px] mb-4">For Client</h4>
                    <a href="#" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Pay and
                        Security</a>
                    <a href="#" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Reviews</a>
                </div> --}}

                <!-- Terms -->
                <div>
                    <h4 class="font-bold text-[16px] mb-4">Terms</h4>
                    <a href="{{url('about-us')}}" target="_blank" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">About us</a>
                    <a href="{{url('privacy-policy')}}" target="_blank" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Privacy Policy</a>
                    <a href="{{url('terms-and-conditions')}}" target="_blank" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Terms and
                        Conditions</a>
                    <!--<a href="#" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Copyright-->
                    <!--    Policy</a>-->
                    <!--<a href="#" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Code of-->
                    <!--    Conduct</a>-->
                    <!--<a href="#" class="block mb-2 opacity-80 hover:opacity-100 hover:underline">Fees and-->
                    <!--    Charged</a>-->
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <div class="my-5">
                <!--<p>-->
                <!--    Newsletter-->
                <!--</p>-->
                <!--<p>-->
                <!--    Stay up to date with our latest news, receive exclusive deals, and more.-->
                <!--</p>-->
                <!--<div class="border w-full sm:w-[400px] h-13 flex items-center my-3">-->
                <!--    <input type="text" class="bg-transparent h-full px-3 placeholder-black w-[80%]" placeholder="Email">-->
                <!--    <button class="bg-transparent border-l h-full text-center w-[20%]">Subscribe</button>-->
                <!--</div>-->
            </div>
        </div>

        <!-- Bottom -->
        <div class="text-center text-sm py-6 border-t ">
            Super Técnico 24 - © 2023 All Rights Reserved
        </div>
    </div>
</footer>
