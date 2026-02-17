SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Structure de la table `agency`
--
CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Structure de la table `trip`
--
CREATE TABLE `trip` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `departure_agency_id` int(11) NOT NULL,
  `arrival_agency_id` int(11) NOT NULL,
  `date_trip` date NOT NULL,
  `time_trip` time NOT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `available_seats` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Structure de la table `user`
--
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`roles`)),
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index et Clés Primaires
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `departure_agency_id` (`departure_agency_id`),
  ADD KEY `arrival_agency_id` (`arrival_agency_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes (Clés étrangères)
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trip_ibfk_2` FOREIGN KEY (`departure_agency_id`) REFERENCES `agency` (`id`),
  ADD CONSTRAINT `trip_ibfk_3` FOREIGN KEY (`arrival_agency_id`) REFERENCES `agency` (`id`);
COMMIT;