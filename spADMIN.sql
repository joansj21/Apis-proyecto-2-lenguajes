DELIMITER //

CREATE PROCEDURE LoginAdmin(
    IN p_correo VARCHAR(255),
    IN p_contrasena VARCHAR(255)
)
BEGIN
    DECLARE v_count INT;
    SELECT COUNT(*) INTO v_count
    FROM admin
    WHERE correo = p_correo AND contrasenna = p_contrasena;

    IF v_count = 1 THEN
        SELECT id, nombre, correo
        FROM admin
        WHERE correo = p_correo AND contrasenna = p_contrasena;
    ELSE
        SELECT 'failure' AS message;
    END IF;
END //

DELIMITER ;
