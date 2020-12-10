DROP TABLE likes;
CREATE TABLE likes(
    likeqid int not null auto_increment,
    likecusid varchar(20) not null,
    likemovid int not null,
    PRIMARY KEY(likeqid, likecusid),   
    FOREIGN KEY (likecusid) REFERENCES customer(cusid) ON DELETE CASCADE,
    FOREIGN KEY (likemovid) REFERENCES movie(movid) ON DELETE CASCADE
);