<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

    <!-- Example Code -->
    
    <div class="btn-group" role="group" aria-label="Basic outlined example">
    <form method="POST" action="{{route('verifica')}}">
    @csrf
    <button  name="profissao" type="submit" class="btn btn-outline-primary" value="Aluno">Aluno</button>
    <button  name="profissao" type="submit" class="btn btn-outline-primary" value="Professor">Professor</button>
    </form>
    
    </div>
    
    <form class="row g-3 needs-validation" novalidate="">
    @csrf
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">Nome</label>
        <input type="text" class="form-control" id="validationTooltip01"  required="">
        <div class="valid-tooltip">
          Looks good!
        </div>
       </div>
       <div class="col-md-3">
       <label for="inputZip" class="form-label">CPF</label>
       <input type="text" class="form-control" id="inputZip" placeholder="000.000.000-00">
     </div>
     <div class="col-12">
       
         </label>
       </div>
     </div>
     <div class="col-md-6">
        <label for="validationTooltip01" class="form-label">Filmes</label>
        <input type="text" class="form-control" id="validationTooltip01" required="" placeholder="EX: John Wick"> >
        <div class="valid-tooltip">
          
        </div>
      </div>
      <form class="row g-3">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Senha</label>
        <input type="password" class="form-control" id="inputPassword4">
      </div>
      <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Confime a senha</label>
      <input type="password" class="form-control" id="inputPassword4">
    </div>
    <script type="text/javascript" src={{ asset("js/endereco.js") }}></script>
    <div class="col-md-2">
    <label for="inputZip" class="form-label">CEP</label>
    <input type="text" class="form-control" id="inputZip" placeholder="00000-000">
  </div>
  <div class="col-12">
    
      </label>
    </div>
  </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="rua aparecida , jardim america">
      </div>
      
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">Estado</label>
        <select id="inputState" class="form-select">
          <option selected>Escolha</option>
          <option>AC<option>AL<option>AP<option>AM<option>BA<option>CE<option>ES<option>GO<option>MA<option>MT<option>MS<option>MG<option>PA<option>PB<option>PR<option>PE<option>PI<option>RJ<option>RN<option>RS<option>RO<option>RR<option>SC<option>SP<option>SE<option>TO<option>DF</option>
        </select>
      </div>
     
          </label>
        </div>
      </div>
      
     
     
      
      
      
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Cadastrar</button>
      </div>
    </form>
    
    <!-- End Example Code -->
  </body>
</html>