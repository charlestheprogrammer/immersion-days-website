if [ -z "$1" ]
then
    echo "Missing argument here"
else
    mkdir "/var/www/html/immersion/users/$1"
    cd "/var/www/html/immersion/users/$1"
    cp /var/www/html/immersion/draganddrop.php index.php
    echo "Good";
fi