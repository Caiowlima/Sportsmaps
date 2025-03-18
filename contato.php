<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/formu.css">
</head>

<body>
  <div class="container">
    <div class="form-image">
      <img src="img/undraw_swipe_profiles_re_tvqm.svg">
    </div>
    <div class="form">
        <div class="form-header">
          <div class="title">
            <h1>Cadastro</h1>
          </div>
        </div>
        <div class="script">
        <form action="script.php" method="POST">
        </div>
        <div class="input-group">
          <div class="input-box">
              <label for="name"><h3>Nome:  </h3></label>
              <input id="name" type="text" name="name" placeholder="Digite seu nome" required>   
          </div>
    
          <div class="input-box">
              <label for="email"><h3>E-mail: </h3></label>
              <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>   
          </div>
    
          <div class="input-box">
              <label for="age"><h3>Idade: </h3></label>
              <input id="age" type="date" name="age" placeholder="Digite sua idade" required>   
          </div>

          <div class="input-box">
            <label for="adress"><h3>Endereço: </h3></label>
            <input id="adress" type="text" name="adress" placeholder="Digite seu endereço" required>   
        </div>
    
          <div class="input-box">
              <label for="password"><h3>Senha: </h3></label>
              <input id="password" type="password" name="password" placeholder="Digite sua senha" required>   
          </div>
        </div>

        <div class="gender-inputs">
          <div class="gender-title">
            <h2>Gênero</h2>
          </div>
  
          <div class="gender-group">

          <div class="gender-input">
            <input type=radio id=Male name="gender">
            <label for="Male"> Masculino</label>
          </div>
              
            <div class="gender-input">
              <input type=radio id=female name="gender">
              <label for="female">Feminino</label>
            </div>

            <div class="gender-input">
              <input type=radio id=others name="gender">
              <label for="others">Outros</label>
            </div>

          </div>
        </div>
        <div class="interests">
          <div class="interests-title">
            <h2>Interesses</h2>
          </div>
  
          <div class="interests-group">
            <div class="interests-input-group"> 
                <input type=checkbox name="interests[]" value="Futebol"> Futebol
            </div>
            <div class="interests-input-group"> 
              <input type=checkbox name="interests[]" value="Volei"> Volei
            </div> 
              
            <div class="interests-input-group"> 
              <input type=checkbox name="interests[]" value="Dança"> Dança
            </div>
              
            
          </div>
        </div>
            
        <div class="states">
  
          <div class="states-title">
            <h2>Estado</h2>
          </div>
          <div class="states-group">
            <select name=estado[]>
             <option value=AC>AC</option>
             <option value=AL>AL</option>
             <option value=AP>AP</option>
             <option value=AM>AM</option>
             <option value=BA>BA</option>
             <option value=CE>CE</option>
             <option value=DF>DF</option>
             <option value=ES>ES</option>
             <option value=GO>GO</option>
             <option value=MA>MA</option>
             <option value=MT>MT</option>
             <option value=MS>MS</option>
             <option value=MG>MG</option>
             <option value=PA>PA</option>
             <option value=PB>PB</option>
             <option value=PR>PR</option>
             <option value=PE>PE</option>
             <option value=PI>PI</option>
             <option value=RJ>RJ</option>
             <option value=RN>RN</option>
             <option value=RS>RS</option>
             <option value=RO>RO</option>
             <option value=RR>RR</option>
             <option value=SC>SC</option>
             <option value=SP>SP</option>
             <option value=SE>SE</option>
             <option value=TO>TO</option>
            </select>
          </div>
        </div>
        

      <div class="bairro">
  
        <div class="bairro-title">
          <h2>Bairro</h2>
        </div>
        <div class="bairro-group">
          <select name=estado[]>
            <option value=AC>Selecione...</option>
           <option value=AC>ZONA LESTE</option>
           <option value=AL>ZONA NORTE</option>
           <option value=AP>CENTRO</option>
           <option value=AM>ZONA SUL</option>
           <option value=BA>ZONA OESTE</option>
          
          </select>
        </div>
      </div>
        
        <div class="cont-button">
            <button><a href="#"><h2>Cadastrar</h2></a></button>
        </div>
     
        

        
    </div>
  </div>