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
Como o sistema foi desenvolvido para usar em empresa e não ao público apenas que pode acessar são o usuários que criamos no banco de dados com um e-mail de domínio.

> * A senha foi protegida e criptografada para termos mais segurança 
> * Usamos algumas sequências de escape para evitarmos a vulnerabilidade com temido **SQL Injection**.
> * Ao efetuar o login usamos uma captura de sessão para validarmos quem está logado no sistema. Caso a sessão não estiver ativa validamos o login para voltar para página de login para termos mais segurança.

___
 
 2. Seja bem vindo:

<img height="300" src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/bemvindo.png?raw=true">

Nesta tela capturamos o nome do usuário em uma sessão e apenas exibimos uma imagem com a sessão para identificar.

___

3. Home

<img height="300" src="https://github.com/joaovc800/Sistema_de_registros/blob/main/images/home.png?raw=true">

Aqui temos nossa **home page** uma página de apresentação e uma breve introdução do sistema

> Nota: Wit Solutions  é o nome da nossa empresa fictícia e o nome do nosso time de desenvolvimento desta aplicação web.

Na Home temos alguns elementos base que todas as páginas terão:

* Menu superior 
* Menu lateral
* Toglle Button azul
* Roda pé do menu lateral

> Os itens acima são fixos para todas as páginas porém quando o sistema chega da responsividade para celular a side bar é ocultada para melhor visibilidade.
