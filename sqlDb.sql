DROP DATABASE if exists ForoAA;
CREATE DATABASE IF NOT EXISTS ForoAA;
USE ForoAA;
drop table if exists messages;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS topics;
DROP TABLE IF EXISTS users;
CREATE TABLE users
(
    userId   INT          NOT NULL AUTO_INCREMENT,
    username varchar(32)  NOT NULL unique,
    email    varchar(32)  NOT NULL unique,
    pass     varchar(255) not null,
    PRIMARY KEY (userId)
);

CREATE TABLE topics
(
    topicId INT         NOT NULL AUTO_INCREMENT,
    name    varchar(32) NOT NULL,
    PRIMARY KEY (topicId)
);

CREATE TABLE posts
(
    postId  INT          NOT NULL AUTO_INCREMENT,
    title   varchar(32)  not null,
    message varchar(300) not null,
    topicId INT          NOT NULL,
    userId  int          NOT NULL,
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
            ON UPDATE cascade
);

create table messages
(
    messageId         int          not null auto_increment,
    message           varchar(300) not null,
    userId            int          not null,
    postId            int          not null,
    previousMessageId int,
    primary key (messageId),
    constraint FK_postIdMess
        foreign key (postId)
            references posts (postId)
            ON DELETE cascade
            ON UPDATE cascade,
    CONSTRAINT FK_userIdMess
        FOREIGN KEY (userId)
            REFERENCES users (userId)
            ON DELETE cascade
            ON UPDATE cascade,
    constraint FK_previousMessageId
        foreign key (previousMessageId)
            references messages (messageId)
            on delete cascade
            on update cascade
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


insert into posts (postId, title, message, topicId, userId)
values (1, 'que le pasa a mi pez?', 'sali de casa con la sonrisa puesta, hoy me he levantado contento de verdad', 3,
        1);
insert into posts (postId, title, message, topicId, userId)
values (2, 'Prueba', 'Test by test', 1, 2);
insert into posts (postId, title, message, topicId, userId)
values (3, 'Fotos de mi gato', 'https://www.reddit.com/r/catpictures/', 2, 3);


insert into messages (messageId, message, userId, postId, previousMessageId)
VALUES (1, 'El Sol de la mañana brilla en mi cara', 3, 1, null);

insert into messages (messageId, message, userId, postId, previousMessageId)
VALUES (2, 'una brisa fresca me ayuda a despertar', 1, 1, 1);

insert into messages (messageId, message, userId, postId, previousMessageId)
VALUES (3, 'Wow!', 1, 3, null)