@extends('front.template')
@section('titulo','Bienvenidos')

@section('contenido')


<!-- SLIDER -->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/slide1.jpg') }}" alt="Servicio 1" width="1920" height="680">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="{{ asset('images/slide2.jpg') }}" alt="Chicago" width="1920" height="680">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="{{ asset('images/slide3.jpg') }}" alt="New York" width="1920" height="680">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="{{ asset('images/slide4.jpg') }}" alt="New York" width="1920" height="680">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="{{ asset('images/slide5.jpg') }}" alt="New York" width="1920" height="680">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>

  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- END SLIDER -->


	<div class="container">
    <br>
    <div class="row text-center">
      <div class="col-md-4">
        <img class="img-fluid rounded-circle" src="{{ asset('images/img1.jpg') }}" alt="">
        <h3>Calidad</h3>
        <p>Prestamos los mejores servicios de acuerdo a su necesidad</p>
      </div>
      <div class="col-md-4">
        <img  class="img-fluid rounded-circle" src="{{ asset('images/img2.png') }}" alt="">
        <h3>Examenes de diagnistico</h3>
        <p>Brindamos o recomendamos los mejores servicios de diagnostico</p>
      </div>
      <div class="col-md-4">
        <img  class="img-fluid rounded-circle" src="{{ asset('images/img3.jpg') }}" alt="">
        <h3>Especialistas</h3>
        <p>Tenemos los mejores especialistas.</p>
      </div>
    </div>
	</div>
@endsection