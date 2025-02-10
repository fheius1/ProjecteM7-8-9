## Descripcio del projecte
El projecte VideosApp és una aplicació web dissenyada per gestionar i visualitzar vídeos. Els usuaris poden crear, veure i gestionar contingut de vídeo. L'aplicació es construeix amb PHP i Laravel, amb l'objectiu de proporcionar una experiència d'usuari perfecta per a la gestió de vídeos.

## Característiques
- Autenticació i gestió d'usuaris
- Creació i gestió de vídeos
- Visualització de vídeos
- Formatar les dates de publicació de vídeo mitjançant la biblioteca de carboni

## Sprint 1
**Creacio d'usuaris**: Creem un usuari amb lo helper `CreacioUsuari`.  
**Crear configuracio per defecte**: Creem l'arxiu `defaultusers.php` ante fiquem les credencials dels usuaris per defecte.  
**Modificar .env**: Al arxiu `.env` afegim les dades de `defaultusers.php`.  
**Creacio test**: Creem un test per comprovar que es poden crear usuaris.

## Sprint 2
1. **Revisio errors**: Arreglar errors de sprints anteriors.
2. **Estructura vidos**: Creem la estructura per a videos, model,controlador, migracions, vistes, etc...
3. **Creacio testos**: Crear testos per a la creacio i format dels videos.
4. **Revisio Larastran**: Instalacio de la llibreria Larastran per a la formatacio de dates i revisio del codi.

## Sprint 3
**Correcció d'errors**: Corregir els errors detectats en el Sprint 2.

**Instal·lació de spatie/laravel-permission**: Instal·lar el paquet spatie/laravel-permission.

**Migració super_admin**: Crear una migració per afegir el camp super_admin a la taula dels usuaris.

**Model d’usuaris**:
- Afegir la funció `testedBy()`.
- Afegir la funció `isSuperAdmin()`.

**Helpers**:
- Afegir el superadmin al professor a la funció `create_default_professor`.
- Crear la funció `add_personal_team()` per separar el codi de la creació del team dels usuaris.
- Crear les funcions:
    - `create_regular_user()` amb valors (regular, regular@videosapp.com, 123456789).
    - `create_video_manager_user()` amb valors (Video Manager, videosmanager@videosapp.com, 123456789).
    - `create_superadmin_user()` amb valors (Super Admin, superadmin@videosapp.com, 123456789).
    - `define_gates()`.
    - `create_permissions()`.

**AppServiceProvider**:
- Registrar les polítiques d’autorització a la funció `book`.
- Definir les portes d'accés.

**DatabaseSeeder**:
- Posar els permisos i els usuaris superadmin, regular user i video manager per defecte.

**Publicació de stubs**: Seguir l’exemple de Laravel News.

**Creació de tests**:
- `VideosManageControllerTest` a `tests/Feature/Videos/`:
- `UserTest` a `tests/Unit/`:
