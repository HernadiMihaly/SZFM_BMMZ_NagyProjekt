Tesztek Google Chrome böngészőn
=======================

Böngésző verzió: Chrome 96.0.4664.45

Operációs rendszer: Windows 10



1\. Kérdőív kitöltése felület
-----------------------

Elvárt viselkedés: A Home képernyőn egy kérdőív nevére kattintva megjelenik az adott kérdőívhez tartozó kérdés lista, és minden kérdéshez válasz megadására alkalmas komponens.

Tényleges viselkedés: A kérdőív kitöltési felület és az egyes kérdések és válaszmezők hibák nélkül megjelennek. Tesztelve: Google Chrome-ban Osztós Zsombor által.

2\. Kérdőív válaszok lementése
--------------------------

Elvárt viselkedés: A válaszok lementése gombra kattintva a megadott válaszok lementése megtörténik, akkor is ha nem minden kérdéshez volt megadva válasz. Átirányítás történik egy a kitöltést megköszönő oldalra.

Tényleges viselkedés: A válaszok beküldése megtörténik teljes és hiányos kitöltés esetén is. Az átirányítás helyesen működik.

3\. Belépés admin felhasználóval
--------------------------
Elvárt viselkedés: A Home képernyőn tetején elhelyezkedő login szövegre kattintva megjelenik a bejelentkezési felület. A teszteléshez egy előre létrehozott admin felhasználóval lépjünk be. A megfelelő email és jelszó megadása után a Bejelentkezés gombra kattintva átirányítás történik a home képernyőre. Adminként bejelentkezve a kérdőívek neve mellett megjelenik egy szerkesztés és törlés gomb, valamint a kérdőívek listája alatt egy kérdőív létrehozásra szolgáló plusz gomb.

Tényleges viselkedés: 

4\. Új kérdőív felvétele felület
--------------------------

Elvárt viselkedés: A Home képernyőn a kérdőívek listája alatti plusz gombra kattintva megjelenik a kkérdőív szerkesztési felület, ahol lehetőség van egy még nem tárolt kérdőív adatainak bevitelére.

Tényleges viselkedés:

5\. Új kérdőív lementése
--------------------------

Elvárt viselkedés: Az új kérdőív szerkesztése után a mentés gombra kattintás után a bevitt adatok lementésre kerülnek és átirányítás történik a Home képernyőre. A felvett kérdőív megjelenik a listában.

Tényleges viselkedés:

6\. Kérdőív törlése
--------------------------------------------

Elvárt viselkedés: A Home képernyőn a kérdőívek neve mellett megjelenő törlés gombra kattintás után megjelenik egy confirmation popup, ahol eldönthetjük hogy valóban törölni szeretnénk-e az adott kérdőívet. Ha OK-ra kattintunk, akkor az adott kérdőív eltűnik a listából. Ha a Mégse gombra kattintunk, nem történik törlés.

Tényleges viselkedés:

7\. Kérdőív szerkesztése felület
--------------------------------------------

Elvárt viselkedés: A Home képernyőn a kérdőívek neve mellett megjelenő szerkesztés gombra kattintás után megjelenik egy kérdőív szerkesztési felület, ahol a kiválasztott kérdőív aktuális állapota látható.

Tényleges viselkedés:

8\. Kérdőív szerkesztése: Kérdőív tulajdonságok módosítása
---------------------------

Elvárt viselkedés: A kérdőív szerkesztés felületen beállítható a kérdőív címe, valamint aktiválható és deaktiválható a tudásfelmérő és prediktív kérdések elválasztása és a kérdéssorrend randomizálása.
A Mentés gomb megnyomása után átirányítás történik a Home képernyőre, és az adott kérdőív szerkesztése gombra újból rákattintva láthatjuk hogy a beállítások mentve lettek.

Tényleges viselkedés:

9\. Kérdőív szerkesztése: Kérdés tulajdonságok módosítása
---------------------------

Elvárt viselkedés: A kérdőív szerkesztés felületen minden kérdésnél beállítható az adott kérdés szövege, sorszáma, megadható helyes válasz. Beállítható, hogy az adott kérdés prediktív-e. A kérdés típusa módosítható, és a válaszok oszlopban lista típus esetén '|'-jelekkel elválasztva megadható hogy milyen válaszlehetőségek jelenjenek meg.
A Mentés gomb megnyomása után átirányítás történik a Home képernyőre, és az adott kérdőív szerkesztése gombra újból rákattintva láthatjuk hogy a beállítások mentve lettek.
Az adott kérdőív kitöltése közben a lista típusú kérdéseknél megjelennek a felvett válaszlehetőségek.


Tényleges viselkedés:

