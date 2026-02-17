SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Données de la table `agency`
--
INSERT INTO `agency` (`id`, `name`) VALUES
(1, 'Paris'),
(2, 'Lyon'),
(3, 'Marseille'),
(4, 'Toulouse'),
(5, 'Nice'),
(6, 'Nantes'),
(7, 'Strasbourg'),
(8, 'Montpellier'),
(9, 'Bordeaux'),
(10, 'Lille'),
(11, 'Rennes'),
(12, 'Reims');

--
-- Données de la table `user`
--
INSERT INTO `user` (`id`, `lastname`, `firstname`, `phone`, `email`, `password`, `roles`, `created_at`) VALUES
(1, 'Martin', 'Alexandre', '0612345678', 'alexandre.martin@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-02 11:58:01'),
(2, 'Dubois', 'Sophie', '0698765432', 'sophie.dubois@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-02 11:58:01'),
(3, 'Admin', 'System', '0000000000', 'admin@klaxon.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '2026-02-02 11:58:01'),
(4, 'Bernard', 'Julien', '0622446688', 'julien.bernard@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(5, 'Moreau', 'Camille', '0611223344', 'camille.moreau@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(6, 'Lefèvre', 'Lucie', '0777889900', 'lucie.lefevre@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(7, 'Leroy', 'Thomas', '0655443322', 'thomas.leroy@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(8, 'Roux', 'Chloé', '0633221199', 'chloe.roux@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(9, 'Petit', 'Maxime', '0766778899', 'maxime.petit@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(10, 'Garnier', 'Laura', '0688776655', 'laura.garnier@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(11, 'Dupuis', 'Antoine', '0744556677', 'antoine.dupuis@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(12, 'Lefebvre', 'Emma', '0699887766', 'emma.lefebvre@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(13, 'Fontaine', 'Louis', '0655667788', 'louis.fontaine@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(14, 'Chevalier', 'Clara', '0788990011', 'clara.chevalier@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(15, 'Robin', 'Nicolas', '0644332211', 'nicolas.robin@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(16, 'Gauthier', 'Marine', '0677889922', 'marine.gauthier@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(17, 'Fournier', 'Pierre', '0722334455', 'pierre.fournier@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(18, 'Girard', 'Sarah', '0688665544', 'sarah.girard@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(19, 'Lambert', 'Hugo', '0611223366', 'hugo.lambert@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(20, 'Masson', 'Julie', '0733445566', 'julie.masson@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03'),
(21, 'Henry', 'Arthur', '0666554433', 'arthur.henry@email.fr', '$2y$10$1lOozC1ABHqyXqB.q.H32.qgpRJ331DxivcAvBe4BXPpQV3fEKS9K', '[\"ROLE_USER\"]', '2026-02-10 11:08:03');

--
-- Données de la table `trip`
--
INSERT INTO `trip` (`id`, `driver_id`, `departure_agency_id`, `arrival_agency_id`, `date_trip`, `time_trip`, `price`, `available_seats`, `created_at`) VALUES
(3, 2, 2, 10, '2026-02-25', '15:00:00', 15.00, 1, '2026-02-09 10:49:39'),
(4, 2, 8, 9, '2026-02-04', '10:15:00', 1.00, 2, '2026-02-10 10:14:58');
COMMIT;