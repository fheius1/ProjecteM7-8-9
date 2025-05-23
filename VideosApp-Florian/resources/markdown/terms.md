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


## Sprint 4
**Correcció d'errors**: Corregir els errors detectats en el Sprint 3.

**VideosManageController**: S'ha creat el "VideosManageController" amb les funcions següents:
- `testedBy()`
- `index()`
- `store()`
- `show($id)`
- `edit($id)`
- `update($id)`
- `destroy($id)`

**VideosController**: S'ha creat la funció `index()` per llistar tots els vídeos.

**DatabaseSeeder**: S'han afegit 3 vídeos creats en ajudants al "DatabaseSeeder".

**Vistes per al CRUD**: S'han creat les vistes següents per a les operacions CRUD, accessibles només per als usuaris amb els permisos adequats:
- `resources/views/videos/manage/index.blade.php`: Conté la taula CRUD per als vídeos.
- `resources/views/videos/manage/create.blade.php`: Conté el formulari per crear vídeos, amb atributs `data-qa` per facilitar la identificació de la prova.
- `resources/views/videos/manage/edit.blade.php`: Conté el formulari per editar vídeos.
- `resources/views/videos/manage/delete.blade.php`: Conté la confirmació de l'eliminació del vídeo.

**Videos Index View**: Creat `resources/views/videos/index.blade.php` per mostrar tots els vídeos amb enllaços als detalls del vídeo.

**Tests**:
- S'ha modificat `user_with_permissions_can_manage_videos()` per garantir que hi hagi 3 vídeos.
- S'han creat les funcions en el helper per crear permisos de vídeo per a CRUD i assignar-los als usuaris corresponents.

**VideoTest**: Creacio de les següents funcions:
- `user_without_permissions_can_see_default_videos_page`
- `user_with_permissions_can_see_default_videos_page`
- `not_logged_users_can_see_default_videos_page`

**VideosManageControllerTest**: Creacio de les següents funcions:
- `loginAsVideoManager`
- `loginAsSuperAdmin`
- `loginAsRegularUser`
- `user_with_permissions_can_see_add_videos`
- `user_without_videos_manage_create_cannot_see_add_videos`
- `user_with_permissions_can_store_videos`
- `user_without_permissions_cannot_store_videos`
- `user_with_permissions_can_destroy_videos`
- `user_without_permissions_cannot_destroy_videos`
- `user_with_permissions_can_see_edit_videos`
- `user_without_permissions_cannot_see_edit_videos`
- `user_with_permissions_can_update_videos`
- `user_without_permissions_cannot_update_videos`
- `user_with_permissions_can_manage_videos`
- `regular_users_cannot_manage_videos`
- `guest_users_cannot_manage_videos`
- `superadmins_can_manage_videos`

**Routes**: S'han creat les rutes "vídeos/manage" per al CRUD de vídeo amb el middleware corresponent i la ruta d'índex de vídeo.

**Layout**: Modificar  la barra de navegacio per afegir les noves rutes


## Sprint 5
**Correcció d'errors**: Corregir els errors detectats en el Sprint 4.

**Actualitzar taula videos**: Afegir el camp user_id a la taula de videos

**Controllers**:
- Crear el controller `UsersController` amb les funcions següents:'
  - `index()`
  - `show($)`
- Crear el controlador `UserManagementController` amb les funcions per a poder realitzar el CRUD de usuaris:
  - `index()`
  - `show($id)`
  - `edit($id)`
  - `update($id)`
  - `destroy($id)`

**Vistes**: Crear les vistes per a la gestió d'usuaris:
- `resources/views/users/manage/index.blade.php`: Conté la taula CRUD per als usuaris.
- `resources/views/users/manage/create.blade.php`: Conté el formulari per crear usuaris, amb atributs `data-qa` per facilitar la identificació de la prova.
- `resources/views/users/manage/edit.blade.php`: Conté el formulari per editar usuaris.
- `resources/views/users/manage/delete.blade.php`: Conté la confirmació de l'eliminació de l'usuari.
- `resources/views/users/manage/show.blade.php`: Conté la vista per veure els detalls de l'usuari.
`resources/views/users/manage/index.blade.php`: Conte la llista dels usuaris

**Helper**:
- Actualitzar la funció `create_user_management_permission` per a crear el permisos d'usuaris.

**UserTest**:Creacio de les següents funcions:
- user_without_permissions_can_see_default_users_page,
- not_logged_users_cannot_see_default_users_page,
- user_without_permissions_can_see_user_show_page,
- user_with_permissions_can_see_user_show_page,
- not_logged_users_cannot_see_user_show_page

**UsersManageControllerTest**: Creacio de les següents funcions:
- loginAsVideoManager,
- loginAsSuperAdmin,
- loginAsRegularUser,
- user_with_permissions_can_see_add_users, user_without_users_manage_create_cannot_see_add_users,  user_with_permissions_can_store_users,   user_without_permissions_cannot_store_users,  user_with_permissions_can_destroy_users, user_without_permissions_cannot_destroy_users,
- user_with_permissions_can_see_edit_users,  user_without_permissions_cannot_see_edit_users,  
- user_with_permissions_can_update_users,
- user_without_permissions_cannot_update_users
- user_with_permissions_can_manage_users,
- regular_users_cannot_manage_users,
- guest_users_cannot_manage_users,
- superadmins_can_manage_users

