<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>

</p>

# Rodar localmente
 Pré-requisitos
Antes de iniciar a instalação do Laravel, certifique-se de que sua máquina atenda aos seguintes requisitos:

PHP >= 7.3
Extensões PHP: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
Composer
MySQL ou outro banco de dados relacional

## comandos
### clonar projeto
`git clone https://github.com/seunome/projeto-laravel.git`
### Acesse o diretório do projeto
`cd projeto-larave`
### Instale as dependências do projeto com o composer
`composer install`

### Crie um arquivo .env
`cp .env.example .env`

### Gere uma chave única para a aplicação Laravel:
`php artisan key:generate`

### Configure as informações de acesso ao banco de dados no arquivo .env. Por exemplo:
` DB_CONNECTION=mysql            

    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nomedobanco
    DB_USERNAME=usuariodobanco
    DB_PASSWORD=senhadobanco
`

### Inicie o servidor local para testar a aplicação:
`php artisan serve`
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



[![CodeTime badge](https://img.shields.io/endpoint?style=social&url=https%3A%2F%2Fapi.codetime.dev%2Fshield%3Fid%3D17260%26project%3D%26in%3D0)](https://codetime.dev)
