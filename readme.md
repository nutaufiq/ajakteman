#OLX Ajak Teman V2

##Laravel 5.4

Server requirements:

- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

##Folder Permission

Set folder permission:

- sudo chmod -R gu+w storage
- sudo chmod -R guo+w storage
- sudo chmod -R gu+w bootstrap/cache/
- sudo chmod -R guo+w bootstrap/cache/
- sudo chmod -R gu+w images/uploads/
- sudo chmod -R guo+w images/uploads/

##Config

Update .env for production:

- DB_DATABASE=dbname
- DB_USERNAME=dbusername
- DB_PASSWORD=dbpassword
- MAIL_HOST=mailhost
- MAIL_PORT=mailpost
- MAIL_USERNAME=mailusername
- MAIL_PASSWORD=mailpassword
- MAIL_FROM_ADDRESS=mailfromaddress
- MAIL_FROM_NAME=mailfromname
- API_HOST=apihost
- CLIENT_ID=clientid
- CLIENT_SECRET=clientsecret
- PARTNER_ID=partnerid
- PARTNER_CODE=partnercode
- PARTNER_SECRET=partnersecret
- SOCIAL_CLIENT_ID=socialclientid
- SOCIAL_CLIENT_SECRET=socialclientsecret

##Database Migration

Create Table:

- php artisan migrate
- php artisan db:seed --class=AdminsTableSeeder
