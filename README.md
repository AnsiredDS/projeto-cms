## Projeto CMS 
Projeto simples de um CMS (Sistema de Gerenciamento de Conteúdo), na qual a inserção dos dados pelo formulário altera em tempo real a página principal (Home). Nesse CMS é possível:
<ul>
<li> Mudar o título, subtítulo e conteúdo da página principal; </li>
<li> Adicionar uma imagem que serve como banner; </li>
<li> Adicionar, remover e baixar documentos que serão mostrados na página principal. </li>
</ul>

## Como rodar e utilizar o projeto
<p> Como eu tenho pouca experiência com Docker, optei por usar o Xampp v3.3.0 e PHP 8.1.0 para esse projeto. O framework Laravel está na versão 10.20.0 Para rodar, basta iniciar o Apache e o MySQL no Xampp e depois rodar o comando <code>npm run build</code> para o design das páginas (Necessário Node para funcionar) e depois <code>php artisan server</code> para iniciar o servidor local. Também é necessário configurar um banco de dados SQL com o nome de "projeto-csm". Para utilizar os seeders feitos, basta rodar o comando <code>php artisan db:seed</code>, ou o comando <code>php artisan migrate:fresh --seed</code> caso queira apagar dados já existentes. </p>

<p> Já para utilizar o projeto, será necessário um login para visualizar o CMS. Através do seeder, pode-se usar o usuário já existente, com o email "bruno@gmail.com" e a senha "password". Também é possível criar uma conta. </p>

## Dificuldades
<p>Tive poucas dificuldades no processo de criação desse aplicativo. A minha maior dificuldade foi na validação de documentos para evitar documentos de nome igual, mas acabei conseguindo fazer a validação. Não teve nenhum recurso que eu tenha deixado de implementar, com exceção do tratamento de erros e exceções (Exception), pois não achei necessário seu uso no projeto.</p>
