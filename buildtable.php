<?php
	
?>

CREATE TABLE student (
		Student_id VARCHAR(8), 
		College VARCHAR(8),
		Department VARCHAR(8),
		Class VARCHAR(8),
		Grade INT(1),
		Name VARCHAR(5),
		Email VARCHAR(30),
		Password VARCHAR(20),
		gender VARCHAR(3),
		PRIMARY KEY(Student_id)
);

CREATE TABLE class(
	Code INT(4),
	Person_id VARCHAR(8),
	PRIMARY KEY(Code)
)

CREATE TABLE class_detail(
	Class VARCHAR(8),
	Name VARCHAR(10),
	Code INT(4),
	Credit INT(3),
	Haveto VARCHAR(2),
	College VARCHAR(8),
	Totalnum INT(3),
	Nownum INT(3),
	Teacher_Name VARCHAR(8),
	PRIMARY KEY(Code)
)

CREATE TABLE Time(
	Code INT(4),
	Day CHAR(1),
	Time INT(2),
	PRIMARY KEY(Code)
)

CREATE TABLE Tecaher(
	Teacher_id VARCHAR(8), 
	Name VARCHAR(5),
	Password VARCHAR(20),
	College VARCHAR(8),
	Department VARCHAR(8),
	Class VARCHAR(8),
	Status VARCHAR(4),
	PRIMARY KEY(Teacher_id)
)


