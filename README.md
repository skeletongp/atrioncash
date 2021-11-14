
<!-- Integración de Uuid -->
Para usar el Uuid debo:

Instalar el paquete Rameey/Uuid

Convertir las primary key de uuid->primary;

Cambiar los FereingId en foreinUuid

En los modelos, establecer la propiedad protected $incremente=false;

Al añadir un registro, asignar el valor de id con Uuid::uuid1()

En la migración de roles, cambiar el tipo de columNames['morph_key] a uuid

<!-- Solución del problema Echo is not defined -->

Pasar la configuración desde bootstrap.js al archivo echo.js (nuevo)