drop database univ_database;

create database univ_database;

\c univ_database


CREATE TABLE admin(
	admin_id varchar(20) unique,
	admin_name varchar(20),
	admin_pass varchar(20),
	primary key(admin_id)
);

CREATE TABLE department(
	dept_id varchar(10),
	dept_name varchar(10),
	budget int check(budget > 50000),
	building varchar(10),
	primary key(dept_id)
);


CREATE TABLE student(
	stud_id varchar(10),
	stud_name varchar(20) not null,
	stud_login varchar(20) not null,
	stud_pass varchar(20) not null,
	dept_id varchar(10),
	primary key(stud_id),
	foreign key(dept_id) references department(dept_id)
	on  delete set null
);

CREATE TABLE faculty(
	fac_id varchar(10),
	fac_name varchar(20) not null,
	salary int check(salary > 30000),
	dept_id varchar(10),
	primary key(fac_id),
	foreign key(dept_id) references department(dept_id)
	on  delete set null
);

CREATE TABLE advisor(
	s_id varchar(10),
	f_id varchar(10),
	primary key(s_id),
	foreign key(s_id) references student(stud_id) on delete set null,
	foreign key(f_id) references faculty(fac_id) on delete set null
);

CREATE TABLE club(
	club_id varchar(10),
	club_name varchar(20) not null,
	club_head varchar(20) not null,
	club_type varchar(20) not null,
	primary key(club_id),
	foreign key(club_head) references faculty(fac_id)
	on delete set null
);

CREATE TABLE library(
	lib_id varchar(10),
	lib_name varchar(20),
	primary key(lib_id)
);

CREATE TABLE book(
	book_id varchar(10),
	book_name varchar(50),
	author varchar(20),
	lib_id varchar(10),
	primary key(book_id),
	foreign key(lib_id) references library(lib_id) on delete set null
);

CREATE TABLE course(
	course_id varchar(10),
	title varchar(50),
	dept_id varchar(10),
	credits int ,
	textbook_id varchar(10),
	primary key(course_id),
	foreign key(dept_id) references department(dept_id) on delete set null,
	foreign key(textbook_id) references book(book_id) on delete set null
);



CREATE TABLE participates(
	s_id varchar(10),
	c_id varchar(10),
	role varchar(20),
	foreign key(s_id) references student(stud_id),
	foreign key(c_id) references club(club_id)
);

CREATE TABLE room(
	room_id varchar(10),
	building varchar(10),
	capacity int,
	primary key(room_id)
);


CREATE TABLE takes(
	s_id varchar(10),
	course_id varchar(10),
	room_id varchar(10),
	grade varchar(5),
	semester varchar(10),
	primary key(s_id,course_id,semester),
	foreign key(s_id) references student(stud_id) on delete cascade on update cascade,
	foreign key(course_id) references course(course_id) on delete cascade on update cascade,
	foreign key(room_id) references room(room_id) on delete cascade on update cascade
);



CREATE TABLE teaches(
	fac_id varchar(10),
	course_id varchar(10),
	room_id varchar(10),
	primary key(fac_id,course_id),
	foreign key(fac_id) references faculty(fac_id) on delete cascade,
	foreign key(course_id) references course(course_id) on delete cascade,
	foreign key(room_id) references room(room_id) on delete set null
);


CREATE TABLE projects(
	project_id varchar(10),
	dept_id varchar(10),
	project_name varchar(100),
	fac_id varchar(10),
	budget int,
	primary key(project_id),
	foreign key(dept_id) references department(dept_id),
	foreign key(fac_id) references faculty(fac_id)
);

CREATE TABLE works(
	project_id varchar(10),
	s_id varchar(10),
	duration int,
	foreign key(project_id) references projects(project_id),
	foreign key(s_id) references student(stud_id)
);

delete from works;
delete from projects;
delete from department;
delete from admin;
delete from room;
delete from library;
delete from student;
delete from faculty;
delete from course;
delete from participates;
delete from teaches;
delete from takes;

insert into admin values('bharath12345','Bharath','12345');
insert into admin values('vedant12345','Vedant','12345');
insert into admin values('vipul12345','Vipul','12345');

