 <?php
// update_user.php <id> <role>
require_once "bootstrap.php";

$id = $argv[1];
$newRole = $argv[2];

$user = $entityManager->find('User', $id);
$user->addRole($newRole);

$entityManager->flush();