DROP TABLE review;
CREATE TABLE review (
    revid int NOT NULL auto_increment,
    rvcusid varchar(20) not null,
    rvmovid int NOT NULL,
    rvrating int(1) not null CONSTRAINT ch_rvrating CHECK (rvrating between 0 and 5),
    rvtext varchar(2000),
    PRIMARY KEY (revid),
    FOREIGN KEY (rvcusid) REFERENCES customer(cusid) ON DELETE CASCADE,
    FOREIGN KEY (rvmovid) REFERENCES movie(movid) ON DELETE CASCADE
);
