# Programación web 2 - Ejemplo web básica dockerizada

Ejemplo web básica "hola mundo" en php mediante configuración de apache dockerizada.
(Inicia también una imagen MySql que no utiliza en el ejemplo).
El proyecto contiene una web de bienvenida, implementada con W3CSS y una set básica de pruebas phpUnit a ejecutar.

## Pre requisitos y preparación del entorno

### Docker

Pueden instalar docker desde la página oficial ( Recomiendo buscar algún tutorial para instalarlo si no funciona de primera):

```
https://docs.docker.com/get-docker/
```

En el caso de linux o mac la instalación debería ser sencilla. En el caso de Windows probablemente tengan que instalar un tool que ejecuta docker sobre un virtual-box (salvo que posean windows-10 enterprise):

```
https://docs.docker.com/toolbox/toolbox_install_windows/
```

### Cosas a tener en cuenta si utilizamos docker toolbox en windows

- Al instalarse sobre una máquina virtual, en todos los lugares que diga localhost, deberán ingresar la IP de la máquina virtual. Dicha IP la indica al iniciar la máquina virtual de docker
- Los comandos deberán ejecutarse sobre la consola que instala el toolbox y no sobre la terminal de windows

```
cd {carpeta donde se encuentra el proyecto}
docker-compose up
```


- No podrán persistir datos en la base de datos, ya que no podrá montarse el volumen, habrá que eliminar la línea que indica los volúmenes y crear la base cada vez que inicializamos:

```
volumes:
      - "${MYSQL_DATA}:/var/lib/mysql"
```



### Chequeo de instalación y configuración del entorno

Para verificar la instalación ejecutar

```
docker version
```

Para verificar que pueda descargar imágenes y ejecutarlas, ejecutar

```
docker run hello-world
```

Para iniciar este proyecto:

```
docker-compose up
```

Para verificar instalación de php de este proyecto:

```
docker-compose exec PW2-php php --version
```

Para verificar instalación de php-unit de este proyecto:

```
docker-compose exec PW2-php php test/phpunit.php --version
```

## Ejecución

Listo! una vez que tengamos todo inicializado, cada vez que deseemos ejecutar la aplicación bastará con  ejecutar desde consola en el raiz del proyecto:


```
docker-compose up
```

Luego ingresar desde el navegador:


```
http://localhost:8888
```

Esto inicia dos instancias de imágenes dockerizadas: un servidor apache (puerto 8888) y un servidor de base de datos MySql (3333). Ambos conectados por red y con una web de ejemplo :)


Si se cierra la consola donde se ejecutó el comando, las instancias de docker dejaran de ejecutar y ya no tendremos el servidor web ejecutando.
Si deseamos que estén ejecutando por siempre, puede indicarse que corra como un demonio (parámetro -d) , pero si luego queremos terminar el proceso, deberemos realizarlo mediante
comandos de docker.

## Ejecutar test

```
docker-compose exec PW2-php php test/phpunit.php --testdox  .
```


## Limpieza
Si por algún motivo, al terminar de utilizar el proyecto quieren eliminar las instancias de docker instaladas, imagenes, volúmenes y redes creadas (no son pesadas, pero por si acaso).
Ejecutar:

```
docker system prune
```



## Versión
[v0.1] Primer dockerización de proyecto de base (4/2019)


