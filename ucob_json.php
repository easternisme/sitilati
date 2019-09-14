<!DOCTYPE html>
<html>
<head>
  <title>Ucob JSON</title>
</head>
<body>
<?php 
                  $json = file_get_contents('https://www.fleetmon.com/api/p/personal-v1/myfleet/?username=puskodal_mabesal&api_key=5f7752c72a8bbb3586a8294bd453b44f74d555a5&format=json');
                  $json_object = json_decode($json);
                  unset($json_object->meta);
                    echo "<pre>";
                    print_r ($json_object);
                    echo "</pre>";
                  foreach($json_object as $dt){
                    echo "<pre>";
                    $long = $dt->vessel;
                    // echo "<br>";
                    echo ($long);
                    echo "</pre>";
                  }

                   ?>

</body>
</html>