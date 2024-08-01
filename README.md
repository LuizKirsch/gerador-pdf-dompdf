
# gerador-pdf-dompdf

Este projeto é um exemplo básico de como gerar e baixar um PDF utilizando o Laravel e a biblioteca Dompdf.

## Pré-requisitos

- PHP >= 7.3
- Composer
- Laravel >= 8.0
## Instalação

Clone o repositório:

```bash
https://github.com/LuizKirsch/gerador-pdf-dompdf.git
```
Vá para a pasta do projeto:
```bash
cd gerador-pdf-dompdf
```
Instale as dependências do projeto:
```bash
composer install
```
Copie o arquivo .env.example para .env e configure seu banco de dados e outras variáveis de ambiente:
```bash
cp .env.example .env
php artisan key:generate
```

## Uso

Controller:

```php
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

        $pdf = PDF::loadView('pdf', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}

```

View:
```blade
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
```
Rota:
```php
<?php

  use App\Http\Controllers\TestePDFController;

  Route::get('/download', [TestePDFController::class , 'download'])->name('download');
```

