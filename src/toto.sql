SELECT
  `title`,
  `img`,
  `content`,
  `spawnDate`,
  `id_user`
  FROM
  `articles`;


INSERT INTO `articles`
SET
`title` = 'toto',
`img` = 'titi',
`content` = 'j aime les pates',
`spawnDate` = '22/05/18',
id_user = 1;

INSERT INTO `user`
SET
`username` = 'admin',
`password` = 'admin'
;

SELECT
  `username`,
  `password`
  FROM
    `user`
  WHERE
    username = 'admin'
  AND
    password = 'admin'
;

INSERT INTO `articles`
SET
`title` = :title,
`img` = :img,
`content` = :content,
`spawnDate` = :today,
`id_user` = :id_user;

SELECT
  `title`
FROM
  articles
WHERE
  `id_article` = 4


INSERT INTO `partner`
    SET
      `name` = 'toto',
      `logo` = 'titi',
      `categorie` = 'spa';


SELECT
      `id_partner`,
      `name`,
      `logo`,
      `categorie`
    FROM
      `partner`
    WHERE
      `id_partner` = 1;


INSERT INTO `carrousel`
    SET
    `description` = 'description',
    `title` = 'title',
    `city` = 'citie',
    `etablissement` = 'dname',
    `img` = 'img',
    `url_site` = 'url',
    `adress` = 'adress',
    `phone_number` = 'phone',
    `category` = 'category';

SELECT *
FROM articles
ORDER BY date DESC


SELECT * FROM articles ORDER BY id_article DESC LIMIT 0, 1;

SELECT
  `title`,
  `spawnDate`,
  `description`
FROM
articles
WHERE
`id_article` = 26;