insert into department values('1','CSE','1000000','A-Block');
insert into department values('2','ECE','5000000','B-Block');
insert into department values('3','MECH','100000','C-Block');
insert into department values('4','EEE','500000','D-Block');

insert into room values('A1','A-Block','30');
insert into room values('A2','A-Block','120');
insert into room values('B1','B-Block','30');
insert into room values('B2','B-Block','60');
insert into room values('C1','C-Block','30');
insert into room values('C2','C-Block','20');
insert into room values('D1','D-Block','30');
insert into room values('D2','D-Block','100');

insert into library values('AL','Library-A');
insert into library values('BL','Library-B');
insert into library values('CL','Library-C');

insert into student values('CSE1','Chirag','chi12345','12345','1');
insert into student values('CSE2','Atul','atul12345','12345','1');
insert into student values('CSE3','Anant','ana12345','12345','1');
insert into student values('ECE1','Amish','amis12345','12345','2');
insert into student values('ECE2','Vivek','vive12345','12345','2');
insert into student values('ECE3','Shrey','shre12345','12345','2');
insert into student values('MECH1','Rahul','rahu12345','12345','3');
insert into student values('MECH2','Raghav','ragh12345','12345','3');
insert into student values('MECH3','Rachana','rach12345','12345','3');
insert into student values('EEE1','Jyoti','jyo12345','12345','4');
insert into student values('EEE2','Akshita','aksh12345','12345','4');
insert into student values('EEE3','Vijay','vij12345','12345','4');

insert into faculty values('CSEF1','Anupama','50000','1');
insert into faculty values('CSEF2','Ankita','50000','1');
insert into faculty values('ECEF1','Kajal','60000','2');
insert into faculty values('ECEF2','Palak','65000','2');
insert into faculty values('MECHF1','Rishika','40000','3');
insert into faculty values('MECHF2','Anshul','90000','3');
insert into faculty values('EEEF1','Vishruth','70000','4');
insert into faculty values('EEEF2','Varun','75000','4');

insert into club values('CLUB1','Programming Club','CSEF2','Technical');
insert into club values('CLUB2','Music Club','EEEF2','Hobby');
insert into club values('CLUB3','Design Club','EEEF1','Hobby');
insert into club values('CLUB4','Racing Club','MECHF2','Technical');
insert into club values('CLUB5','Electronics Club','ECEF2','Hobby');

insert into advisor values('CSE1','CSEF2');
insert into advisor values('CSE2','CSEF2');
insert into advisor values('CSE3','CSEF1');
insert into advisor values('ECE1','ECEF2');
insert into advisor values('ECE2','ECEF2');
insert into advisor values('MECH1','MECHF1');
insert into advisor values('MECH2','MECHF2');
insert into advisor values('EEE1','EEEF1');

insert into book values('BOOK1','Introduction To Algorithms','CLRS','AL');
insert into book values('BOOK2','Computer Architecture','Morris Mano','AL');
insert into book values('BOOK3','Mechanics of Solid','John Mayer','AL');
insert into book values('BOOK4','Thermodynamics','Pablo Escobar','BL');
insert into book values('BOOK5','Electrical Machines','John Cena','CL');
insert into book values('BOOK6','Circuit Theory','Randy Orton','CL');
insert into book values('BOOK7','Signal Processing','Shawn Micheals','CL');
insert into book values('BOOK8','High Voltage Engineering','Harry Kane','BL');

insert into course values('CSEC1','Introduction To Algorithms','1','4','BOOK1');
insert into course values('CSEC2','Computer Architecture','1','4','BOOK1');
insert into course values('ECEC1','Signal Processing','2','4','BOOK7');
insert into course values('ECEC2','Basic Circuit Theory','2','4','BOOK7');
insert into course values('MECHC1','Thermodynamics','3','4','BOOK4');
insert into course values('EEEC1','Electrical Machine','4','4','BOOK5');

