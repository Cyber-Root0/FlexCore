<?php

$app->map(['GET','POST'],'/',[\FlexCore\controller\home\Home::class, 'index']);