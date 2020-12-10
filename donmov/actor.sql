DROP TABLE actor;

CREATE TABLE actor
(
    actid INT NOT NULL PRIMARY KEY,
    actname varchar(40) not null,
    sex char(1) NOT NULL CONSTRAINT ch_sex CHECK (sex IN ('m', 'f')),
    age int(3) not null CONSTRAINT ch_age CHECK (age BETWEEN 0 and 200),
    rating int(1) not null CONSTRAINT ch_actrating CHECK (rating between 0 and 5)
);
    