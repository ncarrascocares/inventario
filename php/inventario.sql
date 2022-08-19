SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `articulo` (
  `articulo_id` int(20) NOT NULL,
  `articulo_codigo` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
  `articulo_nombre` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
  `articulo_precio` int(100) NOT NULL,
  `articulo_stock` int(25) NOT NULL,
  `articulo_foto` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `usuario_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `categoria` (
  `categoria_id` int(10) NOT NULL,
  `categoria_nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoria_ubicacion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `usuario` (
  `usuario_id` int(10) NOT NULL,
  `usuario_nombre` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario_apellido` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario_usuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario_clave` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario_email` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_usuario`, `usuario_clave`, `usuario_email`) VALUES
(1, 'Nicolas', 'Carrasco', 'ncarrasco', '$2y$10$tljn/RLO0DJih6s78ySNDuh2znAtdCetkJfKvFOuYhjrcE3dxr5Gq', 'ncarrasco@inatrans.cl'),
(2, 'Nanci', 'Hormazabal', 'nhormazabal', 'nhormazabal', 'nhormazabal@inatrans.cl'),
(3, 'pepito', 'epito', 'pepito', 'pepito', 'pepito@inatrans.cl');


ALTER TABLE `articulo`
  ADD PRIMARY KEY (`articulo_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `usuario_id` (`usuario_id`);

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);


ALTER TABLE `articulo`
  MODIFY `articulo_id` int(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `categoria`
  MODIFY `categoria_id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
