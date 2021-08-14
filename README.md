# Twid Assignment

You need to create an API calls to perform the following functionalities-
1. Fetch the data from the following URL - "http://data.gov.in/sites/default/files/all_india_pin_code.csv" and save it in MySql.

2. Create a migration file to create the table.

3. Create an GET API for to fetch data from DB with pagination. Display the data in a simple UI.



## To Import Data

1. Direct From Url : BASE_URL + /import_from_url
2. Uplaod File : BASE_URL + /import
3. Listing : BASE_URL + /pincodes

## Migration And Queue
1. For Migration :  Php artisan Migrate
2. For Run Job :  php artisan queue:work





