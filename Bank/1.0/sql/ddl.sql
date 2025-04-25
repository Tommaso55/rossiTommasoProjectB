CREATE TABLE CUSTOMER(
    id integer unsigned auto_increment,
    name varchar(25) not null,
    surname varchar(25) not null,
    dateOfBirth date not null,
    address varchar(30) not null,
    email varchar(30) not null,
    password char(32),
    primary key(id)
)ENGINE=InnoDB;

CREATE TABLE ACCOUNT(
    id integer unsigned auto_increment,
    idCustomer integer unsigned,
    wallet decimal(17,2),
    foreign key(idCustomer) references CUSTOMER(id),
    primary key(id)
)ENGINE=InnoDB;

CREATE TABLE TRANSACTION(
    id integer unsigned auto_increment,
    idAccount integer unsigned,
    amount decimal(15,2),
    timestamp datetime default current_timestamp,
    typeTransaction varchar(30) not null,
    locations varchar(30) not null,
    fraud tinyint default 0,
    status varchar(30),
    typeFraud varchar(30),
    foreign key(idAccount) references ACCOUNT(id),
    primary key(id)
)ENGINE=InnoDB;

CREATE TABLE ADMIN(
    id integer unsigned auto_increment,
    name varchar(25) not null,
    surname varchar(25) not null,
    email varchar(30) not null,  
    password char(32),
    primary key(id)
)ENGINE=InnoDB;
