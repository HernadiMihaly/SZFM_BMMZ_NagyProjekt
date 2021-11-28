Tesztek Google Chrome böngészőn
=======================

Böngésző verzió: Chrome 96.0.4664.45

Operációs rendszer: Windows 10

Tesztek Opera GX böngészőn
=======================
Böngésző verzió: Opera GX 92

Operációs rendszer: Windows 10

Tesztek Mozilla Firefox böngészőn
=======================
Böngésző verzió: Mozilla Firefox 94.0.2

Operációs rendszer: Windows 10


1\. Kérdőív kitöltése felület
-----------------------

Elvárt viselkedés: A Home képernyőn egy kérdőív nevére kattintva megjelenik az adott kérdőívhez tartozó kérdés lista, és minden kérdéshez válasz megadására alkalmas komponens.

Tényleges viselkedés: A kérdőív kitöltési felület és az egyes kérdések és válaszmezők hibák nélkül megjelennek. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A kitöltési felület és az egyes kérdések és válaszmezők hibamentesen megjelennek. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: A kitöltési felület, kérdések és válaszmezők akadálymentesen megjelennek. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

2\. Kérdőív válaszok lementése
--------------------------

Elvárt viselkedés: A válaszok lementése gombra kattintva a megadott válaszok lementése megtörténik, akkor is ha nem minden kérdéshez volt megadva válasz. Átirányítás történik egy a kitöltést megköszönő oldalra.

Tényleges viselkedés: A válaszok beküldése megtörténik teljes és hiányos kitöltés esetén is. Az átirányítás helyesen működik. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A válaszok beküldésre kerülnek teljes és hiányos kitöltés esetén is. Az átirányítás működik. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: A válaszok kitöltéstől függetlenül beküldésre kerülnek. Az átirányítás működik. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

3\. Belépés admin felhasználóval
--------------------------
Elvárt viselkedés: A Home képernyőn tetején elhelyezkedő login szövegre kattintva megjelenik a bejelentkezési felület. A teszteléshez egy előre létrehozott admin felhasználóval lépjünk be. A megfelelő email és jelszó megadása után a Bejelentkezés gombra kattintva átirányítás történik a home képernyőre. Adminként bejelentkezve a kérdőívek neve mellett megjelenik egy szerkesztés és törlés gomb, valamint a kérdőívek listája alatt egy kérdőív létrehozásra szolgáló plusz gomb.

Tényleges viselkedés: A login képernyőn a megfelelő bejelentkezési adatok megadása után be tudunk lépni adminként, és a home képernyőn a gombok elérhetővé válnak. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A login képernyőn be tudok lépni adminként és a gombok elérhetőek lesznek. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: A login képernyőn adminisztrátori jogokkal történő bejelentkezés esetén a gombok elérhetőek. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

4\. Új kérdőív felvétele felület
--------------------------

Elvárt viselkedés: A Home képernyőn a kérdőívek listája alatti plusz gombra kattintva megjelenik a kérdőív szerkesztési felület, ahol lehetőség van egy még nem tárolt kérdőív adatainak bevitelére.

Tényleges viselkedés: A kérdőív létrehozására alkalmas szerkesztési felület megjelenik. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: Megjelenik a kérdőív létrehozására alkalmas felület. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: A kérdőív létrehozó felület láthatóvá válik. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

5\. Új kérdőív lementése
--------------------------

Elvárt viselkedés: Az új kérdőív szerkesztése után a mentés gombra kattintás után a bevitt adatok lementésre kerülnek és átirányítás történik a Home képernyőre. A felvett kérdőív megjelenik a listában.

Tényleges viselkedés: Az új kérdőív lementése a megadott címmel megtörténik. A felvett kérdések is mentve vannak. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: Az kérdőív a megadott címmel elmentődik. A felvett kérdések is elmentődnek. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: Az általunk megadott kérdőív cím és kérdések is elmentődnek. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

6\. Kérdőív törlése
--------------------------------------------

Elvárt viselkedés: A Home képernyőn a kérdőívek neve mellett megjelenő törlés gombra kattintás után megjelenik egy confirmation popup, ahol eldönthetjük hogy valóban törölni szeretnénk-e az adott kérdőívet. Ha OK-ra kattintunk, akkor az adott kérdőív eltűnik a listából. Ha a Mégse gombra kattintunk, nem történik törlés.

