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