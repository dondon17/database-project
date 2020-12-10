BEGIN
	DECLARE _copies INT DEFAULT 0;
    DECLARE _qlen INT DEFAULT 0;
    DECLARE _acctype VARCHAR(20);
    
    SELECT acctype into _acctype FROM customer WHERE cusid=_cusid;
    SELECT copies into _copies FROM movie WHERE movid=_movid;
    SELECT COUNT(*) into _qlen FROM moviequeue WHERE qcusid=_cusid; 
    IF _copies = 0 THEN
		ROLLBACK;
	ELSE
		IF _acctype = 'premium' THEN    
			INSERT INTO orders(ordcusid, ordmovid, duedate)
			VALUES(_cusid, _movid, date_add(now(), interval 7 day));
			INSERT INTO moviequeue(qcusid, qmovid) VALUES(_cusid, _movid);
			UPDATE movie SET copies=copies-1 WHERE movid=_movid;
			COMMIT;
		END IF;
		IF _acctype = 'basic' THEN
			IF _qlen < 2 THEN
				INSERT INTO orders(ordcusid, ordmovid, duedate)
				VALUES(_cusid, _movid, date_add(now(), interval 7 day));
				INSERT INTO moviequeue(qcusid, qmovid) VALUES(_cusid, _movid);
				UPDATE movie SET copies=copies-1 WHERE movid=_movid;
				COMMIT;
			ELSE
				ROLLBACK;
			END IF;
		END IF;
	END IF;
END