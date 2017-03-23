CREATE TABLE users(
	id_user INT NOT NULL AUTO_INCREMENT,
	full_name VARCHAR(255) NOT NULL,
	email VARCHAR(255),
	password VARCHAR(25) NOT NULL,

	CONSTRAINT UN_id_user UNIQUE(id_user),
	CONSTRAINT PK_email PRIMARY KEY(email) 
);


CREATE TABLE itens(
	id_item INT NOT NULL AUTO_INCREMENT,
	name_item varchar(255),

	CONSTRAINT UN_ide_item UNIQUE(id_item),
	CONSTRAINT PK_name_item PRIMARY KEY(name_item)
);

CREATE TABLE desire_list(
	id_desire_list INT NOT NULL AUTO_INCREMENT,
	id_user INT,
	id_item INT,

	CONSTRAINT UN_id_desire_list UNIQUE(id_desire_list),
	CONSTRAINT PK_desire_list PRIMAREY KEY (id_user, id_item),
	CONSTRAINT FK_users FOREIGN KEY (id_user) REFERENCES users(id_user),
	CONSTRAINT FK_itens FOREIGN KEY (id_item) REFERENCES itens(id_item),
);