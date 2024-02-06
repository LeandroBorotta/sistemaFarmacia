@component('mail::message')

    Hi, {{ $user->name }}. Esqueceu-se da sua palavra-passe?

    <p>Acontece. Clique no link abaixo para redefinir sua senha</p>


        @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
            Redefinir sua senha
        @endcomponent
 
    <p>
        no caso de você ter problemas para recuperar sua senha, entre em contato usando a página de contato como Obrigado. 
    </p> <br>
    {{ config('app.name') }}

@endcomponent