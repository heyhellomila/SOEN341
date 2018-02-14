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