Tényleges viselkedés: A törlés után Mégse gombra kattintva nem törlődik a választott kérdőív, OK-t választva a törlés sikeresen megtörténik. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A törlés gomb után az OK gomb sikeresen törli a kérdőívet, a Mégse gombbal pedig nem törlődik. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: A törlést elfogadó, illetve megtagadó gombok megfelelően működnek. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

7\. Kérdőív szerkesztése felület
--------------------------------------------

Elvárt viselkedés: A Home képernyőn a kérdőívek neve mellett megjelenő szerkesztés gombra kattintás után megjelenik egy kérdőív szerkesztési felület, ahol a kiválasztott kérdőív aktuális állapota látható.

Tényleges viselkedés: A kérdőív neve melletti szerkesztés gombra kattintva megjelennek az adott kérdőív adatai. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A kérdőív neve melletti szerkesztés gombra kattintva megjelennek az adott kérdőív adatai. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: A kérdőívet szerkesztő gomb megfelelően működik. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

8\. Kérdőív szerkesztése: Kérdőív tulajdonságok módosítása
---------------------------

Elvárt viselkedés: A kérdőív szerkesztés felületen beállítható a kérdőív címe, valamint aktiválható és deaktiválható a tudásfelmérő és prediktív kérdések elválasztása és a kérdéssorrend randomizálása.
A Mentés gomb megnyomása után átirányítás történik a Home képernyőre, és az adott kérdőív szerkesztése gombra újból rákattintva láthatjuk hogy a beállítások mentve lettek.

Tényleges viselkedés: A kérdőív cím, kérdések szétválasztására és randomizálására vonatkozó tulajdonságokon végzett változtatások mentés után sikeresen lementődnek. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A kérdőív cím, kérdések szétválasztására és randomizálására vonatkozó beállítások sikeresen elmentődnek. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: A kérdőív szerkesztő beállítások az elvártnak megfelelően működnek. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

9\. Kérdőív szerkesztése: Kérdés tulajdonságok módosítása
---------------------------

Elvárt viselkedés: A kérdőív szerkesztés felületen minden kérdésnél beállítható az adott kérdés szövege, sorszáma, megadható helyes válasz. Beállítható, hogy az adott kérdés prediktív-e. A kérdés típusa módosítható, és a válaszok oszlopban lista típus esetén '|'-jelekkel elválasztva megadható hogy milyen válaszlehetőségek jelenjenek meg.
A Mentés gomb megnyomása után átirányítás történik a Home képernyőre, és az adott kérdőív szerkesztése gombra újból rákattintva láthatjuk hogy a beállítások mentve lettek.
Az adott kérdőív kitöltése közben a lista típusú kérdéseknél megjelennek a felvett válaszlehetőségek.


Tényleges viselkedés: Egy kérdésen végzett módosítások a szerkesztés újboli megnyitása után is láthatóak. A lista típusú kérdésnél a beállított válaszlehetőségek megjelennek. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: Egy kérdés módosításai a szerkesztés ismét megnyitása után is láthatóak. A lista típusú kérdésnél megjelennek a beállított válaszlehetőségek. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: Kérdések szerkesztése során a frissített kérdések jelennek meg. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

10\. Kérdőív szerkesztése: Kérdés lista módosítása
---------------------------------------------------

Elvárt viselkedés: A kérdőív szerkesztés felületen a kérdések listája alatti Új kérdés gombra kattintva lehetőség van új kérdés hozzáadására, valamint az egyes kérdések sorának jobb oldalán megjelenő törlés gombra kattintva létező kérdés törlésére.
A Mentés gomb megnyomása után átirányítás történik a Home képernyőre, és az adott kérdőív szerkesztése gombra újból rákattintva láthatjuk hogy a beállítások mentve lettek.

Tényleges viselkedés: A hozzáadott új kérdések sikeresen lementődnek, a törölt kérdések pedig eltűnnek a kérdőívből. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: Az újonnan hozzáadott kérdések sikeresen elmentődnek, a törölt kérdések pedig eltűnnek a kérdőívből. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: Az új kérdések mentésre kerülnek, a törlendő kérdések megszűnnek a kérdőívben. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

