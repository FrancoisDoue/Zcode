CREATE DATABASE IF NOT EXISTS `forum`;
USE `FORUM`;

CREATE TABLE IF NOT EXISTS `user`(
    `id_user`       INT(5) NOT NULL AUTO_INCREMENT,
    `username`      VARCHAR(50) NOT NULL,
    `nomuser`       VARCHAR(50) NOT NULL,
    `prenomuser`    VARCHAR(50) DEFAULT NULL,
    `mailuser`      VARCHAR(50) NOT NULL,
    `pswuser`       VARCHAR(60) NOT NULL,
    `teluser`       VARCHAR(50) DEFAULT NULL,
    `inscruser`     DATE NOT NULL,
    PRIMARY KEY (`id_user`)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `titre`(
    `id_titre`      INT(4) NOT NULL AUTO_INCREMENT,
    `titre_forum`   VARCHAR(255) NOT NULL,
    `id_user`       INT(5) NOT NULL,
    PRIMARY KEY(`id_titre`),
    FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `categorie`(
    `id_cat`        INT(3) NOT NULL AUTO_INCREMENT,
    `lib_cat`       VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id_cat`)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `possede_cat`(
    `id_titre`      INT(4) NOT NULL,
    `id_cat`        INT(3) NOT NULL,
    PRIMARY KEY(`id_titre`,`id_cat`),
    FOREIGN KEY (`id_titre`) REFERENCES `titre`(`id_titre`),
    FOREIGN KEY (`id_cat`) REFERENCES `categorie`(`id_cat`)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `posts`(
    `id_post`       INT(11) NOT NULL AUTO_INCREMENT,
    `id_user`       INT(5) NOT NULL,
    `id_titre`      INT(4) NOT NULL,
    `msgpost_1`     VARCHAR(255) NOT NULL,
    `msgpost_2`     VARCHAR(255) DEFAULT NULL,
    `msgpost_3`     VARCHAR(255) DEFAULT NULL,
    `msgpost_4`     VARCHAR(255) DEFAULT NULL,
    `datmsg`        DATE NOT NULL,
    PRIMARY KEY (`id_post`),
    FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`),
    FOREIGN KEY (`id_titre`) REFERENCES `titre`(`id_titre`)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `images`(
    `id_img` INT(7) NOT NULL AUTO_INCREMENT,
    `nam_img` VARCHAR(100) NOT NULL,
    `name_img_mini` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id_img`)
)ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `role`(
    `id_role`       INT(2) NOT NULL AUTO_INCREMENT,
    `cod_role`      VARCHAR(3) NOT NULL,
    `lib_role`      VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id_role`)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `banlist`(
    `id_ban`        INT(5) NOT NULL AUTO_INCREMENT,
    `debut_ban`     DATE NOT NULL,
    `fin_ban`       DATE DEFAULT NULL,
    PRIMARY KEY (`id_ban`)
)ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `affiche_img`(
    `id_post` INT(11) NOT NULL,
    `id_img` INT(7) NOT NULL,
    PRIMARY KEY (`id_post`,`id_img`),
    FOREIGN KEY (`id_post`) REFERENCES `posts`(`id_post`),
    FOREIGN KEY (`id_img`) REFERENCES `images`(`id_img`)
)ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `possede`(
    `id_user`       INT(5) NOT NULL,
    `id_role`       INT(2) NOT NULL,
    PRIMARY KEY (`id_role`,`id_user`),
    FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`),
    FOREIGN KEY (`id_role`) REFERENCES `role`(`id_role`)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS `is_ban`(
    `id_user`       INT(5) NOT NULL,
    `id_ban`        INT(5) NOT NULL,
    PRIMARY KEY (`id_user`,`id_ban`),
    FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`),
    FOREIGN KEY (`id_ban`) REFERENCES `banlist`(`id_ban`)
) ENGINE = InnoDb;
