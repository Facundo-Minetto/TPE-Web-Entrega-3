# TPE-Web-Entrega-3
DOCUMENTACION PARA SABER COMO CONSUMIR LA API: 

-------------------------------------------------------------------------------------------


URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/productos

METODOS: GET Y POST

Con el metodo GET se pide la lista de todos los productos a traves de un JSON

Ejemplo de uno de los productos : {
        "id_producto": 1,
        "precio": 20000,
        "id_categoria": 1
    }
    
Y con el metodo POST se crea un nuevo producto con el mismo formato que el ejemplo anteriormente dado.

-------------------------------------------------------------------------------------------

URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/productos/:ID

METODOS: GET Y PUT 

Con el metodo GET se esta obteniendo la informacion de un producto especifico, enviando su ID.

Mismo ejemplo que el anterior, un JSON con la informacion:
{
        "id_producto": 1,
        "precio": 20000,
        "id_categoria": 1
}

Y con el metodo PUT se modifica/actualiza la informacion un producto, reemplazando los campos 
tambien en el formato JSON anteriormente dado.

-------------------------------------------------------------------------------------------


URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/productos/:ID/:subrecurso

METODO: GET

A traves de este endpoint se esta seleccionando que se muestre un campo especifico de un producto, a traves de su ID
con un subrecurso

Ejemplo: localhost/web2/TPE-Web-Entrega-3/api/productos/4/precio

Saldria esto: 
15000

El precio de el producto con ID 4 es "15000".

Asi tambien se podria con el campo "nombre_producto"

-------------------------------------------------------------------------------------------

URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/categorias

METODOS: GET Y POST

Con el metodo GET se pide la lista de todas las categorias a traves de un JSON

Ejemplo de una de las categorias : {
        "id_categoria": 1,
        "nombre": "Buzo"
    }
    
Y con el metodo POST se crea una nueva categoria en el mismo formato JSON que el ejemplo anteriormente dado.

-------------------------------------------------------------------------------------------

URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/categorias/:ID

METODOS: GET Y PUT 

Con el metodo GET se esta obteniendo la informacion de una categoria especifica, enviando su ID.

Ejemplo del endpoint localhost/web2/TPE-Web-Entrega-3/api/categorias/2:

Algo asi mostraria

{
    "id_categoria": 2,
    "nombre": "Remera"
}

Y con el metodo PUT se modifica/actualiza la informacion una categoria, reemplazando los campos 
tambien en el formato JSON anteriormente dado.

-------------------------------------------------------------------------------------------

URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/categorias/:ID/:subrecurso

METODO: GET

A traves de este endpoint se esta seleccionando que se muestre un campo especifico de una categoria, a traves de su ID
con un subrecurso

Ejemplo: localhost/web2/TPE-Web-Entrega-3/api/categorias/3/nombre

Saldria esto: 
Pantalon

El nombre de la categoria con ID 3 es "Pantalon".

-------------------------------------------------------------------------------------------

URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/usuario/token

METODO: GET

En este caso al poner este endpoint lo que se tendria que poner en un "Basic auth" es el nombre de usuario
y contraseña. Al ingresar la informacion correctamente (usuario:webadmin, password:admin) te genera un token
necesario para en un futuro caso de que por ejemplo, quiera modificar una categoria, primero tendria que 
enviar ese token y verificarse para seguir con el servicio.

-------------------------------------------------------------------------------------------

URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/productos?sort=precio&order=asc

Este endpoint lo que hace es ordenar el campo "precio" de la lista de productos de manera ascendente.

URL DEL ENDPOINT -> localhost/web2/TPE-Web-Entrega-3/api/productos?sort=precio&order=desc

Lo mismo si se quisiera hacer de manera descendente.

Tambien se podria ordenar de manera ascendente o descendente, el id_producto o id_categoria (campos dentro de
la tabla products)