insert into participates values('CSE1','CLUB1','Student Head');
insert into participates values('CSE2','CLUB1','Member');
insert into participates values('CSE3','CLUB1','Member');
insert into participates values('EEE3','CLUB1','Member');
insert into participates values('ECE3','CLUB1','Member');
insert into participates values('MECH1','CLUB2','Student Head');
insert into participates values('CSE2','CLUB2','Member');
insert into participates values('CSE3','CLUB2','Member');
insert into participates values('EEE1','CLUB2','Member');
insert into participates values('ECE2','CLUB2','Member');
insert into participates values('EEE2','CLUB3','Student Head');
insert into participates values('CSE1','CLUB3','Member');
insert into participates values('ECE3','CLUB3','Member');
insert into participates values('MECH3','CLUB3','Member');
insert into participates values('ECE2','CLUB3','Member');
insert into participates values('MECH3','CLUB4','Student Head');
insert into participates values('MECH2','CLUB4','Member');
insert into participates values('MECH1','CLUB4','Member');
insert into participates values('ECE1','CLUB4','Member');
insert into participates values('EEE1','CLUB4','Member');
insert into participates values('ECE1','CLUB4','Student Head');
insert into participates values('ECE2','CLUB4','Member');
insert into participates values('ECE3','CLUB4','Member');
insert into participates values('EEE1','CLUB4','Member');
insert into participates values('EEE2','CLUB4','Member');

insert into takes values('CSE1','CSEC1','A1','S','4th');
insert into takes values('CSE2','CSEC1','A1','A','4th');
insert into takes values('CSE3','CSEC1','A1','B','4th');
insert into takes values('CSE1','CSEC2','A2','S','6th');
insert into takes values('CSE2','CSEC2','A2','A','6th');
insert into takes values('ECE1','CSEC1','A1','A','6th');
insert into takes values('ECE1','ECEC2','B2','S','4th');
insert into takes values('ECE2','ECEC2','B2','A','4th');
insert into takes values('ECE3','ECEC2','B2','A','4th');
insert into takes values('ECE1','ECEC1','B1','A','6th');
insert into takes values('CSE2','ECEC2','B2','S','6th');
insert into takes values('MECH1','MECHC1','C1','A','4th');
insert into takes values('MECH2','MECHC1','C1','F','4th');
insert into takes values('MECH3','MECHC1','C1','C','6th');
insert into takes values('MECH1','MECHC1','C2','A','6th');
insert into takes values('EEE1','EEEC1','D1','A','4th');
insert into takes values('EEE2','EEEC1','D1','A','4th');
insert into takes values('EEE3','EEEC1','D1','B','4th');
insert into takes values('EEE1','EEEC1','D2','A','6th');
insert into takes values('EEE1','CSEC1','A1','S','6th');

insert into teaches values('CSEF1','CSEC1','A1');
insert into teaches values('CSEF2','CSEC2','A2');
insert into teaches values('ECEF1','ECEC1','B1');
insert into teaches values('ECEF2','ECEC2','B2');
insert into teaches values('MECHF1','MECHC1','C1');
insert into teaches values('EEEF1','EEEC1','D1');

insert into projects values('PROJECT1','1','Developing Hardware Based Big Data Solutions','CSEF2','10000000');
insert into projects values('PROJECT2','1','Video Analytics','CSEF1','1000000');
insert into projects values('PROJECT3','1','Speech Recognition','CSEF1','2000');
insert into projects values('PROJECT4','2','Home Automation','ECEF1','10000000');
insert into projects values('PROJECT5','2','Fuel Tank Sensor','ECEF2','100000');
insert into projects values('PROJECT6','3','Self Driving Cars','MECHF1','200000000');
insert into projects values('PROJECT7','4','House Wiring','EEEF1','20000');

insert into works values('PROJECT1','CSE1','4');
insert into works values('PROJECT1','CSE2','4');
insert into works values('PROJECT1','ECE1','4');
insert into works values('PROJECT2','CSE3','5');
insert into works values('PROJECT2','CSE2','5');
insert into works values('PROJECT3','CSE1','6');
insert into works values('PROJECT4','ECE1','2');
insert into works values('PROJECT4','ECE2','2');
insert into works values('PROJECT5','ECE3','3');
insert into works values('PROJECT6','MECH1','1');
insert into works values('PROJECT6','MECH2','1');
insert into works values('PROJECT6','MECH3','1');
insert into works values('PROJECT7','EEE1','7');
insert into works values('PROJECT7','EEE2','7');
insert into works values('PROJECT7','EEE3','7');
