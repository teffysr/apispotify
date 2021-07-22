![spotify](https://user-images.githubusercontent.com/18340584/126589355-10f17fca-24bc-4b80-ac9e-7bed34df856e.png)

Utilizando la api de spotify crear un endpoint al que ingresando el nombre de la banda se obtenga un array de toda la discografía, cada disco debe tener este formato:

    GET → http://localhost/api/v1/albums?q=<band-name>
      [ 
        {
          "name": "Album Name",
          "released": "10-10-2010",
          "tracks": 10,
          "cover": {
             "height": 640,
             "width": 640,
             "url": "https://i.scdn.co/image/6c951f3f334e05ffa"
           }
         },
         ...
       ]


# Instalacion

git clone https://github.com/teffysr/apispotify.git

composer install

cp .env.example .env

# Entornos
local	http://127.0.0.1:8080/

# Tecnologías y herramientas utilizadas

"laravel/framework": "^8.40"

# Autor

● Roxana Stephanie Rodriguez  
https://www.linkedin.com/in/roxana-stephanie-rodriguez-b2a8ab83/
