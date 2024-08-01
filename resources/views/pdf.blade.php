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
