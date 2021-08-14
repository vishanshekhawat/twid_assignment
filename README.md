# Twid Assignment

You need to create an API calls to perform the following functionalities-
1. Fetch the data from the following URL - "http://data.gov.in/sites/default/files/all_india_pin_code.csv" and save it in MySql.

2. Create a migration file to create the table.

3. Create an GET API for to fetch data from DB with pagination. Display the data in a simple UI.

![image](https://user-images.githubusercontent.com/15993389/129461406-29a5921f-d2b2-446b-b349-05a2d6c26f71.png)


## To Import Data

Direct From Url : BASE_URL + /import_from_url
Uplaod File : BASE_URL + /import
Listing : BASE_URL + /pincodes

## Migration And Queue
For Migration :  Php artisan Migrate
For Run Job :  php artisan queue:work





