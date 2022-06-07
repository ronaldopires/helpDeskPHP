-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jun-2022 às 06:38
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET @@global.time_zone = '+3:00';

CREATE DATABASE dbhelpdesk;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbhelpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `list_requests`
--

CREATE TABLE `list_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_of_requisition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` tinyint(4) NOT NULL,
  `branch_line` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requester_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `list_requests`
--

INSERT INTO `list_requests` (`id`, `created_by`, `status`, `origin_of_requisition`, `department`, `floor`, `branch_line`, `location`, `requester`, `requester_email`, `problem`, `priority`, `observation`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Ronaldo Pires de Carvalho', 'Encerrado', 'Help Desk', 'SANEAMENTO', 6, 2255, 'Frente', 'Sônia Maria', NULL, 'Office', 'Média', 'Instalar office na máquina', NULL, '2022-03-03 21:46:30', '2022-06-04 02:54:36', 1),
(2, 'Ronaldo Pires de Carvalho', 'Novo', 'Help Desk', 'DRI', 2, 2222, 'Frente', 'Guacira', NULL, 'Máquina lenta', 'Média', 'Solicitante informa que a máquina está com lentidão', NULL, '2022-01-01 21:49:22', '2022-10-03 21:49:22', 1),
(3, 'Ronaldo Pires de Carvalho', 'Em Atendimento', 'Help Desk', 'GAS', 4, 2499, 'Frente', 'Maria Eugênia', NULL, 'Sisdoc', 'Média', 'Não consegue logar no sisdoc', 'bad3cbef0d4e3944a2e62e87d778ddfe.png', '2022-05-03 23:29:01', '2022-06-04 04:25:07', 1),
(4, 'Ronaldo Pires de Carvalho', 'Novo', 'Telefone', 'ELETRICA', 5, NULL, 'Frente', 'Mariana', NULL, 'instalar teams', 'Média', 'Solicitante deseja que instale o teams na máquina da toshie', NULL, '2022-06-05 19:58:38', '2022-05-05 19:58:38', 1),
(5, 'Ronaldo Pires de Carvalho', 'Em Atendimento', 'E-mail', 'TI', 3, NULL, 'Fundos', 'Patrícia', NULL, 'Não consegue assinar no sisdoc', 'Média', 'Erro ao assinar no sisdoc', NULL, '2022-09-02 20:04:46', '2022-06-05 20:04:46', 1),
(6, 'Ronaldo Pires de Carvalho', 'Em Atendimento', 'E-mail', 'GAS', 4, NULL, 'Fundos', 'Rosangela', NULL, 'Instalar project 2010', 'Média', 'Instalar project 2010', NULL, '2022-06-06 20:07:25', '2022-02-05 20:07:25', 1),
(7, 'Ronaldo Pires de Carvalho', 'Novo', 'Telefone', 'DRI', 2, NULL, 'Frente', 'Guacira', NULL, 'Máquina Lenta', 'Média', 'Deseja que a máquina fique mais rápida', NULL, '2022-12-05 20:26:45', '2022-06-05 20:26:45', 1),
(8, 'Ronaldo Pires de Carvalho', 'Em Atendimento', 'Help Desk', 'ELETRICA', 6, NULL, 'Sala de Reunião', 'Mariana', NULL, 'Sem acesso ao wifi', 'Média', 'Sem acesso ao wifi', NULL, '2022-06-09 20:46:17', '2022-08-05 20:47:08', 1),
(9, 'Ronaldo Pires de Carvalho', 'Novo', 'Help Desk', 'DRI', 2, NULL, 'Fundos', 'Silvia', NULL, 'Teste', 'Média', 'teste', NULL, '2022-06-05 20:10:00', '2022-06-05 20:10:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_02_173732_create_list_requests_table', 1),
(6, '2022_06_03_160242_create_sessions_table', 1),
(7, '2022_06_03_180738_add_user_id_to_list_requests_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PPMrzUGQuYc4axJ62k8deMaYUJbIeSFoJ3meEHqG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoic3oxczF6VEl6Y2FMWVRoeExUQ0F5VGRUWEthSHRwdVFhT2xNN0x6byI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ub3ZvLWNoYW1hZG8iO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRiYTZWWE1TOUg5UTBFcXVQZ0R0ZzB1RHRKcWo4d1FqZXJ1dXNrbWVmdzFEeXJ6OWdYMHNqdSI7fQ==', 1654465505);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Ronaldo Pires de Carvalho', 'ronaldo.carvalho@hotmail.com', NULL, '$2y$10$ba6VXMS9H9Q0EquPgDtg0uDtJqj8wQjeruuskmefw1Dyrz9gX0sju', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-03 19:30:59', '2022-06-05 21:36:43');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `list_requests`
--
ALTER TABLE `list_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_requests_user_id_foreign` (`user_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `list_requests`
--
ALTER TABLE `list_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `list_requests`
--
ALTER TABLE `list_requests`
  ADD CONSTRAINT `list_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
