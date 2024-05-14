<?php
$select_view_users = "
SELECT 
usuario.nome AS `nome`,
usuario.email AS `email`,
usuario.azul As `azul`, 
usuario.laranja AS `laranja`,
usuario.vermelho AS `vermelho`,
usuario.roxo AS `roxo`,
usuario.verde AS `verde`,
usuario.tempo AS `tempo`,
usuario.data_insert AS `data`
FROM usuario
ORDER BY 
usuario.roxo = 2 DESC, 
usuario.vermelho = 3 DESC, 
usuario.verde = 5 DESC, 
usuario.laranja = 2 DESC,
usuario.azul = 4 DESC

";