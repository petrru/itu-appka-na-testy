-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Čtv 30. lis 2017, 22:00
-- Verze serveru: 5.7.20-0ubuntu0.16.04.1
-- Verze PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databáze: `itu`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_czech_ci NOT NULL,
  `data` text COLLATE utf8mb4_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `tests`
--

INSERT INTO `tests` (`test_id`, `user_id`, `name`, `data`) VALUES
  (1, 1, 'Slovíčka', '{"name":"Slovíčka","questions":[{"text":"Jablko","type":"auto","shuffle_options":null,"options":[{"text":"Orange","correct":false},{"text":"Apple","correct":true},{"text":"Truck","correct":false}]},{"text":"Škola","type":"auto","shuffle_options":null,"options":[{"text":"Kindergarden","correct":false},{"text":"School","correct":true},{"text":"University","correct":false},{"text":"Black","correct":false}]},{"text":"Bílá","type":"auto","shuffle_options":null,"options":[{"text":"White","correct":true},{"text":"Yellow","correct":false},{"text":"Blue","correct":false},{"text":"Red","correct":false},{"text":"Green","correct":false}]},{"text":"Rámec","type":"auto","shuffle_options":null,"options":[{"text":"Package","correct":false},{"text":"Message","correct":false},{"text":"Envelope","correct":false},{"text":"Frame","correct":true}]},{"text":"Chytrý","type":"auto","shuffle_options":null,"options":[{"text":"Smart","correct":true},{"text":"Stupid","correct":false},{"text":"Clever","correct":true},{"text":"Curious","correct":false}]}]}');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`) VALUES
  (1, 'pepa', '$2y$10$jAdsTbZH.wxHhBm4NqBOXOisrpXD0zRmbGTwufOKCwyNiWi7hM9mq');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;