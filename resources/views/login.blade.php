
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href={{ asset( "css/style.css" ) }} type="text/css">
</head>
<body>
       <div class="box_login">
        <div class="capa">
          </div>
        <h1>FAÇA SEU LOGIN</h1>
        <form method= "POST" action="{{route('auth')}}">
            @csrf
            <input type="number_format" name="RAP" placeholder="RA/RP" required>
            <input type="password" name="password" placeholder="Senha" required>

            <button type="submit" class="btn-login">ENTRAR</button>
        </form>
        <div class="ney">

    </div>
</body>
</html>