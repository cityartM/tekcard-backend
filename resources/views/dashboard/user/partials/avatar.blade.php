<x-card-image
    url="{{  $edit ? $user->present()->avatar : url('assets/media/avatars/150-26.jpg') }}"
    information="{{ __('app.information_avatar') }}"
/>
