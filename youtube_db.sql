-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 08 2026 г., 07:26
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `youtube_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `channel_name` varchar(255) NOT NULL,
  `stats` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(50) DEFAULT 'inne'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `title`, `video_url`, `description`, `thumbnail`, `channel_name`, `stats`, `created_at`, `category`) VALUES
(2, 'Nirvana', 'https://www.youtube.com/embed/VYuzjGv8hBU?si=Tb_CjA18UScmcV2I', 'Nirvana song', 'images/img1.jpg', 'Rock Legends', '50 mln wyświetleń • 10 lat temu', '2026-03-05 20:02:56', 'muzyka'),
(3, 'Nowości z Iraku', 'https://www.youtube.com/embed/gdSANEoHG7A?si=pQyZzMqA5YjK8OWv', 'Co się dzieje w Iraku', 'images/img2.jpg', 'Wiadomości Świt', '12 tys. wyświetleń • 2 dni temu', '2026-03-14 20:58:56', 'wiadomosci'),
(4, 'Gotujemy pieczywo', 'https://www.youtube.com/embed/mhDJNfV7hjk?si=nZ5DBILtVqx9KBXt', 'Jak zrobić pieczywo z dziećmi ', 'images/img3.jpg', 'Piekarnia Domowa', '150 tys. wyświetleń • 1 rok temu', '2026-03-19 12:02:47', 'jedzenie'),
(5, 'Jestem w Niemcach', 'https://www.youtube.com/embed/8cvrBEe2bRU?si=k-Si6GGEAkhVO09u', 'jak się żyje w Niemcach', 'images/img7.jpg', 'Vloger Podróżnik', '300 tys. wyświetleń • 5 miesięcy temu', '2026-03-19 12:03:40', 'podroze'),
(6, 'BMW', 'https://www.youtube.com/embed/Xh79FZUxzd8?si=IiwxDaFA1IDJt3O3', 'Prawda o BMW', 'images/img8.jpg', 'Moto Fan', '2 mln wyświetleń • 3 lata temu', '2026-03-19 12:04:31', 'technologia'),
(7, 'Memy 2023', 'https://www.youtube.com/embed/5ZpbETeUL2o?si=EYZ9WVnBKtbdxoOE', 'Najlepsze memy', 'images/img10.png', 'Śmieszne Koty', '5 mln wyświetleń • 8 miesięcy temu', '2026-03-19 12:05:28', 'rozrywka'),
(8, 'Java Script ', 'https://www.youtube.com/embed/TioxU0wdMQg?si=u-vckOtw3esckNxK', 'Java Script w 2 godziny', 'images/img11.jpg', 'Kodowanie z Pasją', '80 tys. wyświetleń • 1 miesiąc temu', '2026-03-19 12:18:25', 'programowanie'),
(9, 'CS2 turniej', 'https://www.youtube.com/embed/Fu2yFoiCdxE?si=TjhR-C_zPiiP6xzb', 'Nie wiem co mam pisać', 'images/img12.jpg', 'Esport Polska', '450 tys. wyświetleń • 2 tygodnie temu', '2026-03-19 12:19:10', 'sport'),
(10, 'World Cup 2022', 'https://www.youtube.com/embed/DDWYR9Oi_wI?si=M2tYNnydqv8H3O2E', 'Fifa football', 'images/img13.jpg', 'Piłka Nożna TV', '10 mln wyświetleń • 1 rok temu', '2026-03-19 12:22:54', 'sport'),
(11, 'Voleyball ', 'https://www.youtube.com/embed/OxmrhPIdTOU?si=zCUdVHwdtj4A024_', 'Voleyball', 'images/img14.webp', 'Siatka PL', '200 tys. wyświetleń • 3 dni temu', '2026-03-19 12:24:49', 'sport'),
(12, 'Turniej z tenisa', 'https://www.youtube.com/embed/U7uhxZF7oQM?si=FUVLAbpIbxGZJwRp', 'mocny turniej', 'images/img15.jpg', 'Tenis Pro', '1 mln wyświetleń • 4 miesiące temu', '2026-03-19 12:26:59', 'sport'),
(13, 'Jestem we Włochach', 'https://www.youtube.com/embed/3aGiTYIuGzM?si=IIIHpXqIIxYenxdw', 'Jakie są Włochy\r\n', 'images/img16.webp', 'Bella Italia', '600 tys. wyświetleń • 2 lata temu', '2026-03-19 12:28:08', 'podroze'),
(14, 'Relaxing Jazz Mix 2026', 'https://www.youtube.com/embed/nv_2rz5BFDA?si=sDvnee_OFZqCWCKW', 'Relaksująca muzyka jazzowa idealna do nauki i pracy.', 'images/img17.jpg', 'Jazz Vibes', '2 mln wyświetleń • 1 rok temu', '2026-04-04 20:20:07', 'muzyka'),
(15, 'Wiadomości ze świata - Na żywo', 'https://www.youtube.com/embed/47H38idL4_s?si=XsAFUr58ktjGQLIM', 'Najnowsze informacje i wydarzenia ze świata. Śledź na żywo.', 'images/ima18.jpg', 'Global News PL', '500 tys. wyświetleń • 5 godzin temu', '2026-04-04 20:20:07', 'wiadomosci'),
(16, 'Jak zrobić idealną pizzę włoską', 'https://www.youtube.com/embed/DCk1pGYPmGQ?si=19CueQvzATZ6U4AJ', 'Krok po kroku: przepis na prawdziwą włoską pizzę z domowego piekarnika.', 'images/ima19.jpg', 'Włoska Kuchnia', '1.2 mln wyświetleń • 2 lata temu', '2026-04-04 20:20:07', 'jedzenie'),
(17, 'Podróż do Japonii - Tokio Vlog', 'https://www.youtube.com/embed/tu3rdwHVk0M?si=l9coNUBdcf45DMfO', 'Niesamowity vlog z podróży do Tokio. Zwiedzamy najciekawsze miejsca.', 'images/img20.jpg', 'Azja Vlog', '850 tys. wyświetleń • 7 miesięcy temu', '2026-04-04 20:20:07', 'podroze'),
(18, 'Recenzja nowego smartfona 2026', 'https://www.youtube.com/embed/-qFE9_fG20w?si=x_C5NQKjbMFi1ZdL', 'Sprawdzamy najnowszego smartfona na rynku. Czy warto go kupić?', 'images/img21.jpg', 'Tech Guru', '300 tys. wyświetleń • 2 tygodnie temu', '2026-04-04 20:20:07', 'technologia'),
(19, 'Kurs PHP i MySQL dla początkujących', 'https://www.youtube.com/embed/a7_WFUlFS94?si=YZwMUtrg0q6IlOpq', 'Najlepszy poradnik do nauki backendu od zera.', 'images/img22.jpg', 'Backend Dev', '45 tys. wyświetleń • 1 miesiąc temu', '2026-04-04 20:20:07', 'programowanie'),
(20, 'Finał Ligi Mistrzów - Skrót meczu', 'https://www.youtube.com/embed/38bOBHPVkmg?si=xUJJn7lAkIp2Z4vq', 'Emocjonujące bramki i najlepsze akcje z wczorajszego finału.', 'images/img23.jpg', 'Sport Max', '3 mln wyświetleń • 1 dzień temu', '2026-04-04 20:20:07', 'sport'),
(21, 'Top Hits Muzyka Pop 2026', 'https://www.youtube.com/embed/fTKqtvXjkvo?si=G85WjJ7sDhXA0qig', 'Składanka najpopularniejszych utworów popowych tego roku.', 'images/img24.jpg', 'Pop Station', '8 mln wyświetleń • 10 miesięcy temu', '2026-04-04 20:20:07', 'muzyka'),
(22, 'Pogoda na weekend - Prognoza', 'https://www.youtube.com/embed/4KEqxPCPvgw?si=f2a4qSnWFxzSNHzx', 'Sprawdź, jaka pogoda czeka nas w nadchodzący weekend.', 'images/img25.jpg', 'Pogoda 24', '120 tys. wyświetleń • 4 godziny temu', '2026-04-04 20:20:07', 'wiadomosci'),
(23, 'Pyszne spaghetti w 15 minut', 'https://www.youtube.com/embed/RpOzNjkKFHM?si=ExCQS3pBdEyu6DZJ', 'Szybki i łatwy przepis na obiad po włosku.', 'images/img26.jpg', 'Szybkie Przepisy', '2.5 mln wyświetleń • 3 lata temu', '2026-04-04 20:20:07', 'jedzenie'),
(24, 'Góry zimą - Niesamowite widoki', 'https://www.youtube.com/embed/i-vjq6ay2Pw?si=rXsWfKRF0RZeXlen', 'Eksploracja ośnieżonych szczytów. Przepiękne krajobrazy.', 'images/img27.jpg', 'Szlakami Gór', '180 tys. wyświetleń • 1 rok temu', '2026-04-04 20:20:07', 'podroze'),
(25, 'Jaki laptop kupić na studia?', 'https://www.youtube.com/embed/G0Y8exZXgS4?si=pg3UOMoGI2GaRYFg', 'Zestawienie najlepszych i najtańszych laptopów dla studentów.', 'images/img28.jpg', 'Studencki Tech', '600 tys. wyświetleń • 5 miesięcy temu', '2026-04-04 20:20:07', 'technologia'),
(26, 'HTML & CSS od zera - Poradnik', 'https://www.youtube.com/embed/opNgrPv3Qw8?si=hT_Va3yzXRjWP3FL', 'Naucz się tworzyć strony internetowe z naszym darmowym kursem.', 'images/img29.jpg', 'FrontEnd PL', '900 tys. wyświetleń • 2 lata temu', '2026-04-04 20:20:07', 'programowanie'),
(27, 'Najlepsze gole sezonu 2025/2026', 'https://www.youtube.com/embed/pXxsBDM2Xo8?si=a5yDE6h-Dz_C8m3o', 'Kompilacja najbardziej spektakularnych bramek sezonu.', 'images/img30.jpg', 'Piłkarski Świat', '4.2 mln wyświetleń • 1 rok temu', '2026-04-04 20:20:07', 'sport'),
(28, 'lofi hip hop radio - beats to relax/study to', 'https://www.youtube.com/embed/lTRiuFIWV54?si=JMP3dcoXqBlNm8Av', 'Spokojne bity lofi do relaksu, nauki i programowania.', 'images/img31.webp', 'Chillout Beats', '15 mln wyświetleń • 4 lata temu', '2026-04-04 20:20:07', 'muzyka'),
(29, 'Najważniejsze wydarzenia tygodnia', 'https://www.youtube.com/embed/1G5YiO90RCA?si=6AU_N5v7JbNFQeNt', 'Podsumowanie najważniejszych newsów z ostatnich 7 dni.', 'images/img32.jpg', 'Tydzień w Pigułce', '55 tys. wyświetleń • 2 dni temu', '2026-04-04 20:20:07', 'wiadomosci'),
(30, 'Szybki deser w 5 minut bez pieczenia', 'https://www.youtube.com/embed/KdhewFv3VEs?si=genpGJBm47jJX146', 'Genialny przepis na coś słodkiego, gdy nie masz czasu.', 'images/img33.jpg', 'Słodka Chwila', '3.1 mln wyświetleń • 8 miesięcy temu', '2026-04-04 20:20:07', 'jedzenie'),
(31, 'Zwiedzamy Paryż - Wieża Eiffla', 'https://www.youtube.com/embed/dl-9OYz02rw?si=zucC0PLrjJV3P5Uq', 'Romantyczny wyjazd do stolicy Francji. Co warto wiedzieć?', 'images/img34.jpg', 'Francja Elegancja', '400 tys. wyświetleń • 1 rok temu', '2026-04-04 20:20:07', 'podroze'),
(32, 'Test klawiatury mechanicznej za 100 zł', 'https://www.youtube.com/embed/QQLSy8nj0sE?si=VuIzfNPMDKCZWc07', 'Czy tania klawiatura mechaniczna ma w ogóle sens?', 'images/img35.jpg', 'Tani Sprzęt', '220 tys. wyświetleń • 3 tygodnie temu', '2026-04-04 20:20:07', 'technologia'),
(33, 'JavaScript: Obiekty i Klasy', 'https://www.youtube.com/embed/vY4lL2Mro8c?si=EVXK1AQNhaPbZ6pO', 'Tłumaczymy programowanie obiektowe w JS krok po kroku.', 'images/img36.jpg', 'JS Master', '34 tys. wyświetleń • 6 miesięcy temu', '2026-04-04 20:20:07', 'programowanie'),
(34, 'Efektywny trening w domu - 20 min', 'https://www.youtube.com/embed/DAo5uVxzZ-Q?si=8j2k-BuYORhwGLZ9', 'Domowy trening bez sprzętu, który spali mnóstwo kalorii.', 'images/img37.jpg', 'Fit Forma', '5.5 mln wyświetleń • 2 lata temu', '2026-04-04 20:20:07', 'sport'),
(35, 'Epic Cinematic Soundtrack Mix', 'https://www.youtube.com/embed/c-XpTMGPQvI?si=knZJr0Sr1tv7EECS', 'Epicka muzyka filmowa do czytania i grania.', 'images/img38.jpg', 'Epic Sound', '7 mln wyświetleń • 5 lat temu', '2026-04-04 20:20:07', 'muzyka'),
(36, 'Technologiczne nowości na ten tydzień', 'https://www.youtube.com/embed/lrdxuVlXAGg?si=tFAHcKzWDOcWEEdU', 'Przegląd najciekawszych gadżetów i przecieków ze świata tech.', 'images/img39.jpg', 'Tech Tydzień', '88 tys. wyświetleń • 1 dzień temu', '2026-04-04 20:20:07', 'technologia'),
(37, 'Jak upiec domowy chleb - poradnik', 'https://www.youtube.com/embed/lIapePQwWOo?si=UGSffwrNnUiVOcXl', 'Zapach prawdziwego chleba w Twoim domu. Prosty przepis.', 'images/img40.jpg', 'Wypieki Babci', '1.8 mln wyświetleń • 3 lata temu', '2026-04-04 20:20:07', 'jedzenie'),
(38, 'Weekend w Rzymie - Co zobaczyć?', 'https://www.youtube.com/embed/kp3th6YQDXo?si=rsViwC5R--qpfvjw', 'Włoskie wakacje w pigułce. Najlepsze atrakcje Rzymu.', 'images/img41.jpg', 'Rzymskie Wakacje', '750 tys. wyświetleń • 1 rok temu', '2026-04-04 20:20:07', 'podroze'),
(39, 'Najlepsze hity lat 90 - Mix', 'https://www.youtube.com/embed/u9pQdHlhaHw?si=qSzzJTgnr5qUdFi_', 'Wspomnień czar. Muzyka, przy której bawiliśmy się w latach 90.', 'images/img42.jpg', 'Retro Muzyka', '12 mln wyświetleń • 6 lat temu', '2026-04-04 20:20:07', 'muzyka'),
(40, 'Debata polityczna na żywo', 'https://www.youtube.com/embed/lhU6gaunsQI?si=rdbAhkOewSHPxHSs', 'Starcie liderów największych partii przed nadchodzącymi wyborami.', 'images/img43.jpg', 'Polityka PL', '300 tys. wyświetleń • 5 godzin temu', '2026-04-04 20:20:07', 'wiadomosci'),
(41, 'Przepis na puszyste naleśniki', 'https://www.youtube.com/embed/cQcLdDmYwCU?si=z7QuDXDphgCMJnIm', 'Idealne na śniadanie: puszyste amerykańskie pancakes.', 'images/img44.jpg', 'Śniadaniowo', '4.4 mln wyświetleń • 2 lata temu', '2026-04-04 20:20:07', 'jedzenie'),
(42, 'Dzika Afryka - Safari Vlog', 'https://www.youtube.com/embed/EFexHHClDNA?si=eKXgzguOqZOro3FH', 'Spotkanie ze słoniami, lwami i żyrafami na afrykańskiej sawannie.', 'images/img45.jpg', 'Safari PL', '920 tys. wyświetleń • 9 miesięcy temu', '2026-04-04 20:20:07', 'podroze'),
(43, 'Recenzja słuchawek z ANC', 'https://www.youtube.com/embed/zakPRMGlRbw?si=aSuzrHuHFDrdcC_-', 'Testujemy słuchawki z aktywną redukcją szumów.', 'images/img46.jpg', 'AudioTest', '150 tys. wyświetleń • 1 miesiąc temu', '2026-04-04 20:20:07', 'technologia'),
(44, 'React.js od podstaw - Crash Course', 'https://www.youtube.com/embed/_gAP0kV5ABk?si=3wrg086NOStKnuZO', 'Szybki kurs biblioteki React dla frontendowców.', 'images/img47.jpg', 'React Ninja', '210 tys. wyświetleń • 1 rok temu', '2026-04-04 20:20:07', 'programowanie'),
(45, 'Trening brzucha w 10 minut', 'https://www.youtube.com/embed/iqHnD1Qyvnw?si=sjthDQUZe8pPV3pI', 'Sześciopak w zasięgu ręki. Szybki zestaw ćwiczeń.', 'images/img48.jpg', 'Sześciopak', '8.9 mln wyświetleń • 4 lata temu', '2026-04-04 20:20:07', 'sport'),
(46, 'Muzyka do snu i relaksu', 'https://www.youtube.com/embed/JWb4vQhgCIU?si=vU-GD2PUrLdo38r1', 'Spokojne dźwięki natury i delikatne pianino.', 'images/img49.jpg', 'Senne Melodie', '20 mln wyświetleń • 3 lata temu', '2026-04-04 20:20:07', 'muzyka'),
(47, 'Raport giełdowy - Spadki na rynku', 'https://www.youtube.com/embed/G1FbZq3ktNE?si=Pd2_zFCPVQFbIS1E', 'Co się dzieje na światowych giełdach i czy to czas na panikę?', 'images/img50.jpg', 'Finanse 24', '15 tys. wyświetleń • 2 godziny temu', '2026-04-04 20:20:07', 'wiadomosci'),
(48, 'Smażony łosoś z warzywami', 'https://www.youtube.com/embed/snDqzk6KOL4?si=jD4zHi7Lf4liAFRO', 'Zdrowy, dietetyczny obiad, który zrobisz błyskawicznie.', 'images/img51.jpg', 'Zdrowa Micha', '540 tys. wyświetleń • 7 miesięcy temu', '2026-04-04 20:20:07', 'jedzenie'),
(49, 'Co zobaczyć w Londynie? - Przewodnik', 'https://www.youtube.com/embed/00s8ASiUafg?si=rts_7wcbe1liKMMb', 'Big Ben, London Eye i inne sekrety stolicy Wielkiej Brytanii.', 'images/img52.jpg', 'UK Vlog', '1.1 mln wyświetleń • 2 lata temu', '2026-04-04 20:20:07', 'podroze'),
(50, 'Test taniego drona z Chin', 'https://www.youtube.com/embed/97daIkR7kB0?si=oX56-R-3DEj1dRTi', 'Czy dron z AliExpress potrafi zrobić dobre zdjęcia?', 'images/img53.jpg', 'Gadżety TV', '600 tys. wyświetleń • 4 lata temu', '2026-04-04 20:20:07', 'technologia'),
(51, 'Jak zostać programistą w 2026?', 'https://www.youtube.com/embed/01SlKRl9fjI?si=-jK6zTR6oKMNhudC', 'Roadmapa i porady, jak wejść do branży IT w tym roku.', 'images/img54.jpg', 'Kariera IT', '110 tys. wyświetleń • 2 tygodnie temu', '2026-04-04 20:20:07', 'programowanie'),
(52, 'Najszybsze biegi na 100m w historii', 'https://www.youtube.com/embed/5GtPDnuTpCc?si=S76Y5_vvt-3wv8jK', 'Rekordy świata i legendarni sprinterzy na bieżni.', 'images/img55.jpg', 'Lekkoatletyka', '8.2 mln wyświetleń • 6 lat temu', '2026-04-04 20:20:07', 'sport'),
(53, 'Elektroniczna muzyka do pracy', 'https://www.youtube.com/embed/Zs1c-_hX7To?si=mJDJrmGghraz-xzl', 'Zwiększ swoją produktywność z odpowiednim tłem muzycznym.', 'images/img56.jpg', 'Focus Beats', '350 tys. wyświetleń • 7 miesięcy temu', '2026-04-04 20:20:07', 'muzyka'),
(54, 'Sytuacja na drogach - Korki i remonty', 'https://www.youtube.com/embed/5s6-btqATvM?si=9wubDmUtOPSFiNSS', 'Gdzie uważać, a gdzie omijać wielkie utrudnienia.', 'images/img57.jpg', 'Drogówka PL', '40 tys. wyświetleń • 3 godziny temu', '2026-04-04 20:20:07', 'wiadomosci'),
(55, 'Tradycyjny polski schabowy', 'hhttps://www.youtube.com/embed/SJ0EAw0rSyI?si=W0l5SGqs1tDhwxX2', 'Sekret idealnej panierki zdradza prawdziwy mistrz kuchni.', 'images/img58.jpg', 'Babcia Gotuje', '1.1 mln wyświetleń • 2 lata temu', '2026-04-04 20:20:07', 'jedzenie'),
(56, 'Roadtrip po USA - Route 66', 'https://www.youtube.com/embed/PTetDhC_Fys?si=DlmJVqY64EoFcHLH', 'Przejazd przez kultową drogę w Stanach Zjednoczonych.', 'images/img59.jpg', 'Ameryka PL', '280 tys. wyświetleń • 9 miesięcy temu', '2026-04-04 20:20:07', 'podroze'),
(57, 'Nowy system operacyjny - Zmiany', 'https://www.youtube.com/embed/uFKB6ZSEHps?si=fi7xfCYbg1nTErfe', 'Sprawdzamy, co oferuje najnowsza aktualizacja systemu.', 'images/img60.jpg', 'OS Review', '150 tys. wyświetleń • 1 miesiąc temu', '2026-04-04 20:20:07', 'technologia'),
(58, 'C++ dla opornych - Część 1', 'https://www.youtube.com/embed/hZnUaSBhV80?si=CkrUA9zInoRIwz7x', 'Trudny język wytłumaczony w najprostszy możliwy sposób.', 'images/img61.jpg', 'Hard Coder', '25 tys. wyświetleń • 3 lata temu', '2026-04-04 20:20:07', 'programowanie'),
(59, 'Siatkówka - Polska vs Brazylia (Finał)', 'https://www.youtube.com/embed/_ZVYnEckY5g?si=8XVcESEGY0KeXO08', 'Złoty medal dla Polaków! Obejrzyj ten niesamowity mecz.', 'images/img62.jpg', 'Sportowe Emocje', '1.9 mln wyświetleń • 4 miesiące temu', '2026-04-04 20:20:07', 'sport'),
(60, 'Klasyczna muzyka - Mozart Masterpieces', 'https://www.youtube.com/embed/zaYeo66y-sI?si=9KTJ17yBMDHOXDqb', 'Zbiór najlepszych utworów Wolfganga Amadeusza Mozarta.', 'images/img63.jpg', 'Classic Sounds', '5 mln wyświetleń • 8 lat temu', '2026-04-04 20:20:07', 'muzyka'),
(61, 'Odkrycie w kosmosie - Nowa planeta', 'https://www.youtube.com/embed/NUHPuHhpL5w?si=Lu4iwIT9JzyM-kW8', 'Naukowcy z NASA ogłaszają przełom. Czy jest tam życie?', 'images/img64.jpg', 'Nauka i Kosmos', '750 tys. wyświetleń • 2 dni temu', '2026-04-04 20:20:07', 'nauka'),
(62, 'Wege burgery - Najlepszy przepis', 'https://www.youtube.com/embed/LJsYPpjUX70?si=P2LEw8mFR_3b03hH', 'Roślinne kotlety, które smakują lepiej niż prawdziwe mięso.', 'images/img65.jpg', 'Wege Życie', '65 tys. wyświetleń • 6 miesięcy temu', '2026-04-04 20:20:07', 'jedzenie'),
(63, 'Zimowa wyprawa na Islandię - Zorza', 'https://www.youtube.com/embed/f1ywlQ0EDXc?si=j3SfEAPB7v2FeHe4', 'Polowanie na zorzę polarną na lodowej wyspie.', 'images/img66.jpg', 'Zimno Mi', '180 tys. wyświetleń • 1 rok temu', '2026-04-04 20:20:07', 'podroze'),
(64, 'Inteligentny dom - Od czego zacząć?', 'https://www.youtube.com/embed/QMdOKUBUbHw?si=B9X4LCGnkd9z_JMc', 'Smart żarówki, gniazdka i asystenci głosowi dla początkujących.', 'images/img67.jpg', 'Smart Home PL', '90 tys. wyświetleń • 2 miesiące temu', '2026-04-04 20:20:07', 'technologia'),
(65, 'Tworzenie REST API w Node.js', 'https://www.youtube.com/embed/-MTSQjw5DrM?si=MwgkYnsDmKKAyiLE', 'Zaawansowany poradnik tworzenia API dla własnych aplikacji.', 'images/img68.jpg', 'Backend Dev', '14 tys. wyświetleń • 5 miesięcy temu', '2026-04-04 20:20:07', 'programowanie'),
(66, 'Ekstremalny zjazd na rowerze górskim', 'https://www.youtube.com/embed/a0XBHsSOEos?si=xfmOtfAE31b2flla', 'Tylko dla ludzi o mocnych nerwach. Zjazd z perspektywy GoPro.', 'images/img69.jpg', 'MTB Polska', '3.4 mln wyświetleń • 2 lata temu', '2026-04-04 20:20:07', 'sport'),
(67, 'Jazz w kawiarni - Tło muzyczne', 'https://www.youtube.com/embed/MYPVQccHhAQ?si=CNVS-IRpnGaagb-T', 'Poczuj się jak w przytulnej kawiarni w deszczowy dzień.', 'images/img70.jpg', 'Cafe Music BGM', '12 mln wyświetleń • 4 lata temu', '2026-04-04 20:20:07', 'muzyka'),
(68, 'Festiwal filmowy w Cannes - Relacja', 'https://www.youtube.com/embed/kaSRmHUVJfk?si=dTEcD6jICND81qmL', 'Kto zdobył Złotą Palmę? Najpiękniejsze kreacje i największe wtopy.', 'images/img71.jpg', 'Kino i Sztuka', '22 tys. wyświetleń • 1 dzień temu', '2026-04-04 20:20:07', 'filmy'),
(69, 'Sekretne życie wilków - Dokument', 'hhttps://www.youtube.com/embed/4KwzFW4pD5Y?si=QSQm539KLH0SD5Mj', 'Niesamowite ujęcia z życia watahy wilków w polskich lasach.', 'images/img72.jpg', 'Dzika Natura', '1.2 mln wyświetleń • 2 tygodnie temu', '2026-04-06 20:42:41', 'zwierzeta'),
(70, 'Upadek Cesarstwa Rzymskiego - Fakty', 'https://www.youtube.com/embed/elYr--aMswI?si=6XTv9cvtyqS1n2HA', 'Dlaczego potężne imperium przestało istnieć? Analiza historyczna.', 'images/img73.jpg', 'Wielka Historia', '450 tys. wyświetleń • 1 rok temu', '2026-04-06 20:42:41', 'historia'),
(71, 'Najlepsze filmy science-fiction 2026', 'https://www.youtube.com/embed/FEgyH2rKQzk?si=PlugX_CBlqNUaZob', 'Zestawienie najbardziej oczekiwanych premier kinowych tego roku.', 'images/img74.jpg', 'KinoMania', '800 tys. wyświetleń • 1 miesiąc temu', '2026-04-06 20:42:41', 'filmy'),
(72, 'Trendy modowe na jesień 2026', 'https://www.youtube.com/embed/rxvZlQJJAFQ?si=d5b21VxbFqTpqkwy', 'Co będziemy nosić w nadchodzącym sezonie? Przegląd kolekcji.', 'images/img75.jpg', 'Stylowy Vlog', '120 tys. wyświetleń • 5 dni temu', '2026-04-06 20:42:41', 'moda'),
(73, 'Zimowy Mix - Chillout Music', 'https://www.youtube.com/embed/VeOSN5kPbSA?si=YgNGwXOGaO1UG9c8', 'Spokojna muzyka idealna na mroźne wieczory przy herbacie.', 'images/img76.jpg', 'Radio Relaks', '3 mln wyświetleń • 4 miesiące temu', '2026-04-06 20:42:41', 'muzyka'),
(74, 'Misja na Marsa - Przełomowe wieści', '\"https://www.youtube.com/embed/IOZuu9NDVV8?si=diDsASUQg8PCT0bW', 'NASA ogłasza sukces nowej misji. Czy znaleziono ślady wody?', 'images/img77.jpg', 'Nauka i Świat', '1.5 mln wyświetleń • 10 godzin temu', '2026-04-06 20:42:41', 'nauka'),
(75, 'Stek idealny - Sekrety szefa kuchni', 'https://www.youtube.com/embed/zapq-B1-9KY?si=bkmc0WMTFdSSaUbC', 'Jak usmażyć idealny stek w domu? Poradnik krok po kroku.', 'images/img78.jpg', 'Gastro Master', '600 tys. wyświetleń • 2 lata temu', '2026-04-06 20:42:41', 'jedzenie'),
(76, 'Tydzień na Bali - Kompletny plan', 'https://www.youtube.com/embed/sG-THa3kdDw?si=fOQj7uS4jLqm3E-f', 'Ile kosztuje wyjazd na Bali i co warto zobaczyć?', 'images/img79.jpg', 'Podróżuj Więcej', '900 tys. wyświetleń • 6 miesięcy temu', '2026-04-06 20:42:41', 'podroze'),
(77, 'Nowy procesor - Test wydajności', 'https://www.youtube.com/embed/MadlLp7dX6o?si=plVIlAm4hE0WjLsH', 'Sprawdzamy najmocniejszy procesor na rynku. Czy warto?', 'images/img80.jpg', 'Tech Recenzja', '250 tys. wyświetleń • 3 dni temu', '2026-04-06 20:42:41', 'technologia'),
(78, 'Python w 10 minut - Dla początkujących', 'https://www.youtube.com/embed/fWjsdhR3z3c?si=blDbAvzSKZTCN5l7', 'Szybki start w świecie programowania. Najważniejsze podstawy.', 'images/img81.jpg', 'Koduj z Nami', '55 tys. wyświetleń • 1 rok temu', '2026-04-06 20:42:41', 'programowanie'),
(79, 'Skrót meczu Polska - Niemcy', 'https://www.youtube.com/embed/mBp5pgMZkiA?si=qKZ3R8qLs5vy0gcR', 'Wszystkie bramki i najciekawsze akcje z wczorajszego spotkania.', 'images/img82.jpg', 'Sportowe Emocje', '4 mln wyświetleń • 2 dni temu', '2026-04-06 20:42:41', 'sport'),
(80, 'Dlaczego pandy są takie leniwe?', 'https://www.youtube.com/embed/mLi1Ex9t128?si=OqVS0biWfSDirfcj', 'Ciekawostki o życiu i diecie tych uroczych niedźwiedzi.', 'images/img83.jpg', 'Zoo World', '2.1 mln wyświetleń • 5 miesięcy temu', '2026-04-06 20:42:41', 'zwierzeta'),
(81, 'Tajemnice piramid w Egipcie', 'https://www.youtube.com/embed/hr-7nXWIddc?si=GhedEG85N8Tmkwqg', 'Nowe odkrycia archeologiczne rzucają światło na budowę piramid.', 'images/img84.jpg', 'Antyczna Wiedza', '3.5 mln wyświetleń • 3 lata temu', '2026-04-06 20:42:41', 'historia'),
(82, 'Marvel vs DC - Co dalej z kinem?', 'https://www.youtube.com/embed/m087fo8Zxsg?si=-76Nqee1oZZMaKCp', 'Analiza planów obu gigantów na najbliższe lata.', 'images/img85.jpg', 'SuperHero TV', '1.1 mln wyświetleń • 2 tygodnie temu', '2026-04-06 20:42:41', 'filmy'),
(83, 'Jak dobrać idealny garnitur?', 'https://www.youtube.com/embed/vRJHPgHOwDU?si=mbdfpeMQT0mxsl42', 'Poradnik dla każdego mężczyzny - na co zwrócić uwagę u krawca.', 'images/img86.jpg', 'Męski Styl', '85 tys. wyświetleń • 7 miesięcy temu', '2026-04-06 20:42:41', 'moda'),
(84, 'Najpiękniejsze utwory fortepianowe', 'https://www.youtube.com/embed/t_Kd_G7p6ZQ?si=-JJ-KMONzUZEQ4J0', 'Relaksujące dźwięki pianina do pracy i odpoczynku.', 'images/img87.jpg', 'Klasyka Dziś', '900 tys. wyświetleń • 4 lata temu', '2026-04-06 20:42:41', 'muzyka'),
(85, 'Inflacja w 2026 - Co nas czeka?', 'https://www.youtube.com/embed/hC3MBQUbFa8?si=fJ3LjeJ6QCcVnE9J', 'Eksperci oceniają sytuację gospodarczą w kraju.', 'images/img88.jpg', 'Biznes Raport', '35 tys. wyświetleń • 1 dzień temu', '2026-04-06 20:42:41', 'wiadomosci'),
(86, 'Sushi w domu - To prostsze niż myślisz!', 'https://www.youtube.com/embed/YfLmbNiBOBM?si=YhX5NQ6-tz2RySNk', 'Wszystko czego potrzebujesz, aby zrobić domowe maki i nigiri.', 'images/img89.jpg', 'Azjatyckie Smaki', '1.4 mln wyświetleń • 1 rok temu', '2026-04-06 20:42:41', 'jedzenie'),
(87, 'Zgubieni w Tokio - Nocny vlog', 'https://www.youtube.com/embed/TXYJM49xbEw?si=Ic2j07h-6qw1_v7P', 'Spacer po najbardziej oświetlonym mieście świata.', 'images/img90.jpg', 'World Walker', '500 tys. wyświetleń • 3 miesiące temu', '2026-04-06 20:42:41', 'podroze'),
(88, 'Czy to koniec konsol do gier?', 'https://www.youtube.com/embed/XF4vjf8X7Hk?si=pnDlHfLm8rNkRBF8', 'Cloud gaming vs tradycyjne konsole. Co wybiorą gracze?', 'images/img91.jpg', 'Gaming News', '750 tys. wyświetleń • 2 tygodnie temu', '2026-04-06 20:42:41', 'technologia'),
(89, 'Jak stworzyć własną grę w Unity?', 'https://www.youtube.com/embed/fiJ43jDYg4I?si=igKRkQLlDDraygbv', 'Tworzymy prostą grę platformową od zera.', 'images/img92.jpg', 'Dev Studio', '110 tys. wyświetleń • 2 lata temu', '2026-04-06 20:42:41', 'programowanie'),
(90, 'Trening siłowy dla biegaczy', 'https://www.youtube.com/embed/GcZJhNi2yOM?si=fHwkXdHT4UGJXu2z', 'Zestaw ćwiczeń, które poprawią Twoją wytrzymałość.', 'images/img93.jpg', 'Biegaj Zdrowo', '280 tys. wyświetleń • 5 miesięcy temu', '2026-04-06 20:42:41', 'sport'),
(91, 'Najmądrzejsze rasy psów - Ranking', 'https://www.youtube.com/embed/F78KOz9fGYY?si=YMN8vUvVtGc1a-h1', 'Sprawdź, czy Twój pupil znalazł się na liście!', 'images/img94.jpg', 'Pieskie Życie', '3.8 mln wyświetleń • 1 rok temu', '2026-04-06 20:42:41', 'zwierzeta'),
(92, 'Bitwa pod Grunwaldem - Rekonstrukcja', 'https://www.youtube.com/embed/zvd79swrW8o?si=f3b-hH-youl4kuiC', 'Jak naprawdę wyglądało największe starcie średniowiecznej Europy?', 'images/img95.jpg', 'Historia PL', '1.2 mln wyświetleń • 9 miesięcy temu', '2026-04-06 20:42:41', 'historia'),
(93, 'Wielki powrót kina grozy', 'https://www.youtube.com/embed/I0JNQJSNBmc?si=mD8HjGs4EHaWRexv', 'Dlaczego znów boimy się w kinach? Przegląd nowości.', 'images/img96.avif', 'Horror Show', '420 tys. wyświetleń • 3 tygodnie temu', '2026-04-06 20:42:41', 'filmy'),
(94, 'Second-hand vs Sieciówki', 'https://www.youtube.com/embed/ZsNO7HhAR4U?si=xHejl2Kd_muj6ZKP', 'Gdzie kupować tanio i stylowo, dbając o planetę?', 'images/img97.jpg', 'Eko Moda', '65 tys. wyświetleń • 2 miesiące temu', '2026-04-06 20:42:41', 'moda'),
(95, 'Polski Hip-Hop - Nowa fala', 'https://www.youtube.com/embed/23vNtP395f0?si=g4EOE_1LhF8kGsnD', 'Kto dominuje na listach przebojów w 2026 roku?', 'images/img98.jpg', 'Muzyka Ulicy', '2.5 mln wyświetleń • 6 miesięcy temu', '2026-04-06 20:42:41', 'muzyka'),
(96, 'Odkrycie nowej komety - Co wiemy?', 'https://www.youtube.com/embed/23vNtP395f0?si=g4EOE_1LhF8kGsnD', 'Czy będziemy mogli zobaczyć ją gołym okiem?', 'images/img99.jpg', 'Kosmiczne Info', '300 tys. wyświetleń • 4 dni temu', '2026-04-06 20:42:41', 'nauka'),
(97, 'Zupa dyniowa z imbirem - Rozgrzewająca', 'https://www.youtube.com/embed/Gl3vEYT6Pew?si=cPSyAmHq8r-i4uJN', 'Idealny przepis na jesienny obiad.', 'images/img100.jpg', 'Kuchnia Wege', '190 tys. wyświetleń • 1 rok temu', '2026-04-06 20:42:41', 'jedzenie'),
(98, 'Najniebezpieczniejsze drogi świata', 'https://www.youtube.com/embed/qTWOD38CIZE?si=f2AY5tx_0vTzcPNc', 'Podróż przez góry, gdzie jeden błąd kosztuje życie.', 'images/img101.jpg', 'Adrenalina TV', '6.7 mln wyświetleń • 4 lata temu', '2026-04-06 20:42:41', 'podroze'),
(99, 'Test składanego smartfona - 2 lata później', 'https://www.youtube.com/embed/b3RD1gE-h9Q?si=wxAXRqY30KkhWdYL', 'Czy ekrany wciąż działają? Moja szczera recenzja.', 'images/img102.jpg', 'Tech Opinia', '480 tys. wyświetleń • 1 miesiąc temu', '2026-04-06 20:42:41', 'technologia'),
(100, 'Cyberbezpieczeństwo w 2026 roku', 'https://www.youtube.com/embed/G8kgV7vLbhk?si=y7UCJFhnDW7L72i7', 'Jak chronić swoje dane przed nowymi rodzajami ataków?', 'images/img103.jpg', 'Bezpieczne IT', '25 tys. wyświetleń • 1 tydzień temu', '2026-04-06 20:42:41', 'technologia'),
(101, 'Historia Igrzysk Olimpijskich', 'https://www.youtube.com/embed/aNJDcWes_o0?si=j6NzJZnjF-Comnjc', 'Od starożytności do współczesnych stadionów.', 'images/img104.jpg', 'Sport i Historia', '1.3 mln wyświetleń • 2 lata temu', '2026-04-06 20:42:41', 'historia');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
