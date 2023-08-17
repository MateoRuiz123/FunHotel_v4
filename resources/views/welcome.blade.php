<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunHotel</title>
    <link rel="stylesheet" href="{{asset('css/land.css')}}">
    <script src="{{asset('js/land.js')}}"></script>
</head>
    <header>
    <nav>
        <ul class="nav nav-tabs">
            <li><a href="/home">Iniciar sesión</a></li>
            <li><a href="/habitaciones">Habitaciones</a></li>
            <li><a href="#Promociones">Promociones</a></li>
            <li><a href="/servicios">Servicios</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
      </nav>
    </header>
    <section id="inicio">
      <div class="hero">
        <h1 class="animate-letters">Bienvenidos a <br>FunHotel</h1>
        <a href="#reservas" class="btn">Reserva ahora</a>
      </div>
    </section>
    <div class="titulo">
      <h2 class="">Como surgio <br> Funhotel </h2>
    </div>
      <div class="texto">
          <p>Funhotel surge de la necesidad que se presentaba con los estudiantes de Hoteleria Y Turismo, de contar con una herramienta
            eficiente y accesible, ante la falta de recursos <br> que pudieran completar su formación, un grupo de entusiastas estudiantes, decidieron
            emprender un emocionante proyecto. <br>
            Asi nacio FunHotel, un innovador aplicativo, creado con la misión de optimizar y facilitar <br> el proceso de aprendizaje para 
            los estudiantes de Hoteleria Y Turismo.
          </p>
        </div></div>
        <div class="container-card">
          <div class="card">
            <figure>
              <center><img src="{{ asset('img/mision.png') }}" class="mision" alt="" /></center>
            </figure>
            <div class="contenido-card">
              <h3>Misión</h3>
              <p>Nos esforzamos por ser un referente en la industria hotelera, ofreciendo un 
                      servicio excepcionales y experiencias inigualables.</p>
            </div>
          </div>
          <div class="card">
            <figure>
              <center><img src="{{ asset('img/vision.png') }}" class="" alt="" /></center>
            </figure>
            <div class="contenido-card">
              <h3>Visión</h3>
              <p>Trabajamos para ser un referente en la industria hotelera, destacándonos por nuestra excelencia 
                      en la calidad y la innovación.</p>
            </div>
          </div>
          <div class="card">
            <figure>
              <center><img src="{{ asset('img/Movil3.png') }}" class="" alt="" /></center>
            </figure>
            <div class="contenido-card">
              <h3>Móvil</h3>
              <p>FunHotel cuenta con un apartado móvil, diseñado para la comodidad y facilidad a la mano
                de nuestros clientes.
              </p>
            </div>
           </div>
         </div> 
        <section class="contacto">
          <h2>Contacto</h2>
           <p>¡Estaremos encantados de ayudarte! <br> Puedes contactarnos a través de los siguientes medios:</p>
        <ul>
          <li>Teléfono: 314-885-23-54</li>
          <li>Email: info@funhotel.com</li>
          <li>Dirección: Calle Principal, Medellín</li>
        </ul>
      </section>
      <div class="logoland">
        <img src="{{ asset('img/Hotel.png') }}" class="" alt="" />
    </div>
    <footer>
      <p>&copy; 2023 FunHotel. Todos los derechos reservados.</p>
    </footer>
</body>
</html>