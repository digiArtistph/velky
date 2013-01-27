DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_insert_ambulance` $$
CREATE PROCEDURE `sp_insert_ambulance`(IN m_plateno VARCHAR(32), IN m_capacity INT, IN m_hospital INT)
BEGIN
	DECLARE lst_id INT DEFAULT 0;
	
	DECLARE EXIT HANDLER FOR SQLWARNING ROLLBACK;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
	
	START TRANSACTION;
	
	# inserts new record in the table ambulances
	INSERT INTO ambulances SET plateno = m_plateno, capacity = m_capacity;
	
	SET lst_id = LAST_INSERT_ID();
	
	# inserts new record in the hospitals_ambulances table
	INSERT INTO hospitals_ambulances SET h_id = m_hospital, amb_id = lst_id;
	
	COMMIT;
	
END $$
DELIMITER ;