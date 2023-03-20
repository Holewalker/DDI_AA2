CREATE DATABASE IF NOT EXISTS ForoAA;
USE ForoAA;

DROP TABLE IF EXISTS users;
CREATE TABLE users
(
    userId   INT          NOT NULL AUTO_INCREMENT,
    username varchar(32)  NOT NULL unique,
    email    varchar(32)  NOT NULL unique,
    pass     varchar(255) not null,
    PRIMARY KEY (userId)
);

DROP TABLE IF EXISTS topics;
CREATE TABLE topics
(
    topicId INT         NOT NULL AUTO_INCREMENT,
    name    varchar(32) NOT NULL,
    PRIMARY KEY (topicId)
);

DROP TABLE IF EXISTS posts;
CREATE TABLE posts
(
    postId         INT          NOT NULL AUTO_INCREMENT,
    title          varchar(32),
    message        varchar(300) not null,
    topicId        INT          NOT NULL,
    previousPostId int default null,
    userId         int          NOT NULL,
    PRIMARY KEY (postId),
    CONSTRAINT FK_topicId
        FOREIGN KEY (topicId)
            REFERENCES topics (topicId)
            ON DELETE RESTRICT
            ON UPDATE RESTRICT,
    CONSTRAINT FK_userId
        FOREIGN KEY (userId)
            REFERENCES users (userId)
            ON DELETE cascade
            ON UPDATE cascade,
    CONSTRAINT FK_prevpostId
        FOREIGN KEY (previousPostId)
            REFERENCES posts (postId)
            ON DELETE set null
            ON UPDATE set null
);


insert into users
values (1, 'daniel75', 'dani75esp@gmail.com', sha('Daniel75'));
insert into users
values (2, 'test', 'test@gmail.com', sha('testpw'));
insert into users
values (3, 'mars', 'curiosity@gmail.com', sha('rover'));


insert into topics
values (1, 'perros');
insert into topics
values (2, 'gatos');
insert into topics
values (3, 'peces');
insert into topics
values (4, 'aves');


insert into posts (postId, title, message, topicId, previousPostId, userId)
values (1, 'que le pasa a mi pez?', 'sali de casa con la sonrisa puesta, hoy me he levantado contento de verdad', 3,
        null, 1);
insert into posts (postId, title, message, topicId, previousPostId, userId)
values (2, null, 'El sol de la mañana brilla en mi cara', 3, 1, 3);
insert into posts (postId, title, message, topicId, previousPostId, userId)
values (3, null, 'una brisa fresca me ayuda a despertar', 3,
        2, 1);
insert into posts (postId, title, message, topicId, previousPostId, userId)
values (4, 'Prueba', 'Test by test', 1, null, 2);
insert into posts (postId, title, message, topicId, previousPostId, userId)
values (5, 'Fotos de mi gato', 'https://www.reddit.com/r/catpictures/', 2, null, 3);
insert into posts (postId, title, message, topicId, previousPostId, userId)
values (6, null, 'WoW!', 2, 5, 1);