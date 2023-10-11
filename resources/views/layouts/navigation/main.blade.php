<header class="fixed inset-x-0 top-0 z-[110] bg-white border-b shadow">
    <div class="mx-auto max-w-7xl px-6 py-6 border-b">
        <div class="flex justify-center items-center h-8">
            <img src="/images/logo.png" alt="logo" class="h-full w-auto">
        </div>     
    </div>
    
    <div class="mx-auto max-w-7xl">
        <div
            x-data="{
            items: [
              { name: '{{ __('Home') }}', href: '#', current: true },
              { name: '{{ __('Significance') }}', href: '#', current: false },
              { name: '{{ __('App') }}', href: '#', current: false },
              { name: '{{ __('Video') }}', href: '#', current: false }
            ]
          }"
            class="flex justify-center items-center"
        >
            <ul class="flex items-center md:space-x-4 px-6 py-6">
                <template x-for="item in items" :key="index">
                    <li class="inline-block">
                        <a
                            :href="'#'+item.name"
                            class="text-gray-500 hover:text-[#02AB9E] px-3 py-2 rounded-md text-base font-semibold"
                            :class="{'text-[#02AB9E]': item.current, 'hover:text-[#02AB9E]': !item.current}"
                            x-text="item.name"
                        ></a>
                    </li>
                </template>
                <li class="inline-block">
                    <div
                        class="relative flex items-center justify-center"
                        x-data="{ open: false }"
                    >
                        <span class="sr-only">Language switcher</span>
                        <button
                            @click="open = !open"
                            type="button"
                            class="inline-flex items-center gap-2 text-gray-500 hover:text-[#02AB9E] rounded-md text-base font-semibold"
                        >
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 10.2319C0.5 4.98545 4.75352 0.731934 10 0.731934C15.2465 0.731934 19.5 4.98545 19.5 10.2319C19.5 15.4784 15.2465 19.7319 10 19.7319C4.75352 19.7319 0.5 15.4784 0.5 10.2319ZM10 2.08908C5.50305 2.08908 1.85714 5.73498 1.85714 10.2319C1.85714 14.7289 5.50305 18.3748 10 18.3748C14.497 18.3748 18.1429 14.7289 18.1429 10.2319C18.1429 5.73498 14.497 2.08908 10 2.08908Z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.094 3.66482C7.02197 1.99423 8.39454 0.731934 9.99996 0.731934C11.6054 0.731934 12.9779 1.99423 13.9059 3.66482C14.8557 5.37462 15.4569 7.69611 15.4569 10.2319C15.4569 12.7678 14.8557 15.0892 13.9059 16.799C12.9779 18.4696 11.6054 19.7319 9.99996 19.7319C8.39454 19.7319 7.02197 18.4696 6.094 16.799C5.14425 15.0892 4.54297 12.7678 4.54297 10.2319C4.54297 7.69611 5.14425 5.37462 6.094 3.66482ZM7.2804 4.32383C6.45664 5.80681 5.90011 7.89603 5.90011 10.2319C5.90011 12.5678 6.45664 14.6571 7.2804 16.14C8.12594 17.6622 9.14259 18.3748 9.99996 18.3748C10.8573 18.3748 11.874 17.6622 12.7195 16.14C13.5433 14.6571 14.0998 12.5678 14.0998 10.2319C14.0998 7.89603 13.5433 5.80681 12.7195 4.32383C11.874 2.80164 10.8573 2.08908 9.99996 2.08908C9.14259 2.08908 8.12594 2.80164 7.2804 4.32383Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.56551 3.95791C3.78247 3.65233 4.20607 3.58049 4.51165 3.79745C6.01849 4.86729 7.92282 5.51025 9.9999 5.51025C12.077 5.51025 13.9813 4.86729 15.4882 3.79745C15.7937 3.58049 16.2173 3.65233 16.4343 3.95791C16.6513 4.26349 16.5794 4.68709 16.2738 4.90404C14.5371 6.1371 12.3581 6.8674 9.9999 6.8674C7.64168 6.8674 5.4627 6.1371 3.72598 4.90404C3.4204 4.68709 3.34856 4.26349 3.56551 3.95791Z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72598 15.5595C5.4627 14.3265 7.64168 13.5962 9.9999 13.5962C12.3581 13.5962 14.5371 14.3265 16.2738 15.5595C16.5794 15.7765 16.6513 16.2001 16.4343 16.5057C16.2173 16.8113 15.7937 16.8831 15.4882 16.6661C13.9813 15.5963 12.077 14.9533 9.9999 14.9533C7.92282 14.9533 6.01849 15.5963 4.51165 16.6661C4.20607 16.8831 3.78247 16.8113 3.56551 16.5057C3.34856 16.2001 3.4204 15.7765 3.72598 15.5595Z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.32153 19.0533V1.4104H10.6787V19.0533H9.32153Z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.17847 9.55347H18.8213V10.9106H1.17847V9.55347Z"/>
                            </svg>
                            <span class="md:hidden">{{ app()->getLocale() }}</span>
                            <span class="hidden md:inline">{{ config('translation.locales')[app()->getLocale()] }}</span>
                        </button>
                        <ul
                            x-show="open" @click.outside="open=false"
                            class="absolute right-0 w-40 h-64 mt-2 bg-white border rounded-md shadow-xl overflow-y-scroll"
                            style="display: none;"
                        >
                            @foreach(config('translation.locales') as $locale => $name)
                            <li class="block">
                                <a
                                    href="{{ route('lang', $locale) }}"
                                    class="block text-gray-500 hover:text-[#02AB9E] px-4 py-4 rounded-md text-base font-semibold"
                                >
                                    <span class="md:hidden">{{ $locale }}</span>
                                    <span class="hidden md:inline">{{ $name }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
