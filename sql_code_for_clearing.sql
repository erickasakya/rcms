ALTER TABLE mark DROP FOREIGN KEY mark_ibfk_1;
ALTER TABLE comment DROP FOREIGN KEY comment_ibfk_1;
ALTER TABLE staff_logs DROP FOREIGN KEY staff_logs_ibfk_3;
ALTER TABLE staff_logs DROP FOREIGN KEY staff_logs_ibfk_1;

TRUNCATE complaint;
TRUNCATE comment;
TRUNCATE mark;
TRUNCATE notification;
TRUNCATE offering;
TRUNCATE staff_logs;
TRUNCATE teaching;

ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`complaintNo`) REFERENCES `complaint` (`complaintNo`);
  
ALTER TABLE `staff_logs`
  ADD CONSTRAINT `staff_logs_ibfk_1` FOREIGN KEY (`mark_id`) REFERENCES `mark` (`markID`),
    ADD CONSTRAINT `staff_logs_ibfk_3` FOREIGN KEY (`complaint_no`) REFERENCES `complaint` (`complaintNo`);

ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_1` FOREIGN KEY (`complaintNo`) REFERENCES `complaint` (`complaintNo`);