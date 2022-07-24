-- --------------------------------------------------------
-- Hostitel:                     127.0.0.1
-- Verze serveru:                10.4.24-MariaDB - mariadb.org binary distribution
-- OS serveru:                   Win64
-- HeidiSQL Verze:               12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Exportování dat pro tabulku rail_news.category: ~3 rows (přibližně)
INSERT INTO `category` (`category_id`, `name`) VALUES
	(1, 'Acquisitions'),
	(3, 'Cooperations'),
	(2, 'Product Releases');

-- Exportování dat pro tabulku rail_news.news_site: ~3 rows (přibližně)
INSERT INTO `news_site` (`news_site_id`, `name`, `domain`) VALUES
	(1, 'RailNews', 'https://www.railnews.co.uk/'),
	(2, 'TransportNews', 'https://www.transportnews.co.uk/'),
	(3, 'NewsDaily', 'https://www.bbc.com/');

-- Exportování dat pro tabulku rail_news.post: ~3 rows (přibližně)
INSERT INTO `post` (`post_id`, `category_id`, `region_id`, `content`, `created_ts`, `updated_ts`) VALUES
	(2, 1, NULL, 'Cras sodales libero ac elit egestas, sed viverra diam aliquet. Aenean quis orci imperdiet, gravida lacus id, vehicula urna. Fusce tincidunt tincidunt sodales. Pellentesque risus erat, malesuada vitae vestibulum tincidunt, volutpat id risus.', '2022-07-24 12:42:07', '2022-07-24 14:58:27'),
	(3, 3, 2, 'In eleifend massa eget vulputate placerat. Donec hendrerit neque metus, et accumsan justo convallis at. Integer lobortis varius venenatis. Curabitur facilisis non lacus non finibus. Fusce eleifend mauris quis felis commodo euismod.', '2022-07-24 12:52:19', '2022-07-24 14:58:30'),
	(4, 2, 1, 'Praesent accumsan RailABC ultricies euismod. Sed et dui magna. Maecenas RailDEF dictum dolor non mauris ultricies, pellentesque fermentum ex efficitur. Proin et RailABC nisl sagittis, vulputate magna quis, ultrices odio. ', '2022-07-23 12:52:29', '2022-07-24 14:58:33');

-- Exportování dat pro tabulku rail_news.post_link: ~3 rows (přibližně)
INSERT INTO `post_link` (`id`, `post_id`, `news_site_id`, `path`) VALUES
	(4, 2, 1, 'dummy/url/example'),
	(5, 2, 2, 'dummy/url/example'),
	(6, 4, 3, 'dummy/url/example'),
	(7, 2, 3, 'dummy/url/example');

-- Exportování dat pro tabulku rail_news.post_profile: ~0 rows (přibližně)
INSERT INTO `post_profile` (`id`, `post_id`, `profile_id`) VALUES
	(1, 4, 1),
	(3, 4, 2);

-- Exportování dat pro tabulku rail_news.post_tag: ~0 rows (přibližně)
INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
	(1, 4, 1);

-- Exportování dat pro tabulku rail_news.region: ~2 rows (přibližně)
INSERT INTO `region` (`region_id`, `name`) VALUES
	(2, 'Russia'),
	(1, 'United States');

-- Exportování dat pro tabulku rail_news.rm_profile: ~0 rows (přibližně)
INSERT INTO `rm_profile` (`rm_profile_id`, `name`, `url`) VALUES
	(1, 'RailABC', 'https://railmarket.com/eu/profile/railvis'),
	(2, 'RailDEF', 'https://railmarket.com/eu/profile/raildef');

-- Exportování dat pro tabulku rail_news.tag: ~1 rows (přibližně)
INSERT INTO `tag` (`tag_id`, `content`) VALUES
	(1, 'wagon');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
