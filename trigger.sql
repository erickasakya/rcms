DELIMITER $
CREATE TRIGGER `after_mark_insert` AFTER INSERT ON `mark`
 FOR EACH ROW BEGIN
   INSERT INTO staff_logs(mark_id,mark_name,new_mark,operation_type,operation_date,complaint_no,staff_id)
    VALUES(NEW.markID,NEW.markName,NEW.mark,'mark_insert',now(),NEW.complaintNo,NEW.staffID);
    END $$
DELIMITER ;

DELIMITER $
CREATE TRIGGER after_complaint_update
AFTER UPDATE ON complaint
FOR EACH ROW BEGIN

    IF (NEW.approval_status <> OLD.approval_status) THEN        
        INSERT INTO staff_logs
        SET mark_id=(SELECT markID FROM mark where complaintNo=OLD.complaintNo),
        mark_name=(SELECT markName FROM mark where complaintNo=OLD.complaintNo),
        new_mark=(SELECT mark FROM mark where complaintNo=OLD.complaintNo),
        old_complaint_status=OLD.approval_status,
        new_complaint_status=NEW.approval_status,
        operation_type='Mark approval',
        operation_date=now(),
        complaint_no=OLD.complaintNo,
        staff_id=NEW.hodID;
    END IF;
END$
DELIMITER ;