<?php

$sql_pagos2 = "SELECT * FROM pagos where estado = '1' and estudiante_id = '$id_estudiante' and id_pago ='$id_pago' ";
$query_pagos2 = $pdo->prepare($sql_pagos2);
$query_pagos2->execute();
$pagos2 = $query_pagos2->fetchAll(PDO::FETCH_ASSOC);
