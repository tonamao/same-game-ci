DROP TABLE IF EXISTS `tb_tasks`;

DROP TABLE IF EXISTS `tb_score_history`;
CREATE TABLE `tb_tasks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  `end_date` datetime,
  `completed` tinyint(1),
  `weight` tinyint(1),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tb_tasks` (title, description, end_date, completed, weight) VALUES
  ('webアプリ勉強会はじめました', 'タスクアプリを作る', '2020-11-25 12:00:00', 0, 1),
  ('画面を表示させる', 'HTMLを使う', '2020-11-25 12:00:00', 0, 2),
  ('綺麗な画面を作る', 'CSSを使う', '2020-11-25 12:00:00', 0, 3);
