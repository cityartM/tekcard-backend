<footer>
    <div class=" px-6 py-16">
        <div class="mx-auto max-w-7xl flex flex-col items-center justify-center">
            <div class="w-full h-full py-16 grid grid-cols-1 md:grid-cols-3 items-center gap-10">
                <div>
                    <div class="flex justify-center items-center h-[2.64rem]">
                        <img src="/images/logo.png" alt="logo" class="h-full w-auto">
                    </div>
                    <p class="text-center text-gray-600 text-[1.25rem] text-bold mt-6"> {{ __('Your path to a healthy life') }}  </p>
                </div>

                <div class="flex flex-col space-y-6">
                    <p class="text-center text-gray-600 text-[1.25rem] text-bold">{{ __('Our applications') }}</p>
                    <div class="mt-10 grid grid-cols-1 items-stretch gap-6">
                        <a href="#" class="h-16">
                            <img class="h-full w-full object-contain" src="{{ asset('images/playstore1.png') }}" alt="playstore">
                        </a>
                        <a href="#" class="h-16">
                            <img class="h-full w-full object-contain" src="{{ asset('images/appstore1.png') }}" alt="appstore">
                        </a>
                    </div>
                </div>

                <div class="flex flex-col space-y-6">
                    <div>
                        <div class="flex items-center justify-center gap-6">
                            <a href="https://www.threads.net/@gratuito.offical" target="_blank" class="flex-shrink-0 w-12 h-12 inline-flex justify-center items-center bg-gray-50 rounded-full hover:shadow hover:bg-white">
                                <svg class="h-6 w-6 text-gray-700" viewBox="0 0 320 512" fill="currentColor"><!--! threads -->
                                    <path d="M331.5 235.7c2.2 .9 4.2 1.9 6.3 2.8c29.2 14.1 50.6 35.2 61.8 61.4c15.7 36.5 17.2 95.8-30.3 143.2c-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2c-32.3-41-48.9-98.1-49.5-169.6V256v-.2C17 184.3 33.6 127.2 65.9 86.2C102.2 40.1 156.2 16.5 226.4 16h.3c70.3 .5 124.9 24 162.3 69.9c18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4c-29.2-35.8-73-54.2-130.5-54.6c-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3c28 35.6 71.2 53.9 128.2 54.4c51.4-.4 85.4-12.6 113.7-40.9c32.3-32.2 31.7-71.8 21.4-95.9c-6.1-14.2-17.1-26-31.9-34.9c-3.7 26.9-11.8 48.3-24.7 64.8c-17.1 21.8-41.4 33.6-72.7 35.3c-23.6 1.3-46.3-4.4-63.9-16c-20.8-13.8-33-34.8-34.3-59.3c-2.5-48.3 35.7-83 95.2-86.4c21.1-1.2 40.9-.3 59.2 2.8c-2.4-14.8-7.3-26.6-14.6-35.2c-10-11.7-25.6-17.7-46.2-17.8H227c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6 .4 99.9 39.5 103.7 107.7l-.2 .2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3c25.6-1.4 54.6-11.4 59.5-73.2c-13.2-2.9-27.8-4.4-43.4-4.4c-4.8 0-9.6 .1-14.4 .4c-42.9 2.4-57.2 23.2-56.2 41.8l-.1 .1z"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com/gratuitoffical" target="_blank" class="flex-shrink-0 w-12 h-12 inline-flex justify-center items-center bg-gray-50 rounded-full hover:shadow hover:bg-white">
                                <svg class="h-6 w-6 text-gray-700" viewBox="0 0 320 512" fill="currentColor"><!--! x-twitter --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                            </a>
                            <a href="https://www.instagram.com/gratuito.offical/" target="_blank" class="flex-shrink-0 w-12 h-12 inline-flex justify-center items-center bg-gray-50 rounded-full hover:shadow hover:bg-white">
                                <svg class="h-6 w-6 text-gray-700" viewBox="0 0 320 512" fill="currentColor"><!--! instagram --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                            </a>
                            <a href="https://www.facebook.com/gratuito.offical/" target="_blank" class="flex-shrink-0 w-12 h-12 inline-flex justify-center items-center bg-gray-50 rounded-full hover:shadow hover:bg-white">
                                <svg class="h-6 w-6 text-gray-700" viewBox="0 0 320 512" fill="currentColor"><!--! facebook --><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                            </a>
                            <a href="https://www.youtube.com/channel/UCwPD4Q5zCsovTfhztBNI0Zw" target="_blank" class="flex-shrink-0 w-12 h-12 inline-flex justify-center items-center bg-gray-50 rounded-full hover:shadow hover:bg-white">
                                <svg class="h-6 w-6 text-gray-700" viewBox="0 0 576 512" fill="currentColor"><!--! youtube --><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>
                            </a>
                            <a href="https://www.youtube.com/channel/UCwPD4Q5zCsovTfhztBNI0Zw" target="_blank" class="flex-shrink-0 w-12 h-12 inline-flex justify-center items-center bg-gray-50 rounded-full hover:shadow hover:bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="90" height="90" viewBox="0,0,256,256">
                            <g class="h-6 w-6 text-gray-700" viewBox="0 0 576 512" fill="currentColor"><g transform="scale(8.53333,8.53333)"><path d="M24,4h-18c-1.105,0 -2,0.895 -2,2v18c0,1.105 0.895,2 2,2h18c1.105,0 2,-0.895 2,-2v-18c0,-1.105 -0.896,-2 -2,-2zM22.689,13.474c-0.13,0.012 -0.261,0.02 -0.393,0.02c-1.495,0 -2.809,-0.768 -3.574,-1.931c0,3.049 0,6.519 0,6.577c0,2.685 -2.177,4.861 -4.861,4.861c-2.684,-0.001 -4.861,-2.178 -4.861,-4.862c0,-2.685 2.177,-4.861 4.861,-4.861c0.102,0 0.201,0.009 0.3,0.015v2.396c-0.1,-0.012 -0.197,-0.03 -0.3,-0.03c-1.37,0 -2.481,1.111 -2.481,2.481c0,1.37 1.11,2.481 2.481,2.481c1.371,0 2.581,-1.08 2.581,-2.45c0,-0.055 0.024,-11.17 0.024,-11.17h2.289c0.215,2.047 1.868,3.663 3.934,3.811z"></path></g></g>
                            </svg></a>
                        </div>
                    </div>
                    <a href="mailto:info@gratuito.app" class="flex items-center justify-center gap-4">
                        <div class="p-4 rounded-full bg-green-700">
                            <svg class="h-4 w-4 text-gray-50" viewBox="0 0 512 512" fill="currentColor"><!--! envelope --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                        </div>
                        <div class="text-[1.625rem] font-bold text-[#02AB9E] leading-[normal]">
                            info@gratuito.app
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-7xl flex flex-col items-center justify-center">
            <div class="w-full h-full flex items-center justify-center">
                <div>
                    <p class="text-center text-gray-600 text-[1.25rem] text-bold mt-6">
                    {{ __('All rights reserved for the company') }} <span class="text-[#02AB9E]"> {{ __('Gratuito') }} </span> {{ \Carbon\Carbon::now()->format('Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