10\. Kérdőív szerkesztése: Kérdés lista módosítása
---------------------------------------------------

Elvárt viselkedés: A kérdőív szerkesztés felületen a kérdések listája alatti Új kérdés gombra kattintva lehetőség van új kérdés hozzáadására, valamint az egyes kérdések sorának jobb oldalán megjelenő törlés gombra kattintva létező kérdés törlésére.
A Mentés gomb megnyomása után átirányítás történik a Home képernyőre, és az adott kérdőív szerkesztése gombra újból rákattintva láthatjuk hogy a beállítások mentve lettek.

Tényleges viselkedés:


11\. Kérdőív szerkesztése: Prediktív és tudásfelmérő kérdések szétválasztása
---------------------------------------------------

Elvárt viselkedés: A kérdőív szerkesztése felületen beállítható, hogy a prediktív és tudásfelmérő kérdések szétválasztva jelenjenek meg. Ezt a beállítást bekapcsolva mentsünk egy több fajta kérdést tartalmazó kérdőívet.
Az adott kérdőív kitöltésénél a kérdések elkülönítve jelennek meg.

Tényleges viselkedés:

12\. Kérdőív szerkesztése: Kérdések sorrendjének randomizálása
---------------------------------------------------

Elvárt viselkedés: A kérdőív szerkesztése felületen beállítható, hogy a kérdések neve randomizált sorrendben jelenjen meg. Ezt a beállítást bekapcsolva mentsünk egy több kérdést tartalmazó kérdőívet.
Az adott kérdőív kitöltésénél a kérdések minden kitöltéskor véletlenszerű sorrendben jelennek meg.

Tényleges viselkedés:


13\. Kérdőív szerkesztése: Kérdések sorrendjének manuális beállítása
---------------------------------------------------

Elvárt viselkedés: A kérdőív szerkesztése felületen beállítható, hogy a kérdések neve randomizált sorrendben jelenjen meg. Ezt a beállítást kapcsoljuk ki egy több kérdést tartalmazó kérdőívnél.
Az adott kérdőív egyes kérdéseihez sorszámot megadva beállítható a kérdések sorrendje.
Az adott kérdőív kitöltésénél a kérdések a megadott sorszámok alapján növekvő sorrendbe rendezve jelennek meg.

Tényleges viselkedés:

14\. Válaszok listázása felület
---------------------------------------------------

Elvárt viselkedés: A Home képernyő navigációs menüjében (képernyő teteje) a Listázás menüpontra kattintva megjelenik a válasz lekérdező felület.

Tényleges viselkedés:

15\. Válaszok listázása egy kérdőívhez
---------------------------------------------------

Elvárt viselkedés: A választható kérdőívek listából egyre rákattintva a kérdőív lista alatti DataTable-ben megjelennek az ehhez a kérdőívhez eltárolt válaszok.

Tényleges viselkedés:

16\. Válaszok listázása utáni szűrés
---------------------------------------------------

Elvárt viselkedés: Az egy kérdőívhez tartozó válaszok listáját lehet szűrni a Kérdés oszlopban lévő szűrő ikonra kattintva. Szűrés után csak a kiválasztott kérdésekre adott válaszok jelennek meg.

Tényleges viselkedés:

17\. Válaszok listázása utáni átrendezés
---------------------------------------------------

Elvárt viselkedés: Az egy kérdőívhez tartozó válaszok listáját át lehet rendezni az egyes oszlopok fejlécére kattintva. Beállítható fordított sorrend is, valamint a Ctrl billentyű nyomvatartásával több lépéses rendezés is megadható, például kitöltő szerint és azon belül kérdés szerint.

Tényleges viselkedés:


18\. Regisztrációs felület
---------------------------------------------------

Elvárt viselkedés: Ha nem vagyunk bejelentkezve, akkor a Home képernyő tetején megjelenik a Regisztráció.
Erre kattintva megnyílik a regisztrációs felület.

Tényleges viselkedés:

19\. Regisztráció helyes adatokkal
---------------------------------------------------

Elvárt viselkedés: A név mezőt kitöltve, az email mezőben helyes email cím megadásával valamint a jelszó és ellenőrző jelszó mezőket egyező jelszóval feltöltve létrehozhatunk egy új felhasználót a Regisztráció gombbal. A regisztráció után átirányítás történik a login felületre, ahol be tudunk jelentkezni az új felhasználóval.

Tényleges viselkedés:

20\. Regisztráció hibás adatokkal
---------------------------------------------------

Elvárt viselkedés: Ha valamelyik mezőt nem töltjük ki, nem valid email-t adunk meg vagy különböző jelszót írunk a két jelszó mezőbe, akkor a regisztráció nem történik meg.

Tényleges viselkedés:
