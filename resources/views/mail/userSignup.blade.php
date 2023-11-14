@component('mail::message')

# Salam {{ $user->email }}!

Nous vous remercions de l'intérêt que vous portez à notre service, nous avons examiné votre inscription, et nous sommes heureux de vous annoncer que nous avons activé votre compte.
Ci-dessous vous trouverez vos informations de connexion.

Pour référence, voici vos informations de connexion :


**E-mail**: {{ $user->email }}<br>
**Mot de passe**: {{ $user->password }}<br>
**Statut**: <span style="background:green; color:white">{{ $user->status }}</span>

@component('mail::button', ['url' => env("APP_FRONT_URL", "https://justravel.pro"), 'color' => 'success'])
Connexion
@endcomponent

Si vous avez des questions, vous pouvez contacter notre centre d'assistance.


Salutations,<br>
{{ setting('app_name') }}

@endcomponent
