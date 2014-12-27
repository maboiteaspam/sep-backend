SEP-backend
---

Simple Et Pratique backend starter for a Simple And Practical website.

Try it out !
---
get you a VM on https://koding.com/

clone the git
```
git clone https://github.com/maboiteaspam/sep-backend
```

install php composer package manager
```
curl -sS https://getcomposer.org/installer | php
```

install sqlite
```
sudo apt-get update && sudo apt-get install php5-sqlite     
```

setup the database
```
bin/db.sh
```

run the demo backend
```
bin/backend.sh
```

browse the backend
```
http://[hash provided by koding].[username].koding.io:8000/login
```

Login with admin:admin

To add new entities, check out
```
https://github.com/maboiteaspam/Sep/tree/master/db/Models
https://github.com/maboiteaspam/Sep/tree/master/db/Fixtures
https://github.com/maboiteaspam/Sep/tree/master/backend/view_models
```

Push your owns, overwrite existing entities into project folders
```
backend/view_models
db/Models
db/Fixtures
```

Do various stuff with your database with
```
bin/schema_db.sh
bin/fixtures_db.sh
bin/dump.sh
bin/db.sh
```

Add more tests via Codeception
