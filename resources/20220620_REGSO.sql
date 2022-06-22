-- CONNECTION: url=jdbc:mysql://localhost:3306/
-- New script in localhost.
-- Date: 06/20/2022
-- Time: 11:00:08 a. m.

SELECT 
tv.nomb_medicamento, 
count(tv.idt_vale) as cantidad, 
( SELECT COUNT(idt_vale) from t_vale WHERE estado = 1 AND cod_medicamento  = tv.cod_medicamento) as sin_redimir, ( SELECT COUNT(idt_vale) from t_vale WHERE estado in(2, 3, 4) AND cod_medicamento  = tv.cod_medicamento) as redimidos, 
( SELECT COUNT(idt_vale) from t_vale WHERE estado = 5 AND cod_medicamento = tv.cod_medicamento) as vencidos, sum(tv.valor_estimado) as costo,
sum(tv.cantidad) as cantidad_pildoras 
FROM t_vale tv 
LEFT JOIN t_unidad tu ON tu.id = tv.id_uni_ejecutora 
WHERE tv.estado IN (2, 3, 4) 
GROUP BY tv.nomb_medicamento;