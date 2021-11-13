# Tutorial do projeto

## Primeiramente clonar o projeto na máquina
git clone https://github.com/gersonvinicius/test-rits.git

## Dados do banco
Criar um banco de dados, e definir as configurações no arquivo .env

## Comando pra gerar key
php artisan key:generate

## Comando pra migrate
php artisan migrate

## Execute o projeto e abra o link gerado do host
php artisan serve

## Tela home do projeto
No canto superior direito existem 2 links, login e register, primeiramente registre-se

## Após registrar-se
Após se registrar, cairá na tela de dashboard do painel

## Menu
No menu temos Produtos que é o Crud completo e a listagem de clientes e pedidos

## Crud Produtos
Basta clicar em 'add produto' que cairá na tela de create, colocar nome e preço, ambos necessários, e o preço em formato 0.00
Também é possivel editar, visualizar e excluir o produto

## Listagem de clientes e pedidos
Basta clicar em Listar Clientes ou Listar pedidos que será listado os mesmos caso haja cadastro

# API

## Crud cliente
Para cadastrar um cliente foi utilizado nos testes o postman como software, mas basta enviar os dados pela url do navegador

## Urls de teste -
    NECESSÁRIO TODOS OS CAMPOS PARA CADASTRO E UPDATE
    LISTAGEM - MÉTODO GET
    http://127.0.0.1:8000/api/clients

    CADASTRO - MÉTODO POST - caso tente cadastrar com email igual ou phone, nao dará certo pois é unique
    http://127.0.0.1:8000/api/clients?name=teste&email=email@email.com&phone=18988776655&address=rua de testes
    http://127.0.0.1:8000/api/clients?name=teste 2&email=email2@email.com&phone=18988775566&address=rua de testes 2
    
    VER - MÉTODO GET - 1 = id do cliente
    http://127.0.0.1:8000/api/clients/1

    UPDATE - MÉTODO PUT - 1 = id do cliente
    http://127.0.0.1:8000/api/clients/1?name=teste 3&email=email3@email.com&phone=18900887755&address=endereço teste

    DELETE - MÉTODO DELETE - 1 = id do cliente
    http://127.0.0.1:8000/api/clients/1

## Cadastrar pedido
Para cadastrar um pedido foi utilizado nos testes o postman como software, mas basta enviar os dados pela url do navegador

## Urls de teste - 
    LISTAGEM - MÉTODO GET - retorna todos os pedidos
    http://127.0.0.1:8000/api/orders

    LISTAGEM POR CLIENTE - retorna os pedido do client especifico - 2 é o id do client 
    http://127.0.0.1:8000/api/orders/list/2

    CADASTRO - MÉTODO POST id = id do client do pedido
    --- LEMBRANDO QUE OS PRODUTOS E O CLIENTE PRECISAM EXISTIR ANTES --- 
    http://127.0.0.1:8000/api/orders?date=2020-10-05&status=Em preparo&products[]=1&products[]=2&id=2

    UPDATE - MÉTODO PUT
    http://127.0.0.1:8000/api/orders/2?status=Entrega

    VER - MÉTODO GET - 2 é o id do pedido
    http://127.0.0.1:8000/api/orders/2

    DELETAR - MÉTODO DELETE - 2 é o pedido a ser deletado e id_logado é o usuário logado, ambos valores precisam ser iguais pra exclusão acontecer
    http://127.0.0.1:8000/api/orders/2?id_logado=2
