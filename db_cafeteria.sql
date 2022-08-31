DROP DATABASE IF EXISTS cafeteria;
CREATE DATABASE IF NOT EXISTS cafeteria;
USE cafeteria;
CREATE TABLE producto(
        idproducto BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        nombreproducto VARCHAR(255) NOT NULL,
        referencia VARCHAR(255) NOT NULL,
        precio BIGINT NOT NULL,
        peso BIGINT NOT NULL,
        categoria VARCHAR(255) NOT NULL,
        stock BIGINT NOT NULL,
        fechacreacion date DEFAULT NULL,
        PRIMARY KEY(idproducto)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;


CREATE TABLE venta(
        idventa BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        fecha date DEFAULT NULL,
        total DECIMAL(7,2),
        PRIMARY KEY(idventa)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE producto_venta(
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        idproducto BIGINT UNSIGNED NOT NULL,
        cantidad BIGINT UNSIGNED NOT NULL,
        idventa BIGINT UNSIGNED NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(idproducto) REFERENCES producto(idproducto) ON DELETE CASCADE,
        FOREIGN KEY(idventa) REFERENCES venta(idventa) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;



INSERT INTO `producto` (`idproducto`, `nombreproducto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fechacreacion`) VALUES
(1, 'Manzana', 'fru1', 5000, 2, 'FRUTAS', 2, '2022-08-30'),
(2, 'Banano', 'fru2', 1500, 3, 'FRUTAS', 0, '2022-08-30'),
(3, 'Maracuya', 'fru3', 2500, 1, 'FRUTAS', 2, '2022-08-30'),
(4, 'Pera', 'fru4', 6000, 2, 'FRUTAS', 5, '2022-08-30'),
(5, 'Frijol', 'ver1', 3000, 3, 'VERDURAS', 8, '2022-08-30'),
(6, 'Arveja', 'ver2', 4500, 1, 'VERDURAS', 11, '2022-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `producto_venta`
--

CREATE TABLE `producto_venta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idproducto` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `idventa` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto_venta`
--

INSERT INTO `producto_venta` (`id`, `idproducto`, `cantidad`, `idventa`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 3, 3),
(4, 4, 5, 3),
(5, 1, 1, 4),
(6, 2, 4, 4),
(7, 2, 1, 5),
(8, 1, 1, 6),
(9, 3, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `idventa` bigint(20) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`idventa`, `fecha`, `total`) VALUES
(1, '2022-08-30', '5000.00'),
(2, '2022-08-30', '1500.00'),
(3, '2022-08-30', '37500.00'),
(4, '2022-08-30', '11000.00'),
(5, '2022-08-30', '1500.00'),
(6, '2022-08-30', '17500.00'),
(7, '2022-08-30', '0.00');

--
-- Indexes for dumped tables
--








