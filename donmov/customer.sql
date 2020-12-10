DROP TABLE customer;
CREATE TABLE customer (
  cusid varchar(20) not null,
  cuspw varchar(20) not null,
  email varchar(20) not null,
  fname varchar(20) not null,
  lname varchar(20) not null,
  address varchar(100) not null,
  city varchar(20) not null,
  zipcode varchar(10) not null,
  phonenum varchar(20) not null,
  accid varchar(20) not null,
  carno varchar(22) not null,
  acctype varchar(20) not null,
  PRIMARY key(cusid)
);