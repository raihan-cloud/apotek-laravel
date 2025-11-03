CREATE TABLE `obats` (
  `id_obat` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_obat` VARCHAR(50) NOT NULL,
  `nama_obat` VARCHAR(255) NOT NULL,
  `stock_obat` INT(11) NOT NULL,
  `tanggal_kadaluarsa` DATE NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `staff` (
  `id_staff` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(255) NOT NULL,
  `alamat` VARCHAR(255) NOT NULL,
  `tempat_lahir` VARCHAR(255) DEFAULT NULL,
  `tanggal_lahir` DATE DEFAULT NULL,
  `no_hp` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id_staff`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `pelanggans` (
  `id_pelanggan` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(255) NOT NULL,
  `alamat` VARCHAR(255) NOT NULL,
  `no_hp` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
