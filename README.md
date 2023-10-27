# ACTIVITAT

Aquesta activitat serà la continuació de la pràctica del login. 


Haurem de fer:
* Refactoritzar el fitxer de la validar.php:

1. Després del login només haurem de validar que l’usuari existeix a les bases de dades. (S’ha de posar sempre codi defensiu).
    - En el cas de que el login no sigui correcte tornarem a la pàgina del login, igual que la pràctica anterior.

    - En canvi, en el cas de que el login sigui correcte:
        - Guardarem en sessió:
            1. Una variable de sessió per ‘LoggedIn” igual a true. 
            2. Una variable de sessió pel nom
            3. Una variable de sessió pel rol.
            4. Una variable de de sessió pel user_id.
            Ens dirigirem en una nova pàgina d’inici: index.php

## Bones pràctiques: L’objectiu d’aquest punt és la de millorar el codi, la seva estructura i entendre que s’ha de separar la lógica de negoci amb mostrar la informació de l’usuari per pantalla.

* Crear una pàgina d’inici de l’aplicació (index.php)
1. Mostrarem amb una etiqueta H2: “Hola” . $variable_sessio_nom. “ ets un ”.$variable_sessio_rol.

2. En el cas de ser un professor, s’haurà de fer una consulta per mostrar tots els usuaris de la BBDD (igualment que a la pràctica anterior però l’haurem de fer en la pàgina d’inici), en aquest cas es mostrarà a través d’una taula.

3. Afegirem dos enllaços a la pàgina:
    - Mostrar informació detallada de l’usuari.Anirem a una pàgina on consultarem a les bases de dades tots els camps de les bases de dades de l’usuari.
    Aquest enllaç s’haurà de fer a través del mètode GET passant el valor de ID de l’usuari.

    - Desconnectar. (Tancarem la sessió)
    Serà un fitxer php on farem el procés de tancar sessió. 
    Un cap fet tots els passos correctement ens redigirà a la pàgina d’inici.


* Important: Totes les pàgines que ens trobem després de fer el login, han de tenir el control de que si no hem fet un login han de redireccionar a la pantalla del login.

# Resultats
- Menú de login
![alt](P6%20Jordi%20Manyà/img/menuLogin.png)

- Login d'un alumne:
![alt](P6%20Jordi%20Manyà/img/alumnat.png)

- Login d'un professor:
![alt](P6%20Jordi%20Manyà/img/professor.png)

- Informació detallada:
![alt](P6%20Jordi%20Manyà/img/info.png)