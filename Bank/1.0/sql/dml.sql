INSERT INTO CUSTOMER(name, surname, dateofBirth, address, email, password)
VALUES('Luca', 'Rossi', '2000/10/8', 'via verona 10','luca.rossi@gmail.com', MD5('LucaRossi'));
INSERT INTO CUSTOMER(name, surname, dateofBirth, address, email, password)
VALUES('Tom', 'Ross', '2006/12/13', 'via pablo 10','tom.ross@gmail.com', MD5('Tom'));
INSERT INTO ACCOUNT(idCustomer, wallet)
VALUES(1, 400.89);
INSERT INTO ADMIN(name, surname, email, password)
VALUES('singh', 'inder','inder.singh@gmail.com', MD5('inder'));
INSERT INTO ADMIN(name, surname, email, password)
VALUES('rossi', 'tom','tom.rossi@gmail.com', MD5('tom'));
INSERT INTO ADMIN(name, surname, email, password)
VALUES('admin', 'admin','admin', MD5('admin'));
