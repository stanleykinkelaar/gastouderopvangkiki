<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw contactformulier bericht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .content {
            background: #f9fafb;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field strong {
            display: block;
            color: #6366f1;
            margin-bottom: 5px;
        }
        .message-content {
            background: white;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #6366f1;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Nieuw bericht van contactformulier</h2>
        <p>Gastouderopvang Kiki</p>
    </div>
    
    <div class="content">
        <div class="field">
            <strong>Naam:</strong>
            {{ $contactName }}
        </div>
        
        <div class="field">
            <strong>E-mailadres:</strong>
            {{ $contactEmail }}
        </div>
        
        @if($contactPhone)
        <div class="field">
            <strong>Telefoonnummer:</strong>
            {{ $contactPhone }}
        </div>
        @endif
        
        <div class="field">
            <strong>Bericht:</strong>
            <div class="message-content">
                {!! nl2br(e($contactMessage)) !!}
            </div>
        </div>
        
        <hr>
        <p><em>Dit bericht is verzonden via het contactformulier op gastouderopvangkiki.nl</em></p>
    </div>
</body>
</html>