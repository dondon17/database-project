DROP TABLE movieactor;
CREATE TABLE movieactor(
    movactid INT NOT NULL auto_increment,
    mamovid int NOT NULL,
    maactid int NOT NULL,
    PRIMARY KEY(movactid, mamovid, maactid),
    FOREIGN KEY(mamovid) REFERENCES movie(movid) ON DELETE CASCADE,
    FOREIGN KEY(maactid) REFERENCES actor(actid) ON DELETE CASCADE
);
