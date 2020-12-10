DROP TABLE moviequeue;
CREATE TABLE moviequeue (
    quid int NOT NULL auto_increment,
    qcusid varchar(20) not null,
    qmovid int NOT NULL,
    PRIMARY KEY (quid),
    FOREIGN KEY (qcusid, qmovid) REFERENCES orders(ordcusid, ordmovid) ON DELETE CASCADE
);
