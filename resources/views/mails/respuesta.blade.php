<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ver Mensaje y Respuesta</title>
  <meta name="viewport" content="width=device-width">
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
@php
  $id =$mensajeid;
  $mensaje = DB::select('select * from mensaje where id_mensaje = ?', [$id]);
@endphp
<center role="article" aria-roledescription="correo electrónico" lang="es" style="width: 100%; background-color: #ffffff;">
  <div style="max-width: 600px; margin: 0 auto;">
    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
      <tr>
        <td style="background-color: #ffffff; text-align: center; padding: 20px; color: white; font-size: 20px;">
          Respuesta del mensaje enviado
        </td>
      </tr>
      <tr>
        <td style="background-color: #f9f9f9; padding: 20px;">
            
            @foreach ($mensaje as $msg)
            <p>Estimado(a) {{$msg->nombre}},</p>
          <p>Hemos recibido y procesado su mensaje a nuestro sitio web
            <p>El cual se envió con el siguiente correo electrónico: {{$msg->email}}</p>
            <p>Su mensaje: {{$msg->mensaje}}</p>
           

            @if ($msg->respuesta)
            <p>Esta a sido nuestra respuesta a su mensaje:</p>
            <p>{{$msg->respuesta}}</p>
            @else
            <p>Aún no hay respuesta para este mensaje.</p>
            @endif
            @endforeach
        </td>
      </tr>
      <tr>
        <td style="text-align: center; padding: 10px; font-size: 12px; color: #666;">
          <p>Electromecanica RYR</p>
          <p>(+1)809 575-0550 | facebook.com/electromecanicaryr | info@electromecanicaryr.com</p>
        </td>
      </tr>
    </table>
  </div>
</center>
</body>
</html>
