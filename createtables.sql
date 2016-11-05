drop table if exists orderitem;
drop table if exists includestop;
drop table if exists toppingset;
drop table if exists toppingitem;
drop table if exists menuitem;
drop table if exists pizzatype;
drop table if exists orderlist;
drop table if exists deliveryman;
drop table if exists branch;
drop table if exists region;
drop table if exists member;
drop table if exists customer;

CREATE TABLE customer(
	phone VARCHAR(255) PRIMARY KEY,
	address VARCHAR(255),
	first_name VARCHAR(255),
	last_name VARCHAR(255)
);
CREATE TABLE member(
	phone VARCHAR(255) PRIMARY KEY,
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
	password VARCHAR(20),
	FOREIGN KEY (branch_id) REFERENCES branch(branch_id)
);
CREATE TABLE orderlist(
	order_id INT,
	order_date DATE,
	order_time TIMESTAMP,
	status INT,
	points_used INT,
	phone VARCHAR(255),
	staff_id INT NOT NULL,
	branch_id INT NOT NULL,
	PRIMARY KEY (order_id),
	FOREIGN KEY (staff_id) REFERENCES deliveryman(staff_id),
	FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
	FOREIGN KEY (phone) REFERENCES customer(phone)
);
CREATE TABLE pizzatype(
	type_id INT PRIMARY KEY,
	name VARCHAR(255),
	description VARCHAR(255)
);
CREATE TABLE menuitem(
	branch_id INT,
	pizza_number INT,
	price DECIMAL(10,2),
	cost DECIMAL(10,2),
	type_id INT,
	PRIMARY KEY (branch_id, pizza_number),
	FOREIGN KEY (type_id) REFERENCES pizzatype(type_id)
);
CREATE TABLE toppingitem(
	topping_id INT PRIMARY KEY,
	price DECIMAL(10,2),
	cost DECIMAL(10,2),
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
	oitem_quantity INT,
	branch_id INT,
	PRIMARY KEY (order_id, oitem_id),
	FOREIGN KEY (order_id) REFERENCES orderlist(order_id),
	FOREIGN KEY (topset_id) REFERENCES toppingset(topset_id),
	FOREIGN KEY (branch_id, pizza_number) REFERENCES menuitem(branch_id, pizza_number)
);


insert into customer
values('2223334444', '1454 - Ronayne Road', 'Sebastian', 'Wels-Lopez');
insert into customer
values('1110005555', '324 - E27th Street', 'Adrian', 'Wong');
insert into customer
values('9998887777', '1423 - Dempsey Street', 'Connor', 'Ashcroft');
insert into customer
values('8883335555', '2454 - Rose Court', 'Emily', 'Henry');
insert into customer
values('3338884444', '9023 - Rainy Road', 'Carey', 'Yu');
insert into customer
values('1112223333', '1124 - Best Street', 'Junze', 'Wu');
insert into customer
values('6665554444', '6234 - Sunny Drive', 'Peter', 'Siemens');
insert into customer
values('8887773333', '121 - Folger Road', 'Matthew', 'Fung');
insert into customer
values('1112224444', '1454 - Ronayne Road', 'Mattias', 'Wels-Lopez');
insert into customer
values('1112225555', '1454 - Ronayne Road', 'Christian', 'Wels-Lopez');

insert into member
values('2223334444', 1300, 'seby_wels@email.com', 'sebastian');
insert into member
values('1110005555', 2400, 'adrian_wong@email.com', 'adrian');
insert into member
values('9998887777', 0, 'connor_ashcroft@email.com', 'connor');
insert into member
values('8883335555', 60, 'emily_henry@email.com', 'emily');
insert into member
values('3338884444', 450, 'carey_yu@email.com', 'carey');

insert into region
values(1, 'Vancouver');
insert into region
values(2, 'Burnaby');
insert into region
values(3, 'Coquitlam');
insert into region
values(4, 'North Vancouver');
insert into region
values(5, 'UBC');

