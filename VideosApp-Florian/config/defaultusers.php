<?php

return [
    'user' => [
            'name' => env("NOM_USUARI", "UsuariDefault"),
            'email' => env("EMAIL_USUARI", "usuari@example.com"),
            'password' => env("USUARI_PASSWORD", "alumne1234"),
            ],
    'professor' => [
            'name' => env("NOM_PROFESSOR", "ProfessorDefault"),
            'email' => env("MAIL_PROFESSOR", "professor@example.com"),
            'password' => env("PROFESSOR_PASSWORD", "professor1234"),
            ],
        ];

