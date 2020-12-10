DROP TABLE orders;
CREATE TABLE orders(
    ordid int not null auto_increment,
    ordcusid varchar(20) not null,
    ordmovid int not null,
    rentdate timestamp not null DEFAULT now(),
    duedate timestamp not null,
    PRIMARY KEY(ordid, ordcusid),   
    FOREIGN KEY (ordcusid) REFERENCES customer(cusid) ON DELETE CASCADE,
    FOREIGN KEY (ordmovid) REFERENCES movie(movid) ON DELETE CASCADE
);