11\. Kérdőív szerkesztése: Prediktív és tudásfelmérő kérdések szétválasztása
---------------------------------------------------

Elvárt viselkedés: A kérdőív szerkesztése felületen beállítható, hogy a prediktív és tudásfelmérő kérdések szétválasztva jelenjenek meg. Ezt a beállítást bekapcsolva mentsünk egy több fajta kérdést tartalmazó kérdőívet.
Az adott kérdőív kitöltésénél a kérdések elkülönítve jelennek meg.

Tényleges viselkedés: A szétválasztás bekapcsolása után a kitöltés felületen 'Tudásfelmérő kérdések:' és 'Prediktív kérdések:' feliratok után jelennek meg az egyes kategóriákba tartozó kérdések. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A szétválasztás bekapcsolása után a kitöltés felületen 'Tudásfelmérő kérdések:' és 'Prediktív kérdések:' feliratok után jelennek meg az egyes kategóriákba tartozó kérdések. Tesztelve: Opera Gx-ben Kiss Marcell által.

Tényleges viselkedés: A kérdések szétválasztása esetén a tudásmérő és prediktív kérdések külön kategóriában jelennek meg. Tesztelve: Mozilla Firefox-ban Szilágyi Mihály által.

12\. Kérdőív szerkesztése: Kérdések sorrendjének randomizálása
---------------------------------------------------

Elvárt viselkedés: A kérdőív szerkesztése felületen beállítható, hogy a kérdések neve randomizált sorrendben jelenjen meg. Ezt a beállítást bekapcsolva mentsünk egy több kérdést tartalmazó kérdőívet.
Az adott kérdőív kitöltésénél a kérdések minden kitöltéskor véletlenszerű sorrendben jelennek meg.

Tényleges viselkedés: A randomizáció bekapcsolása után a kérdések minden kitöltéskor más sorrendben jelennek meg, feltéve hogy van legalább három kérdés szétválasztás mellett vagy két kérdés szétválasztás nélkül. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A randomizáció bekapcsolása után a kérdések más sorrendben jelennek meg minden kitöltéskor , feltéve hogy legalább három kérdés létezik  szétválasztással vagy két kérdés szétválasztás nélkül. Tesztelve: Opera Gx-ben Kiss Marcell által.


13\. Kérdőív szerkesztése: Kérdések sorrendjének manuális beállítása
---------------------------------------------------

Elvárt viselkedés: A kérdőív szerkesztése felületen beállítható, hogy a kérdések neve randomizált sorrendben jelenjen meg. Ezt a beállítást kapcsoljuk ki egy több kérdést tartalmazó kérdőívnél.
Az adott kérdőív egyes kérdéseihez sorszámot megadva beállítható a kérdések sorrendje.
Az adott kérdőív kitöltésénél a kérdések a megadott sorszámok alapján növekvő sorrendbe rendezve jelennek meg.

Tényleges viselkedés: A kérdések rendezése a megadott sorrend alapján történik. Szétválasztás beállítása esetén a tudásfelmérő kérdések a prediktív kérdések elé kerülnek, a két blokkban pedig a megadott sorrend szerint vannak rendezve. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A megadott sorrend alapján történik a kérdések rendezése . Szétválasztás beállítása után a a prediktív kérdések  tudásfelmérő kérdések után kerülnek, a két blokkban pedig a megadott sorrend szerint vannak rendezve. Tesztelve: Opera Gx-ben Kiss Marcell által.

14\. Válaszok listázása felület
---------------------------------------------------

Elvárt viselkedés: A Home képernyő navigációs menüjében (képernyő teteje) a Listázás menüpontra kattintva megjelenik a válasz lekérdező felület.

Tényleges viselkedés: Admin felhasználóként bejelentkezve sikeresen elérjük a válasz listázási nézetet. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: Adminként bejelentkezve sikeresen  megjelenik a válasz lekérdező felület. Tesztelve: Opera Gx-ben Kiss Marcell által.

15\. Válaszok listázása egy kérdőívhez
---------------------------------------------------

Elvárt viselkedés: A választható kérdőívek listából egyre rákattintva a kérdőív lista alatti DataTable-ben megjelennek az ehhez a kérdőívhez eltárolt válaszok.

