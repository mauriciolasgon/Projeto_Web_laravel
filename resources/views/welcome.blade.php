<html>
    <head>
    <link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
    </head>
    <body>
        <div class="login">
         <div class="avatar">
    </div>
    <h2>login</h2>
    <h3>Insira seus dados</h3>
    <form class="login-form"  method="POST" action="{{ route('login') }}">
    @csrf
        <div class="textbox">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            

        </span>
</div>
<div class="textbox">
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    <span class="material-symbols-outlined">
        
</span>
</div>
<button type="submit">LOGIN</button>
</form>
<a  href="{{ route('registro' ,3) }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
    Registre-se
</a>

</div>
    
</body>
</html>
