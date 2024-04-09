
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
    @if(session('alert'))
        <div class="alert alert-danger" role="alert">
            Nome duplicado, algum terapeuta já esta registrado com esse nome, por favor escolher um nome diferente.
        </div>
    @endif

<div class="login-wrap">
    <div class="login-html">
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="name" class="label">Nome</label>
                        <input id="name" type="text" class="input" name="name" :value="old('name')" required autofocus autocomplete="name">
                    </div>
                    <div class="group">
                        <label for="email" class="label">Email</label>
                        <input id="email" type="email" class="input" name="email" :value="old('email')" required autocomplete="username">
                    </div>
                    <div class="group">
                        <label for="password" class="label">Senha</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password" required autocomplete="new-password"> 
                    </div>
                    <div class="group">
                        <label for="password_confirmation" class="label">Confirme a senha</label>
                        <input id="password_confirmation" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Cadastrar">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>
