<?php

namespace Cart;

class StorageSession implements Storable
{

    public function __construct()
    {
        // On regarde si on a déjà ouvert les sessions si on l'a fait ce n'est plus à faire sinon bug au niveau des headers
        if (isset($_SESSION) === false) session_start();

        // initialise la variable SESSION
        if (empty($_SESSION['storage'])) {
            $_SESSION['storage'] = [];
        }
    }

    public function setValue(string $name, float $price): void
    {
        if (array_key_exists($name, $_SESSION['storage']) === true) {
            $_SESSION['storage'][$name] += $price;

            return;
        }

        $_SESSION['storage'][$name] = $price;
    }

    public function restore(string $name): void
    {
        if (array_key_exists($name, $_SESSION['storage']) === true)
            unset($_SESSION['storage'][$name]);
    }
    public function reset(): void
    {
        $_SESSION['storage'] = [];
    }

    public function getStorage(): array
    {
        return $_SESSION['storage'];
    }
}
