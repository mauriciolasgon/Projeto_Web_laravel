<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href= {{ asset( "css/materias.css" ) }}>
</head>
<body>
     <div class="box_background">
        <div class="faixa">
            <div class="ney">
                    <div class="caixa1">
                      <div class="caixa2">
                         <div class="caixa3">
                            <div class="caixa4">
                                 <div class="caixa5">
                                     <div class="caixa6">
                                      </div>
                                        <div class="caixao">
                                            <div class="cal">
                                             </div>
                                             <div class="osc">
                                                </div>
                                               <div class="pi">
                                                </div>
                                                   <div class="eng">
                                                     </div>
                                                       <div class="teo">
                                                          </div>
                                                            <div class="rob">
                                                               </div>
                                                                 
                                                                                         
                                            
        <form>
      
            <button class="btn-materia1"><a  href="/Materias/{{$materias[2]->materias}}">Cálculo I</a></button>               
                <button class="btn-materia2" ><a href="/Materias/{{$materias[0]->materias}}" >OSC</a></button>                   
                    <button class="btn-materia3" ><a href="/Materias/{{$materias[1]->materias}}">Projeto Web</a></button>                       
                        <button class="btn-materia4"><a href="/Materias/{{$materias[3]->materias}}">Robótica</a></button>                       
                            <button class="btn-materia5" ><a href="/Materias/{{$materias[4]->materias}}">Teologia</a></button>                                
                                <button class="btn-materia6"><a href="/Materias/{{$materias[5]->materias}}">Fund. Eng.</a></button>
                                   
                               
                                   
        </form>                                                                                
     </div>    
     
</body>
</html>