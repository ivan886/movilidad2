
<!DOCTYPE html>
<html>
    <head>
        <title>MAPS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        
    </head>
    <body >
        
       <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="http://18.191.148.84:8000/viajes">Estudio de </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://18.191.148.84:8000/viajes">Movilidad Urbana</a>
          </li>
        </ul>
       
        <div style="margin-top:60px;" class="flex-center position-ref full-height">
            <div class="container">
               
                 
                
                <h4>Viajes del particpante con imei <?php echo $viajes[0]->imei;?> </h4>
                 <table class="table table-striped">
                      <thead>
                <tr>
                  <th>Id  viaje</th>
                  <th>Visualizar Viajes</th>
                </tr>
              </thead>
              <tbody>
                 <?php  $i=1; 
                 foreach($viajes as $viaje)  {?>
                     <tr>
                        <td><?php echo  $viaje->llave_viaje ?></td>
                        <td>
                            <form action="{{url('/viajes/mapa')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="imei" value="<?php echo $viaje->imei; ?>" />
                                <input type="hidden" name="llave_viaje" value="<?php echo $viaje->llave_viaje; ?>" />
                                <input type="submit" value="Ver Recorrido en Mapa">
                            </form>
                        </td>
                       </tr>
                <?php  $i++;
                }  ?>
                  </tbody>
            </table>      
            
        
        </div>
     </div>


    </body>
</html>
