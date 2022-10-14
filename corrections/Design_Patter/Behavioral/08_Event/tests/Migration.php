<?php


class Migration
{

    public function setData($pdo): void
    {
        $faker = Faker\Factory::create();

        $sql = "
            DROP TABLE IF EXISTS users;
        ";

        $pdo->exec($sql);
        /**
         * @create table users
         */
        $sql = "
            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                email TEXT,
                password TEXT,
                address TEXT,
                history_count SMALLINT UNSIGNED NOT NULL DEFAULT 0
            );
      ";

        $pdo->exec($sql);

        for ($i = 0; $i < 30; $i++) {
            $email = $faker->unique()->email;
            $pass = sha1("secret");
            $address = "Paris";
            $pdo->exec("INSERT INTO users (email, password, address) VALUES ('$email', '$pass', '$address')");
        }
    }
}
