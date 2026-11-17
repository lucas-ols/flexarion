<?php
use App\Tags\{Alert,Button,Form,Input,Layout,Link,Hypertext,Paragraph,Title,Container};

/**
 * @param array $loggedUser
 */

echo (new Layout('Contact',isset($loggedUser),[
    new Container('div',[ new Title(
        1,['Contact'])],''),
]))->render();