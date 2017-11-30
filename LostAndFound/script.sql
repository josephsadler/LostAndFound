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
    fulltext(description, location)
    );

#adding a user

insert into users (userName, pass) 
values ('admin', sha2('admin', 256));

insert into items (description, imgPath, turnedIn, location)
values ('Set of Ford keys', 'tbd', '2017-11-15', 'York'), 
	   ('Brown leather wallet', 'tbd', '2017-11-1', 'Smith'), 
	   ('Orioles baseball hat', 'tbd', '2017-11-3', 'Union'),
       ('Samsung phone with black case', 'tbd', '2017-11-4', 'York'),
       ('Beige/Tan jacket', 'tbd', '2017-11-5', 'Van Bokkelen'),
       ('Silver Acer laptop', 'tbd', '2017-11-14', 'Liberal Arts'),
       ('Black briefcase with a silver lock', 'tbd', '2017-11-9', 'Cook Library'),
       ('Black Nike hoodie', 'tbd', '2017-11-5', 'Union');