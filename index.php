<?php

echo "change locale...";
$currentlocale = setlocale(LC_ALL,"pt_PT.UTF-8");
echo "<br> locale changed to <br>".$currentlocale;

phpinfo();