**Routes**: Afegir les rutes per a la gestio d'usuaris.



## Sprint 6
**Correcció d'errors**: Corregir els errors detectats en el Sprint 5.

**Migracio series**: Creo la migracio per a la taula series.

**Control·ladors de series**: Creo els control·ladors per a la gestio de series.

**Model Series**: Creo el model per a la taula series.

**Helper de series**: Creo el helper per a la creacio de series per defecte.

**Vistes de series**: Creo les vistes per a la gestio de series:
- `resources/views/series/manage/index.blade.php`: Conté la taula CRUD per a les series.
- `resources/views/series/manage/create.blade.php`: Conté el formulari per crear series, amb atributs `data-qa` per facilitar la identificació de la prova.
- `resources/views/series/manage/edit.blade.php`: Conté el formulari per editar series.
- `resources/views/series/manage/delete.blade.php`: Conté la confirmació de l'eliminació de la serie.
- `resources/views/series/manage/index.blade.php`: Conte la llista de les series que poden veure tots els usuaris
- `resources/views/series/manage/show.blade.php`: Conté la vista per veure els detalls de la serie.

**Permissos en helpers**: Creo un nou permis per a la gestio de series en el helper.


**Creacio de testos**: Creo els seguents testos:
- `SeriesTest`:
  - serie_have_videos()
  

- `SeriesManageControllerTest`
  - loginAsVideoManager()
  - loginAsSuperAdmin()
  - loginAsRegularUser()
  - user_with_permissions_can_see_add_series()
  - user_without_series_manage_create_cannot_see_add_series()
  - user_with_permissions_can_store_series()
  - user_without_permissions_cannot_store_series()
  - user_with_permissions_can_destroy_series()
  - user_without_permissions_cannot_destroy_series()
  - user_with_permissions_can_see_edit_series()
  - user_without_permissions_cannot_see_edit_series()
  - user_with_permissions_can_update_series()
  - user_without_permissions_cannot_update_series()
  - user_with_permissions_can_manage_series()
  - regular_users_cannot_manage_series()
  - guest_users_cannot_manage_series()
  - superadmins_can_manage_series()

**Rutes de series**: Afegeixo les rutes en web.php per a les operacions CRUD de series.

**Navegacio**: Actualizo la barra de navegacio per a afegir les rutes de series.



## Sprint 7
**Correcció d'errors**: Corregir els errors detectats en el Sprint 6.

**Event VideoCreated**:
- Crear l’event `VideoCreated` amb el constructor i `BroadcastOn`.
- Al controller, disparar l’event al crear el vídeo.

**Listener SendVideoCreatedNotification**:
- Crear el listener `SendVideoCreatedNotification`.
- Afegir la funció `handle(VideoCreated $event)` que:
    - Envia un correu als administradors.
    - Envia la notificació `VideoCreated` amb informació del vídeo relacionada amb l’event.

**EventServiceProvider**:
- Crear `app/Providers/EventServiceProvider.php`.
- Registrar la notificació de la creació del vídeo.

**Configuració de correu**:
- Registrar-se a Mailtrap o Mailchimp per utilitzar el servidor de correus.
- Configurar el `.env` per utilitzar les credencials de Mailtrap/Mailchimp/EmailJs.

**Configuració de Pusher**:
- Registrar-se a Pusher.
- Configurar `.env` amb les credencials de Pusher.
- A `config/broadcasting.php`, revisar que Pusher estigui configurat per defecte.

**Event VideoCreated**:
- A `App/Events/VideoCreated.php`, afegir la funció `broadcastAs()` i assegurar-se que implementa `ShouldBroadcast`.

**Listener SendVideoCreatedNotification**:
- Assegurar-se que Pusher transmet l’event.

**Registrar Event**:
- Registrar l’event a `app/Providers/EventServiceProvider.php`.

**Disparar Event**:
- Al controller, disparar l’event del push.

**Configuració de Laravel Echo**:
- Instal·lar `laravel-echo` i `pusher-js` amb npm.
- Configurar Laravel Echo a `resources/js/bootstrap.js`.

**Vista de notificacions push**:
- Crear la vista per mostrar les notificacions.
- Escoltar prèviament les notificacions.

**Ruta de notificacions**:
- Crear la ruta per a les notificacions.

**Tests**:
- A `videoNotificationsTest`, crear les funcions:
    - `test_video_created_event_is_dispatched()`
    - `test_push_notification_is_sent_when_video_is_created()`

**Documentació**:
- Afegir a `resources/markdown/terms.md` el que s’ha fet al Sprint.

**Larastan**:
- Comprovar en Larastan tots els fitxers creats.




