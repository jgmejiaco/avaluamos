<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <style>
        .btn_disponibilidad
        {
            width: 120px !important;
            background-color: #21277B !important;
            color: #FFFFFF !important;
            font-size: 20px !important;
            text-decoration: none !important;
        }

        .btn
        {
            display:inline-block;
            padding:6px 12px;
            margin-bottom:0;
            font-size:14px;
            font-weight:400;
            line-height:1.42857143;
            text-align:center;
            white-space:nowrap;
            vertical-align:middle;
            -ms-touch-action:manipulation;
            touch-action:manipulation;
            cursor:pointer;
            -webkit-user-select:none;
            -moz-user-select:none;
            -ms-user-select:none;
            user-select:none;
            background-image:none;
            border:1px solid transparent;
            border-radius:4px;
        }
    </style>
</head>
<body>
    <p>Hola! <b>{{$usuario}}</b>,</p>
    <p>Has solicitado la recuperación de tu contraseña.</p>
    <p>Por favor, dar clic en el siguiente enlace para restablecerla</p>
    <p>
        <a href="{{route('actualizar_clave', $fecha)}}" class="btn">Actualizar Contraseña</a>
    </p>

    <p>Este mensaje es automático, por favor, no responder.</p>
    <p>Gracias.</p>
    <p><b>&copy; Avaluamos</b></p>
</body>
</html>
