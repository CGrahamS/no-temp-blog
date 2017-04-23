DROP SCHEMA IF EXISTS php_blog;
CREATE SCHEMA IF NOT EXISTS php_blog;
USE php_blog;

--tables
--Table: blog_user
CREATE TABLE blog_user (
	id			INT 			NOT NULL AUTO_INCREMENT,
	email		VARCHAR(200)	NOT NULL,
	password	VARCHAR(200)	NOT NULL,
	first_name	VARCHAR(100)	NOT NULL,
	last_name	VARCHAR(100)	NOT NULL,
	username	VARCHAR(100)	NOT NULL,
	created 	DATETIME		NOT NULL DEFAULT NOW(),
	updated		DATETIME		NOT NULL DEFAULT NOW(),
	deleted 	DATETIME		NULL,
	UNIQUE INDEX email (email),
	UNIQUE INDEX username (username),
	CONSTRAINT blog_user_pk PRIMARY KEY (id)
);

--Table: blog_post
CREATE TABLE blog_post (
	id 				INT 			NOT NULL AUTO_INCREMENT,
	title 			VARCHAR(100)	NOT NULL,
	created			DATETIME		NOT NULL DEFAULT NOW(),
	updated			DATETIME		NOT NULL DEFAULT NOW(),
	deleted			DATETIME		NULL,
	blog_user_id 	INT 			NOT NULL,
	CONSTRAINT 	blog_post_pk PRIMARY KEY (id)
);

--Table: blog_comment
CREATE TABLE blog_comment (
	id 				INT 			NOT NULL AUTO_INCREMENT,
	comment 		TEXT			NOT NULL,
	created			DATETIME		NOT NULL DEFAULT NOW(),
	updated			DATETIME		NOT NULL DEFAULT NOW(),
	deleted			DATETIME		NOT NULL DEFAULT NOW(),
	blog_user_id 	INT 			NOT NULL,
	blog_post_id	INT 			NOT NULL
	CONSTRAINT	blog_comment_pk	PRIMARY KEY (id)
);

-- foreign keys
-- Reference: blog_post_blog_user (table: blog_post)
ALTER TABLE blog_post ADD CONSTRAINT blog_post_blog_user FOREIGN KEY blog_post_blog_user (blog_user_id)
REFERENCES blog_user (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

-- Reference: blog_comment_blog_post
ALTER TABLE blog_comment ADD CONSTRAINT blog_comment_blog_post FOREIGN KEY blog_comment_blog_post (blog_post_id)
REFERENCES blog_post (id)
	ON DELETE CASCADE
	ON UPDATE CASCADE;

-- End of file.