Tényleges viselkedés: Ha olyan kérdőívre kattintunk amelyikhez vannak tárolva válaszok, akkor azok megjelennek az alsó táblázatban. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: Olyan kérdőívre kattintva amelyikhez már vannak tárolva válaszok, akkor azok megjelennek az alsó táblázatban. Tesztelve: Opera Gx-ben Kiss Marcell által.

16\. Válaszok listázása utáni szűrés
---------------------------------------------------

Elvárt viselkedés: Az egy kérdőívhez tartozó válaszok listáját lehet szűrni a Kérdés oszlopban lévő szűrő ikonra kattintva. Szűrés után csak a kiválasztott kérdésekre adott válaszok jelennek meg.

Tényleges viselkedés: A szűrés beállítása után csak a kiválasztott kérdéshez vagy kérdésekhez tartozó válaszok jelennek meg. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A szűrés alkalmazása után csak a kiválasztott kérdéshez vagy kérdésekhez tartozó válaszok jelennek meg. Tesztelve: Opera Gx-ben Kiss Marcell által.

17\. Válaszok listázása utáni átrendezés
---------------------------------------------------

Elvárt viselkedés: Az egy kérdőívhez tartozó válaszok listáját át lehet rendezni az egyes oszlopok fejlécére kattintva. Beállítható fordított sorrend is, valamint a Ctrl billentyű nyomvatartásával több lépéses rendezés is megadható, például kitöltő szerint és azon belül kérdés szerint.

Tényleges viselkedés: Az egyes oszlopokban a rendezés beállítása után a tábla sorok megfelelő módon átrendeződnek. A fejlécre újboli kattintással a sorrend megfordítható. A több lépcsős rendezés megfelelően működik. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: Az egyes oszlopokban a rendezés beállítása után a tábla sorok megfelelő módon átrendeződnek. Ismét a fejlécre kattintva a sorrend megfordítható. Megfelelően működik a több lépcsős rendezés. Tesztelve: Opera Gx-ben Kiss Marcell által.


18\. Regisztrációs felület
---------------------------------------------------

Elvárt viselkedés: Ha nem vagyunk bejelentkezve, akkor a Home képernyő tetején megjelenik a Regisztráció.
Erre kattintva megnyílik a regisztrációs felület.

Tényleges viselkedés: A Logout gombbal történő kijelentkezés után láthatóvá válik a Regisztráció felirat. A regisztrációs felület sikeresen megnyílik. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A Logout gombbal való kijelentkezés után láthatóvá válik a Regisztráció. A regisztrációs felület megnyílik. Tesztelve: Opera Gx-ben Kiss Marcell által.

19\. Regisztráció helyes adatokkal
---------------------------------------------------

Elvárt viselkedés: A név mezőt kitöltve, az email mezőben helyes email cím megadásával valamint a jelszó és ellenőrző jelszó mezőket egyező jelszóval feltöltve létrehozhatunk egy új felhasználót a Regisztráció gombbal. A regisztráció után átirányítás történik a login felületre, ahol be tudunk jelentkezni az új felhasználóval.

Tényleges viselkedés: A regisztráció sikeresen megtörténik, a login oldalon a bevitt adatokkal lehetséges a belépés. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: A regisztráció sikeresen végbemegy, a helyes adatokkal lehetséges a belépés. Tesztelve: Opera Gx-ben Kiss Marcell által.

20\. Regisztráció hibás adatokkal
---------------------------------------------------

Elvárt viselkedés: Ha valamelyik mezőt nem töltjük ki, nem valid email-t adunk meg vagy különböző jelszót írunk a két jelszó mezőbe, akkor a regisztráció nem történik meg.

Tényleges viselkedés: Ha nem valid User adatokat adunk meg, a regisztráció nem megy végbe. A hibaüzenet nem mindig adja meg pontosan hogy miben volt a hiba. Tesztelve: Google Chrome-ban Osztós Zsombor által.

Tényleges viselkedés: Ha nem jó User adatokat adunk meg, a regisztráció nem sikerül. A hibaüzenet nem mindig adja meg pontosan, hogy mi volt a hiba. Tesztelve: Opera Gx-ben Kiss Marcell által.
