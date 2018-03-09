INSERT INTO user(user_name,user_email,user_pass) 
values('bob','bob@gmail.com','9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');
INSERT INTO user(user_name,user_email,user_pass) 
values('bob22','bob2@gmail.com','9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');
INSERT INTO user(user_name,user_email,user_pass) 
values('bob33','bob3@gmail.com','9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');


INSERT INTO comment(comment_content,comment_creator) 
values('this is my comment made by bob','1');
INSERT INTO comment(comment_content,comment_creator) 
values('this is my comment made by bob3','3');
INSERT INTO comment(comment_content,comment_creator) 
values('this is my sub comment made by bob2','2');

INSERT INTO post(post_title,post_content,post_creator) 
values('post title or question or whatever','this is my post made by bob','1');
INSERT INTO post(post_title,post_content,post_creator) 
values('post title or question or whatever2','this is my post made by bob2','2');
INSERT INTO post(post_title,post_content,post_creator) 
values('post title or question or whatever3','this is my post made by bob3','3');


INSERT INTO post_comment_ass(post_id,comment_id)
VALUES('1','1');
INSERT INTO post_comment_ass(post_id,comment_id)
VALUES('2','2');


INSERT INTO comment_comment_ass(parent_id,child_id)
VALUES('1','3');

INSERT INTO `comments` (`com_id`, `comments`, `msg_id_fk`) VALUES
(1, 'hahahaha nakakatawa', 1),
(2, 'oo nga eh', 1),
(3, '<3', 1);

INSERT INTO `messages` (`msg_id`, `message`) VALUES
(1, 'Pare1: pare parang malalim iniisip mo?\r\nPare2: nanaginip ako kagabi. kasama ko 50 contestants ng ms.universe\r\nPare1: suwerte mo ano problema mo?\r\nPare2: pare ako ang nanalo!!! '),
(2, 'Teacher: ok class our lesson 4 today is about planet. earth\r\nis the 3rd planed from the sun. now what is next to mercury?\r\nPedro: murag rose pharmacy mn tingali mam! d ko lang sure ');
