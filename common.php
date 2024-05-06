<?php

function setView(string $view, ?array $data = null)
{
    global $title;
    require_once 'App/Views/top.element.php';
    require_once 'App/Views/' . $view . '.php';
    require_once 'App/Views/bottom.element.php';
}

function getToken(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = uniqid('', true);
    }
    return password_hash($_SESSION['csrf'], PASSWORD_DEFAULT);
}

function checkToken(string $token): bool
{
    return password_verify($_SESSION['csrf'], $token);
}

function cleanInput(string $string): string
{
    $string = trim($string);
    $string = stripcslashes($string);
    return htmlspecialchars($string);
}
