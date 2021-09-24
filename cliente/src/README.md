# Sistema De Registros

## Documentação

Bem vindos a nossa documentação do sistema de registros aqui iremos falar um pouco sobre as funcionalidades desse sistema.

> O Sistema de resgitros foi criado com o intuido de proporcionar uma melhor experiência para o usuário fazer um registro ou uma ocorrência.

### Tecnologias usadas
 |<img height="40" src="https://github.com/devicons/devicon/blob/master/icons/bootstrap/bootstrap-plain.svg">|<img height="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg">|<img height="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original.svg">|<img height="40" src="https://github.com/devicons/devicon/blob/master/icons/heroku/heroku-plain-wordmark.svg">
|--------------------------------|------------------------|---------------------------------|----------------------------------|
|<img height="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original.svg">|<img height="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg">|<img height="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/github/github-original.svg">|<img height="40" src="https://github.com/devicons/devicon/blob/master/icons/php/php-original.svg">|

> 1. Temos uma integração com o **Php, Heroku  e o github**, todos sincronizados.
> 2. Usamos algumas **variáveis de ambiente** na heroku para camuflarmos o arquivo de conexão com o banco de dados e não deixar as senhas visíveis.
> 3. Bootstrap e HTML usado para o front-end e criação das telas. 
>  4. Javascript é usados para algumas interações com o usuário principalmente nos botões para mostrar a senha e mascaras de input.
>  5. O banco foi escolhido o **MySQL** e precisamos usar uma add-on na heroku chamada clear-DB para suportar banco na cloud.

## Vamos Mostrar um pouco sobre o sistema

1. Tela de login:
<img height="300" src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/login.png?raw=true">

O login é bem simples e não tem segredo, basta apenas inserir o usuário e a senha de acesso e será redirecionado para **home page**.
Como o sistema foi desenvolvido para usar em empresa e não ao público apenas quem pode acessar são o usuários que criamos no banco de dados com um e-mail de domínio.

> * A senha foi protegida e criptografada para termos mais segurança 
> * Usamos algumas sequências de escape para evitarmos a vulnerabilidade com temido **SQL Injection**.
> * Ao efetuar o login usamos uma captura de sessão para validarmos quem está logado no sistema. Caso a sessão não estiver ativa validamos o login para voltar para página de login para termos mais segurança.

___
 
 2. Seja bem vindo:

<img height="300" src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/bemvindo.png?raw=true">

Nesta tela capturamos o nome do usuário em uma sessão e apenas exibimos uma imagem com a sessão para identificar.

___

3. Home

<img height="300" src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/homeimg.png?raw=true">

Aqui temos nossa **home page** uma página de apresentação e uma breve introdução do sistema

> Nota: Wit Solutions  é o nome da nossa empresa fictícia e o nome do nosso time de desenvolvimento desta aplicação web.

Na Home temos alguns elementos base que todas as páginas terão:

* Menu superior 
* Menu lateral
* Toglle Button azul
* Roda pé do menu lateral

> Os itens acima são fixos para todas as páginas porém quando o sistema chega da responsividade para celular a side bar é ocultada para melhor visibilidade.

___
4. Tela de inserir registro:

<img height="300" src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/registrar.png?raw=true">

Aqui iremos fazer o registos dos casos coletando os dados do mesmo, definindo um status de **"concluído"** ou **"pendente"**

> Se caso o registro for pendente ele ficará em aberto em uma página separada e especifica  para isso.

> Depois que a inserção foi feita com os dados incluindo que inseriu com dados da sessão do usuário ele irá mostrar na pagina de registos todos os dados da inserção e de quem  criou o registro e se alguém atualizou o mesmo.

---

5. Tela de visualização de registros
<img src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/registros_de_hoje.png?raw=true" alt="Registros">

A tela de registros irá mostrar apenas os registros incluídos na data atual para evitar que seja buscados muitos registros na mesma tela.
Aqui nesta página aparece:
>Informações do requisitante do caso;
>Dados para contato;
>Resolução do caso e o que foi tratado;
>Status (pendente ou concluído);

___

6. Tela de casos pendentes
<img src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/pendentes.png?raw=true" alt="Pendentes">

A aba de pendentes mostra todos os casos que ainda não foram resolvidos, então aqui iremos tratar esses registros conforme a demanda.

>Podemos fazer atualizações de status;
>Incluir mais registros caso necessário;
>Se concluirmos o mesmo será removido desta para não ocupar espaço;

___

7. Tela de Busca 
<img src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/buscar.png?raw=true" alt="Buscas">

Nesta tela temos três tipos de buscas:
> 1. Buscar por data;
> 2. Buscar por matricula ou RA;
> 3. Buscar por assunto
> ````
> Obs: a buscar por assunto, não precisa colocar o nome completo, basta apenas colocar uma parte da palavra.
> ````

As buscas trazem o mesmo tipo de informação como na imagem acima.

___
8. Perfil

<img src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/perfil.png?raw=true" alt="perfil">

No perfil iremos mostrar alguma informações básicas sobre o usuário assim como temos na imagem acima.
As informações do perfil são mudadas dinamicamente de acordo com o usuário.



# Alterar a senha

O procedimento de alteração de senha é bem simples basta apenas digitar a nova senha e repeti-la sem erro e a senha será alterada.

Por trás desse procedimento foi também aplicado uma criptografia para quando o usuário for alterar a senha ela ir **encriptada** para o banco armazenar e ter a senha gravada com mais segurança.

# Logoff

No ato de logoff no php é destruídas todas as sessões ativas e direcionamos o usuário via cabeçalho à index para fazer o login.
>Caso o usuário tente voltar para página via url sem estar com a sessão ativa o sistema irá bloquear a requisição até ele fazer o login.


## Hospedagem

Conforme havíamos falado o site está hospedado na heroku, segue o link abaixo

>[Site do time Wit](https://uni9.herokuapp.com/index.php)


>Usuário e senha apenas para membros do time
>Ou professores para teste que será enviado por e-mail


