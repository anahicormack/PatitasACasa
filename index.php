<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<title>Trabajando con Bootstrap</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
<main role="main">
<div class="container marketing">

<section class="banner"  >

<!--	<div class="img-banner" >
		<img src="images/banner_dog.jpg" class="img-fluid" alt="Responsive image">
 </div>
-->


  <div class="buscador-banner col-md-8 order-md-1 col-lg-6 col-sm-12">
           <h4 class="mb-3">Estoy buscando: </h4>
           <form class="needs-validation" novalidate="">

             <div class="row">
               <div class="col-md-4 mb-3">


                 <label for="pet">Mascota</label>
                 <select class="custom-select d-block w-100" id="country" required="">
                   <option value="">Choose...</option>
                   <option>Perro</option>
                   <option>Gato</option>
                 </select>
                 <div class="invalid-feedback">
                   Please select a valid country.
                 </div>
               </div>
               <div class="col-md-4 mb-3">
                 <label for="state">Zona</label>
                 <select class="custom-select d-block w-100" id="state" required="">
                   <option value="">Choose...</option>
                   <option>Capital Federal.</option>
                   <option>Gba. Zona Norte</option>
                   <option>Gba. Zona Sur</option>
                   <option>Gba. Zona Oeste</option>
                 </select>
                 <div class="invalid-feedback">
                   Please provide a valid state.
                 </div>
               </div>

               <div class="col-md-4 mb-3">
                 <label for="country">Edad</label>
                 <select class="custom-select d-block w-100" id="country" required="">
                   <option value="">Choose...</option>
                   <option>0 - 3 años</option>
                   <option>3- 10 años</option>
                   <option>Mas de 10 años</option>
                 </select>
                 <div class="invalid-feedback">
                   Please select a valid country.
                 </div>
               </div>
               <div class="col-md-4 mb-3">
                 <label for="state">Tamaño</label>
                 <select class="custom-select d-block w-100" id="state" required="">
                   <option value="">Choose...</option>
                   <option>Chico</option>
                   <option>Mediano</option>
                   <option>Grande</option>
                 </select>
                 <div class="invalid-feedback">
                   Please provide a valid state.
                 </div>
               </div>
               <div class="col-md-4 mb-3">
                 <label for="state">Sexo</label>
                 <select class="custom-select d-block w-100" id="state" required="">
                   <option value="">Choose...</option>
                   <option>Macho</option>
                   <option>Hembra</option>
                 </select>
                 <div class="invalid-feedback">
                   Please provide a valid state.
                 </div>
               </div>

             </div>
             <hr class="mb-4">
             <button class="btn btn-primary btn-lg btn-block" type="submit">Buscar</button>
             <hr class="mb-4">
           </form>
      </div>

</section>

      <div class="row">
                <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Perro 1</h2>
                  <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Perro 2</h2>
									<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Gato 1</h2>
									<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Perro 3</h2>
									<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Gato 2</h2>
									<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Gato 3</h2>
									<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                </div><!-- /.col-lg-4 -->

              </div>
      </div>
    </div>
    </main>
  </body>
</html>
