DROP TABLE movie;
CREATE TABLE movie (
  movid int NOT NULL auto_increment PRIMARY key,
  title varchar(20) not null,
  genre varchar(20) not null CONSTRAINT ch_genre CHECK (genre IN ('Comedy', 'Drama', 'Action', 'Romance', 'Foreign', 'Horror')),
  rating int(1) not null CONSTRAINT ch_rating CHECK (rating between 0 and 5),
  copies int(1) not null CONSTRAINT ch_copies CHECK (copies>=0)
);