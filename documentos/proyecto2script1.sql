use proyectocupones;

CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    cedula VARCHAR(20) NOT NULL,
    fecha_creacion DATE NOT NULL,
    correo VARCHAR(100) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    contraseña VARCHAR(100) NOT NULL,
    clave_temporal  BOOLEAN DEFAULT 1,
    activo BOOLEAN DEFAULT TRUE
);

/*nuevo categoria se cambio descripcion por ubicacion*/
CREATE TABLE cupones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    empresa_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    ubicacion TEXT NOT NULL, 
    activo BOOLEAN DEFAULT 0,
	categoria int NOT NULL,
	 precio DECIMAL(10, 2) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	fecha_inicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	fecha_expira TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id) ON DELETE CASCADE,
	FOREIGN KEY (categoria) REFERENCES categoria(id) ON DELETE CASCADE
);


/*preguntar si la este tiene promociones*/
create table promociones(
 id INT AUTO_INCREMENT PRIMARY KEY,
 fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 fecha_inicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,/*cambio*/
 fecha_expira TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 descripcion VARCHAR(100) NOT NULL,
 activo BOOLEAN DEFAULT 0,
 id_cupon int NOT NULL,
 FOREIGN KEY (id_cupon) REFERENCES cupones(id) ON DELETE CASCADE
 
);
create table imagenCupon(
id INT AUTO_INCREMENT PRIMARY KEY,
 urlImg VARCHAR(500) NOT NULL,
 id_cupon int NOT NULL

);


Create table categoria(
id INT AUTO_INCREMENT PRIMARY KEY,
categoria VARCHAR(100) NOT NULL

);

CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    contraseña VARCHAR(100) NOT NULL
);




DELIMITER //

CREATE PROCEDURE InsertOrUpdateImagenCupon(
    IN p_urlImg VARCHAR(500),
    IN p_id_cupon INT
)
BEGIN
    DECLARE imgCount INT;
    
    -- Verificar si ya existe una imagen para el id_cupon dado
    SELECT COUNT(*) INTO imgCount FROM imagenCupon WHERE id_cupon = p_id_cupon;
    
    IF imgCount > 0 THEN
        -- Si existe, actualizar la URL de la imagen
        UPDATE imagenCupon SET urlImg = p_urlImg WHERE id_cupon = p_id_cupon;
    ELSE
        -- Si no existe, insertar una nueva fila
        INSERT INTO imagenCupon(urlImg, id_cupon) VALUES (p_urlImg, p_id_cupon);
    END IF;
    
END //

DELIMITER ;


DELIMITER $$

DELIMITER $$

CREATE PROCEDURE GetAllCuponsWithPromotions()
BEGIN
    -- Devolver todos los cupones con el nombre de la empresa y otras validaciones
    SELECT c.*, e.nombre AS nombre_empresa, cat.categoria, img.urlImg
    FROM cupones c
    JOIN categoria cat ON c.categoria = cat.id
    LEFT JOIN imagenCupon img ON c.id = img.id_cupon
    LEFT JOIN empresas e ON c.empresa_id = e.id
    WHERE c.activo = 0
      AND c.fecha_expira >= CURRENT_TIMESTAMP;
      
    -- Devolver las promociones asociadas a cada cupón que cumplen las condiciones
    SELECT c.id AS cupon_id, p.*
    FROM cupones c
    INNER JOIN promociones p ON c.id = p.id_cupon
    WHERE c.activo = 0
      AND c.fecha_expira >= CURRENT_TIMESTAMP
      AND p.fecha_inicio <= CURRENT_TIMESTAMP
      AND p.fecha_expira >= CURRENT_TIMESTAMP;
END$$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE GetCuponWithPromotions(
    IN cuponId INT
)
BEGIN
    DECLARE cuponExists INT;
    
    -- Verificar si el cupón existe, está activo, y no ha expirado
    SELECT COUNT(*) INTO cuponExists
    FROM cupones
    WHERE id = cuponId
      AND activo = 0
      AND fecha_expira >= CURRENT_TIMESTAMP;
    
    -- Si el cupón existe y cumple las condiciones
    IF cuponExists > 0 THEN
        -- Devolver el cupón con el nombre de la empresa y otras validaciones
        SELECT c.*, e.nombre AS nombre_empresa, cat.categoria, img.urlImg
        FROM cupones c
        JOIN categoria cat ON c.categoria = cat.id
        LEFT JOIN imagenCupon img ON c.id = img.id_cupon
        LEFT JOIN empresas e ON c.empresa_id = e.id
        WHERE c.id = cuponId;

        -- Devolver las promociones asociadas al cupón que cumplen las condiciones
        SELECT * FROM promociones
        WHERE id_cupon = cuponId
          AND fecha_inicio <= CURRENT_TIMESTAMP
          AND fecha_expira >= CURRENT_TIMESTAMP;
    ELSE
        -- Si no se cumple, devolver un mensaje de error
        SELECT 'El cupón no existe, está inactivo o ha expirado.' AS ErrorMessage;
    END IF;
END$$

DELIMITER ;







