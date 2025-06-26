<?php

function conectarDB(): PgSql\Connection
{
    // Cargando las credenciales desde las variables de entorno
    $host     = getenv('DB_HOST')     ?: 'dpg-d1e8tkili9vc739q0d0g-a';
    $port     = getenv('DB_PORT')     ?: '5432'; // Puerto por defecto para PostgreSQL
    $user     = getenv('DB_USER')     ?: 'databaseuptask_user';
    $password = getenv('DB_PASSWORD') ?: 'AAcMRuVKrgLfiJXRuSGzWLU4qpG7773G';
    $database = getenv('DB_NAME')     ?: 'databaseuptask';

    // Cadena de conexión
    $connectionString = "host=$host port=$port dbname=$database user=$user password=$password";

    // Conectando a la base de datos
    $db = pg_connect($connectionString);

    // Verificar si hubo un error de conexión
    if (!$db) {
        die("Error: No se puede conectar a la base de datos PostgreSQL.");
    }

    return $db;
}
