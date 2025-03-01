<button type="submit" {{$attributes->merge(['class' => 'btn btn-success'])}} id="saveBtn">
    <span class="svg-icon svg-icon-white svg-icon-2x">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
            </g>
        </svg>
    </span>
    <span class="indicator-label">{{__('Save Record')}}</span>
    <span class="indicator-progress">{{__("Please wait...")}}
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
</button>
