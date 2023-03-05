-- Consulta 1: Nom i cognoms de tots els usuaris ordenats per cognoms (6 registres) 

SELECT nombre, apellidos FROM usuarios ORDER BY apellidos;
-- Consulta 2: Número total d’usuaris amb el email sense informar (2)
SELECT COUNT(*) AS usuarios FROM `usuarios` WHERE email IS NULL;

-- Consulta 3: Usuaris on la segona lletra del seu cognom sigui la lletra 'a' (2 registres)
SELECT * FROM usuarios WHERE apellidos LIKE '_a%';

-- Consulta 4: Nom i cognoms dels usuaris que han enviat comentaris. Hauria de sortir una fila per cada usuari diferent (4 registres o 7 registres sense agrupar)
SELECT usuarios.nombre, usuarios.apellidos, usuarios.idusuario FROM usuarios, comentarios WHERE usuarios.idusuario = comentarios.idusuario;

-- Consulta 5: Nom i cognoms dels usuaris que no han enviat cap comentari (2 registres)

SELECT usuarios.nombre, usuarios.apellidos, usuarios.idusuario FROM comentarios RIGHT JOIN usuarios on usuarios.idusuario = comentarios.idusuario WHERE comentarios.idusuario IS NULL;
-- Consulta 6: Accedir per la taula usuaris per tal d'obtenir els comentaris que no pertanyen a cap usuari (1 registre)

SELECT idcomentario, comentario FROM comentarios WHERE idusuario is null;
-- Consulta 7: Nom, cognoms i numero de comentaris enviats per cadascú dels usuaris (4 registres)
SELECT usuarios.nombre, usuarios.apellidos, COUNT(comentarios.comentario) AS total_comentarios FROM usuarios, comentarios WHERE usuarios.idusuario = comentarios.idusuario GROUP BY usuarios.nombre;

