<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Psicotech </title>
    <!-- Include your stylesheet -->
    <link href="{{ asset('/login-assets/styles.css')}}" rel="stylesheet">
</head>
<body>

    @if(session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    

    
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="email" class="label">E-mail</label>
                            <input id="email" type="email" class="input" name="email" :value="old('email')" required autofocus autocomplete="username">
                        </div>
                        <div class="group">
                            <label for="password" class="label">Senha</label>
                            <input id="password" type="password" class="input" data-type="password" name="password" required autocomplete="current-password">
                        </div>
                        <div class="group">
                            <input id="remember_me" type="checkbox" class="check" checked>
                            <label for="remember_me"><span class="icon"></span> Mantenha-me logado</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Entrar">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            @if (Route::has('password.request'))
                            @endif
                            <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
