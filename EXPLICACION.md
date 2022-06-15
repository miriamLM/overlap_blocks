# RESUMEN DEL PROYECTO

## Arquitectura usada
- Arquitectura hexagonal

## Explicación del proyecto
- En la rama **main** se encuentra la primera solución de *overlap*, pero no es la única. La segunda solución se encuentra en la rama **main-json**.
    - Primera solución (**main**):las coordenadas se introducen por línea de comandos (una a una) y el programa te dice si se superponen (`true` o `false`) o no los bloques introducidos. Si se introduce unas coordenadas incorrectas salta una excepción.
        - coordenadas incorrectas:
            - letras diferentes a 'h' o 'v'.
            - el número de letras sea diferente a 2
            - la cantidad de caracteres sea diferente a 10.
            - no se haya introducido una coordenada.
        - Problemas: al introducir la coordenada `0h8721v1076`, como lo leo como un *string* en la cli, no me detecta que sea un `10` sino como dos números diferentes, con lo cual salta la excepción. A partir de aquí se planteó la siguiente solución:
    - Segunda solución (**main-json**): las coordenadas están guardadas en un *json* y separadas por espacio los diferentes caracteres. El programa lee las coordenadas una a una de los bloques para saber si se superponen y muestra la solución (`true` o `false`).