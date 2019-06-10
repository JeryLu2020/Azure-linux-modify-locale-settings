# Azure build-in Linux images modify locale settings

based on:
https://github.com/Azure-App-Service/php/tree/master/7.0-apache

### Step1: Create file named “locale” and put it under /home/site/wwwroot/
#### locale
```
    LANGUAGE="pt_PT.UTF-8"
    LANG="pt_PT..UTF-8"
    LC_ALL="pt_PT..UTF-8"
```

### Step2: Create start.sh and put it under /home/site/wwwroot/
#### start.sh
```
    #!/bin/bash
    echo "in custom start"
    apt-get install -y locales locales-all

    cp /home/site/wwwroot/locale /etc/default/locale
    locale-gen pt_PT.UTF-8
    dpkg-reconfigure -f noninteractive locales

    echo "start apache2ctl"
    /usr/sbin/apache2ctl -D FOREGROUND
```


### Step3: Test with index.php
#### index.php
```
    <?php

    echo "change locale...";
    $currentlocale = setlocale(LC_ALL,"pt_PT.UTF-8");
    echo "<br> locale changed to <br>".$currentlocale;

    $currentlocale2 = setlocale(LC_ALL,0);
    echo "<br> locale changed to <br>".$currentlocale2;
```

### result:
```
    change locale...
    locale changed to 
    pt_PT.UTF-8
    locale changed to 
    pt_PT.UTF-8
```