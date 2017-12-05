use dibs;

drop table if exists users;
drop table if exists items;



create table users (
	userid INT unsigned auto_increment primary key,
	userName varchar(20) not null,
    pass varchar(64));

create table items (
	itemID INT unsigned unique auto_increment primary key,
    description varchar(255) not null,
    imgPath varchar(255) not null,
    turnedIn date, #date turned into the desk
    location varchar(255), #keeping it a string clean on php side
    dibs	 boolean	NOT NULL default 0,
    fulltext(description, location)
    );

#adding a user

insert into users (userName, pass) 
values ('admin', sha2('admin', 256));

insert into items (description, imgPath, turnedIn, location)
values ('Set of Ford keys', 'keyfob.jpg', '2017-11-15', 'York'), 
	   ('Brown leather wallet', 'wallet.jpg', '2017-11-1', 'Smith'), 
	   ('Orioles baseball hat', 'hat.jpg', '2017-11-3', 'Union'),
       ('Samsung phone with black case', 'samsung.jpg', '2017-11-4', 'York'),
       ('Beige/Tan jacket', 'jacket.jpg', '2017-11-5', 'Van Bokkelen'),
       ('Silver Acer laptop', 'Acer.jpg', '2017-11-14', 'Liberal Arts'),
       ('Black briefcase with a silver lock', 'briefcase.jpg', '2017-11-9', 'Cook Library'),
       ('Black Nike hoodie', 'hoodie.jpg', '2017-11-5', 'Union'),
       ('Black water bottle', 'bottle.jpg', '2017-12-2', 'York');