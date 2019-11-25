<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movilidad</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      
    </head>
    <body>
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="http://18.191.148.84:8000/viajes">Estudio de </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://18.191.148.84:8000/viajes">Movilidad Urbana</a>
          </li>
        </ul>
    <div class="row"></div>
        <div style="margin-top:60px;" class="flex-center position-ref full-height">
            <div class="container">
                <div class="title m-b-md">
                 <h2>Participantes </h2>
                 <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Participante con Imei</th>
                          <th>Número de viajes </th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php   foreach($viajes as $viaje)  {?>
                             <tr>
                                <td><?php echo $viaje->imei ?></td>
                                <td><?php echo $viaje->num_viajes ?></td>
                                <td>
                                    <form action="{{url('/viajes/imei')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="imei" value="<?php echo $viaje->imei; ?>" />
                                        <input type="submit" value="consultar viajes">
                                    </form>
                                </td>
                               </tr>
                        <?php  }  ?>
                          </tbody>
                    </table>
                 </div>

            </div>
        </div>
    </body>
</html>
