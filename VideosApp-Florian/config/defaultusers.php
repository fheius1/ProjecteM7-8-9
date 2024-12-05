<?php

return [
    'user' => [
            'name' => env("USUARI_NAME", "UsuariDefault"),
            'email' => env("USUARI_EMAIL", "usuari@example.com"),
            'password' => env("USUARI_PASSWORD", "alumne1234"),
            ],
    'professor' => [
            'name' => env("PROFESSOR_NAME", "ProfessorDefault"),
            'email' => env("PROFESSOR_EMAIL", "professor@example.com"),
            'password' => env("USER_PASSWORD", "professor1234"),
            ],
        ];

