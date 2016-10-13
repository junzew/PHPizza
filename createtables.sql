drop table orderitem;
drop table includestop;
drop table toppingset;
drop table toppingitem;
drop table menuitem;
drop table pizzatype;
drop table orderlist;
drop table deliveryman;
drop table branch;
drop table region;
drop table member;
drop table customer;

CREATE TABLE customer(
	phone INT PRIMARY KEY,
	address VARCHAR(255),
	first_name VARCHAR(255),
	last_name VARCHAR(255)
);
CREATE TABLE member(
	phone INT PRIMARY KEY,
	points INT,
	email VARCHAR(255),
	password VARCHAR(20),
	FOREIGN KEY (phone) REFERENCES customer(phone)
);
CREATE TABLE region(
	region_id INT PRIMARY KEY,
	name VARCHAR(255)
);
CREATE TABLE branch(
	branch_id INT PRIMARY KEY,
	name VARCHAR(255),
	address VARCHAR(255),
	region_id INT NOT NULL,
	FOREIGN KEY (region_id) REFERENCES region(region_id)
);
CREATE TABLE deliveryman(
	staff_id INT PRIMARY KEY,
	branch_id INT,
	FOREIGN KEY (branch_id) REFERENCES branch(branch_id)
);
CREATE TABLE orderlist(
	order_id INT,
	order_date DATE,
	order_time TIMESTAMP,
	status INT,
	staff_id INT NOT NULL, 
	branch_id INT NOT NULL, 
	PRIMARY KEY (order_id),
	FOREIGN KEY (staff_id) REFERENCES deliveryman(staff_id),
	FOREIGN KEY (branch_id) REFERENCES branch(branch_id)
);
CREATE TABLE pizzatype(
	type_id INT PRIMARY KEY,
	name VARCHAR(255),
	description VARCHAR(255)
);
CREATE TABLE menuitem(
	branch_id INT,
	pizza_number INT,
	price NUMBER(10,2),
	cost NUMBER(10,2),
	type_id INT,
	PRIMARY KEY (branch_id, pizza_number),
	FOREIGN KEY (type_id) REFERENCES pizzatype(type_id)
);
CREATE TABLE toppingitem(
	topping_id INT PRIMARY KEY,
	cost NUMBER(10,2),
	price NUMBER(10,2),
	t_name VARCHAR(255)
);
CREATE TABLE toppingset(
	topset_id INT PRIMARY KEY
);
CREATE TABLE includestop(
	topset_id INT,
	topping_id INT,
	quantity INT,
	PRIMARY KEY(topset_id, topping_id),
	FOREIGN KEY(topset_id) REFERENCES toppingset(topset_id),
	FOREIGN KEY(topping_id) REFERENCES toppingitem(topping_id)
);
CREATE TABLE orderitem(
	order_id INT,
	oitem_id INT,
	topset_id INT,
	pizza_number INT,
	branch_id INT,
	PRIMARY KEY (order_id, oitem_id),
	FOREIGN KEY (order_id) REFERENCES orderlist(order_id),
	FOREIGN KEY (topset_id) REFERENCES toppingset(topset_id),
	FOREIGN KEY (pizza_number, branch_id) REFERENCES menuitem(pizza_number, branch_id)
);