insert into branch
values(101, 'Kitsilano', '2445 W 2nd Avenue', 1);
insert into branch
values(102, 'Oakridge', '650 W 41st Ave', 1);
insert into branch
values(103, 'Downtown', '601 Robson St', 1);
insert into branch
values(201, 'Metrotown', '4757 Cambie St', 2);
insert into branch
values(301, 'Port Coquitlam', '2548 Shaughnessy St', 3);
insert into branch
values(401, 'Lynn Valley', '1233 Lynn Valley Rd', 4);
insert into branch
values(402, 'Lonsdale', '102 Lonsdale Ave', 4);

insert into deliveryman
values(1, 101, 'password1');
insert into deliveryman
values(2, 101, 'password2');
insert into deliveryman
values(3, 102, 'password3');
insert into deliveryman
values(4, 103, 'password4');
insert into deliveryman
values(5, 201, 'password5');

insert into orderlist
values(1, '2016-09-18', '2016-09-18 10:30:00.000', 1, 0, 2223334444, 1, 101);
insert into orderlist
values(2, '2016-09-20', '2016-09-20 12:30:00.000', 1, 0, 2223334444, 3, 102);
insert into orderlist
values(3, '2016-10-08', '2016-10-08 11:30:00.000', 1, 500, 1110005555, 2, 101);
insert into orderlist
values(4, '2016-10-11', '2016-10-11 18:30:00.000', 0, 0, 9998887777, 4, 103);
insert into orderlist
values(5, '2016-10-12', '2016-10-12 18:15:00.000', 0, 0, 8883335555, 5, 201);

insert into pizzatype
values(1, 'Cheese', 'Mozzerella');
insert into pizzatype
values(2, 'Extra Pepperoni', 'Pepperoni, Pepperoni, Mozzerella');
insert into pizzatype
values(3, 'Sausage', 'Sausage, Mozzerella');
insert into pizzatype
values(4, 'Hawaiian', 'Ham, Pinapple, Mozzerella');
insert into pizzatype
values(5, 'Meatlovers', 'Ham, Pepperoni, Sausage, Mozzerella');

insert into menuitem
values(101, 1, 9.00, 4.00, 1);
insert into menuitem
values(101, 2, 11.00, 4.75, 2);
insert into menuitem
values(101, 3, 10.00, 4.25, 3);
insert into menuitem
values(101, 4, 10.00, 4.25, 4);
insert into menuitem
values(101, 5, 13.00, 5.50, 5);
insert into menuitem
values(102, 10, 7.00, 4.00, 1);

insert into toppingitem
values(011, 1.00, 0.50, 'Mozzerella-S');
insert into toppingitem
values(012, 1.15, 0.60, 'Mozzerella-M');
insert into toppingitem
values(013, 1.35, 0.75, 'Mozzerella-L');
insert into toppingitem
values(022, 1.00, 0.50, 'Pepperoni-M');
insert into toppingitem
values(032, 1.00, 0.50, 'Sausage-M');
insert into toppingitem
values(042, 1.00, 0.50, 'Ham-M');
insert into toppingitem
values(052, 0.75, 0.40, 'Pinapple-M');

insert into toppingset
values(1);
insert into toppingset
values(2);
insert into toppingset
values(3);
insert into toppingset
values(4);
insert into toppingset
values(5);

insert into includestop
values(1, 012, 1);
insert into includestop
values(2, 012, 1);
insert into includestop
values(2, 022, 2);
insert into includestop
values(3, 012, 1);
insert into includestop
values(3, 032, 1);
insert into includestop
values(4, 012, 1);
insert into includestop
values(4, 042, 1);
insert into includestop
values(4, 052, 1);
insert into includestop
values(5, 012, 1);
insert into includestop
values(5, 022, 1);
insert into includestop
values(5, 032, 1);
insert into includestop
values(5, 042, 1);

insert into orderitem
values(1, 1, 1, 1, 1, 101);
insert into orderitem
values(2, 1, 2, 2, 1, 101);
insert into orderitem
values(3, 2, 4, 4, 1, 101);
insert into orderitem
values(4, 3, 4, 4, 2, 101);
insert into orderitem
values(5, 4, 5, 5, 4, 101);
