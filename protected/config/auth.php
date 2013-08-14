<?php

return array(

  // roles
  'guest' => array(
    'type'        => CAuthItem::TYPE_ROLE,
    'description' => 'Guest',
    'bizRule'     => null,
    'data'        => null),
  
  User::ROLE_VOICE => array(
    'type'        => CAuthItem::TYPE_ROLE,
    'description' => 'Voice',
    'children'    => array('guest'),
    'bizRule'     => null,
    'data'        => null
  ),

  User::ROLE_ADMINISTRATOR => array(
    'type'        => CAuthItem::TYPE_ROLE,
    'children'    => array(User::ROLE_MEMBER),
    'description' => 'Admin',
    'bizRule'     => null,
    'data'        => null),
);