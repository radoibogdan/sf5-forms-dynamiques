set php to 7.x
composer install
create db dans mysql workbench or
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
symfony serve -d
Connect with any user 
    id : email (chose one from db)
    mdp : azerty

Tuto files :
Form/AnnoncesType.php
Form/RegionsType.php
JAVASCRIPT => templates/users/annonces/ajout.html.twig
JAVASCRIPT => templates/admin/regions/ajout.html.twig