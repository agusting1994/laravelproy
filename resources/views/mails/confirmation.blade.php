Hola {{ $data['nombre'] }},
<p>Tus datos para acceder al sistema</p>
<p>Usuario: {{ $data['nombre'] }}</p>
<p>Contraseña: {{ $data['password'] }}</p>
<br>
<p>Por favor, haz click en el siguiente link para activar tu cuenta.</p>
{{ route('confirmation', $data['token']) }}
<br>