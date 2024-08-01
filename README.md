Projeto de Teste de PDF com Laravel-Dompdf
Este projeto é um exemplo básico de como gerar e baixar um PDF utilizando o Laravel e a biblioteca Dompdf.

Pré-requisitos
PHP >= 7.3
Composer
Laravel >= 8.0
Instalação
Clone o repositório:

git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
Instale as dependências do projeto:

composer install
Copie o arquivo .env.example para .env e configure seu banco de dados e outras variáveis de ambiente:

cp .env.example .env
php artisan key:generate
Instale o pacote barryvdh/laravel-dompdf:

composer require barryvdh/laravel-dompdf
Uso
Controlador
O controlador TestePDFController contém o método download que gera o PDF a partir de uma view:

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class TestePDFController extends Controller
{
    public function download()
    {
        $data = [
            'title' => 'Teste PDF',
            'date' => date('d/m/Y')
        ];

        $pdf = Pdf::loadView('pdf', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}

View
A view pdf.blade.php é utilizada para definir o conteúdo e o layout do PDF:

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $data['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $data['title'] }}</h1>
        <p>Data: {{ $data['date'] }}</p>
    </div>
    <div class="content">
        <p>Este é um exemplo de conteúdo para o PDF.</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Teste PDF.</p>
    </div>
</body>
</html>
Rota
A rota para download do PDF é definida no arquivo web.php:

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestePDFController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/download', [TestePDFController::class , 'download'])->name('download');

Executando o Projeto
Para iniciar o servidor de desenvolvimento do Laravel, utilize o seguinte comando:

php artisan serve
Acesse o projeto em seu navegador: http://localhost:8000. Para baixar o PDF gerado, acesse http://localhost:8000/download.