# Laravel GeoIP Blocker

Ez a Laravel alkalmazás egy egyszerű blokkolási rendszert valósít meg, amely megakadályozza, hogy a Kaliforniában található felhasználók hozzáférjenek egy adott oldalhoz. Ha a felhasználó Kaliforniából érkezik, egy 404-es hibát kap, míg a keresőrobotok, mint például a Google, továbbra is hozzáférnek az oldalhoz.

## Funkciók

-   Ellenőrzi a felhasználó földrajzi helyét IP cím alapján.
-   Blokkolja a Kaliforniából érkező felhasználókat a megadott oldalon.
-   A blokkolás nem érinti a keresőrobotokat.
-   A felhasználó helyadatait kiírja a log fájlba.

## Telepítés

1. **Környezet beállítása**: Győződj meg róla, hogy a Laravel 11 telepítve van, és fut a fejlesztési környezetedben.

2. **A csomag telepítése**:
    ```bash
    composer require torann/geoip
    ```
