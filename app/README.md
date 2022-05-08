path to API http://localhost:8080/api


Build container 
~~~
sudo docker-compose up -d --build
~~~

Run container php

~~~
sudo docker-compose exec php /bin/bash
~~~

Access to db 
~~~
docker-compose exec database /bin/bash
~~~

Run Migration

~~~
symfony console doctrine:migrations:migrate
~~~

If need restart migration

~~~
symfony console doctrine:migrations:migrate first
~~~

Load fixture
~~~
symfony console doctrine:fixtures:load
~~~


