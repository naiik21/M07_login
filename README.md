# M07_login
## ACTIVITAT

Després de desenvolupar la pàgina SignIn (per crear usuaris) haurem de desenvolupar la pàgina del login. 
Haurem de fer:

## Un fitxer html pel login. 
* Serà un formulari amb el mail i el password. 
* Ha de tenir un checkbox “Remember me”
* El formulari haurà de fer servir el mètode POST.
* La pàgina tindrà un enllaç per poder crear un usuari (pàgina de la pràctica anterior)
* Totes les pàgines de la pràctica anterior hauran de tenir un enllaç per anar a login.html

## Un fitxer php per validar l’usuari i contrasenya a les bases de dades. 
Consultarà la informació introduïda en la pàgina de login per comprovar si l’usuari i el password coincideixen amb un registre de les BBDD:
* El tractament serà:
    * Si la consulta retorna un resultat:
        * Si el rol és estudiant; mostrarà per pantalla: el nom, cognom, email

        * Si el rol és professor, mostrarà el nom i cognom del professor i mostrarà la informació de tots els usuaris de les BBDD.

    * En el cas de que no sigui correcte:
        *Tornarà a la pàgina de login i apareixerà un error de “Login incorrecte”.

* Haureu de crear i fer servir una funció per fer la consulta de tots els usuaris quan el rol és professor.
* Les constants de la connexió s'haurà de fer servir a través d’un fitxer dbConf.php
* S’haurà de fer servir el try, catch i finally almneys en un dels casos.

# Resultats
* Menú de login:
![alt](P5%20Jordi%20Manyà/img/menuLogin.png "Menú login")

* Resultat d'alumnat:
![alt](P5%20Jordi%20Manyà/img/alumnat.png "alumnat")

* Resultat de professorat: 
![alt](P5%20Jordi%20Manyà/img/professorat.png "professorat")

* Usuari no existeix:
![alt](P5%20Jordi%20Manyà/img/error.png "error")
