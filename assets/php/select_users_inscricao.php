<?php
$select_view_users = "
SELECT 
usuario.email AS `pessoa_email`,
usuario.email_responsavel AS `email_responsavel`,
usuario.data_insert AS `data`,
usuario.arquivo AS `arquivo`
FROM usuario
";