<!-- début de la page mes propositions -->
<?php
include 'fragment/fragmentCaveHeader.html'; ?>
<body>
  <div class="container">
    <?php
    include 'fragment/fragmentCaveMenu.html';
    ?>
  </div>   
<div class="mt-4 p-5 bg-success text-white rounded">
  <h1>Ma proposition </h1>
  <p>Au lieu d'utiliser un switch on créer une classe router qui construit le chemin d'accès à la méthode demander
  <br>
  ex : class Router{
  <br>
    public static function route(Request $request){
<br>

        $controller = $request->getController().'Controller';
<br>
        $method = $request->getMethod();
<br>
        $args = $request->getArgs();

<br>
        $controllerFile = __SITE_PATH.'/controllers/'.$controller.'.php';
<br>

        if(is_readable($controllerFile)){<br>
            require_once $controllerFile;<br>

            $controller = new $controller;
<br>

            if(!empty($args)){<br>
                call_user_func_array(array($controller,$method),$args);<br>
            }else{  <br>
                call_user_func(array($controller,$method));
            }   <br>
            return;<br>
        }

        throw new Exception('404 - '.$request->getController().'--Controller not found');<br>
    }
}</p>
</div>
<p/>
  <?php
 
  include 'fragment/fragmentCaveFooter.html';
  ?>

  <!-- ----- fin de la page mes propositions -->

</body>
</html>
