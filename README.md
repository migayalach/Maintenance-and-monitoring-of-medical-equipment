# Maintenance-and-monitoring-of-medical-equipment

Este proyecto se centra en la automatización del programado de fechas para mantenimientos de equipos médicos y la gestión de diagnósticos asociados. La aplicación ofrece una solución integral para facilitar la planificación eficiente de los mantenimientos preventivos, asegurando un rendimiento óptimo de los equipos. Además, permite el registro y seguimiento de diagnósticos, contribuyendo así a una gestión efectiva de los recursos médicos, por parte del área de electromedicina.

Herramientas de Desarrollo:

**Frontend:**

- HTML
- CSS
- BOOTSTRAP
- JAVASCRIP
- AJAX

**Backend:**

- PHP
- MYSQL

## Configuración y Uso

Para poner en marcha la aplicación:

1. Asegurate de tener instalado xampp en tu sistema.

¿Como poner en marcha el proyecto?
1.1 Dar de alta a xampp<br>

    LINUX
    para iniciar => sudo /opt/lampp/lampp start
    para detener => sudo /opt/lampp/lampp stop

<img src="./img/linux.png" width='600px'/><br><br>

    WINDOWS

<img src="./img/windows.png" width='400px'/><br><br>

2. Creacion de la base de datos

<img src="./img/creacionBdd.png" width='400px'/><br>

    2.1 Modelo Entidad Relacion

<img src="./img/ER.png" width='450px'/><br>

3.  Copiar y pegar todo el contenido de la carpeta "bd/electromedicina.sql"<br>
    <img src="./img/baseDeDatos.png" width='400px'/><br><br>

4.  Mediante una consulta sql, pegar el contenido y aceptar<br>
    <img src="./img/cargarDatos.png" width='400px'/><br><br>

        4.1. Vista de las tablas creadas

    <img src="./img/tablas.png" width='400px'/><br><br>

5.  Una vez esto iniciar sesion mediante el enlace: "http://localhost:8080/electromedicina/index.php"<br>
    <img src="./img/login.png" width='400px'/><br><br>

6.  Registrarse y elegir la opcion de "administrador", este formulario de registro solo se mostrara una vez.<br>
    <img src="./img/registro.png" width='400px'/><br><br>

7.  El primer usuario siempre sera registrado como administrador teniendo total acceso y solo el puede agregar nuevos usuarios.

8.  Se cuenta con 3 vistas una para los usuarios.
    La vista administradores, los cuales pueden hacer todas las acciones permitidas.
    La vista estandar solo puede visualizar y consultar datos, asi como un acceso para poder realizar el mantenimiento programado y adjuntar a este su informe y fotos si es necesario.
    LA vista de invitado, el cual solo puede ver la lista de mantenimientos realizados y ase hacer control de estos equipos.

UNIDAD<br><br>
<img src="./img/Unidad.png" width='400px'/><br><br>
ENCARGADO<br><br>
<img src="./img/Encargado.png" width='400px'/><br><br>
USUARIO<br><br>
<img src="./img/Usuario.png" width='400px'/><br><br>
ESTADO<br><br>
<img src="./img/Estados.png" width='400px'/><br><br>
EQUIPO<br><br>
<img src="./img/Equipo.png" width='400px'/><br><br>
TIPO DE MANTENIMIENTO<br><br>
<img src="./img/Tipo de mantenimiento.png" width='400px'/><br><br>
ASIGNAR MANTENIMIENTO<br><br>
<img src="./img/ASIGNAR MANTENIMIENTO.png" width='400px'/><br><br>
EDITAR DATOS<br><br>
<img src="./img/Editar datos.png" width='400px'/><br><br>
HOME muestra el listado de mantenimientos pendientes y solo adminsitradores y usuarios estandar pueden pasar a completarlo<br><br>
<img src="./img/Mantenimientos Programados.png" width='400px'/><br><br>
<img src="./img/Realizando Mantenimiento.png" width='400px'/><br><br>

Programando un mantenimiento<br>
Asignar mantenimiento<br>
<img src="./img/Asignar Mantenimietno.png" width='400px'/><br><br>
Registro de mantenimientos realizados, vista admin<br><br>
<img src="./img/Mantenimientos realizados.png" width='400px'/><br><br>

Registro de mantenimientos realizados, vista standar<br><br>
<img src="./img/Acceso limitado2.png" width='400px'/><br><br>

ASISTENCIA: Esta vista solo aparece para los usuarios que tengan asignado el nivel standar<br><br>
<img src="./img/Opcion de asistencia.png" width='400px'/><br><br>
LLENANDO ASISTENCIA<br><br>
<img src="./img/Asistencia.png" width='400px'/><br><br>

Vista con opciones de usuario standar<br><br>
<img src="./img/Vista usuario standar.png" width='400px'/><br><br>

Vista de archivos en tiempo real<br><br>
<img src="./img/Vista de los mantenimientos.png" width='400px'/><br><br>
<img src="./img/Vista de los mantenimientos2.png" width='400px'/><br><br>

Vista de archivos descargados y por usuario<br><br>
<img src="./img/Vista de carpetas.png" width='400px'/><br><br>
<img src="./img/Contenido.png" width='400px'/><br><br>

