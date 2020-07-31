---
title: Deployment
description: This page explains everything related to the deployment, server requirments, how to deploy using FTP etc.
extends: _layouts.documentation
section: content
---

## Deployment

The website is hosted at DUCC's servers. We requested a sub domain on exisitng `cs.du.ac.in` domain and hosting services from DUCC to help deployment of our application.

Here is the List of Services received from DUCC:

- A Subdomain office.cs.du.ac.in with a shared hosting server space.
- A cPanel to manage our server (databases, ftp users, etc)
- SFTP Access to server directory.
- Access to phpMyAdmin to manage our server database.

Thanks to **Miss. Seema Sirpal** who helped us getting the hosting services from DUCC.

To begin with deployment we need to first prepare the application locally and then deploy it to the server.

### 1. Prepare Application Locally
Before you can upload the application to server using FTP, you need to prepare our application for production on our local system. Our task here is to get the application running in production mode so that we can upload the application as it is to the FTP server.

To begin with, make sure you have all the prerequisites installed on your system as mentioned in the projecct's [readme](https://github.com/ducs-office/ducs-office-automation/blob/master/readme.md#installing-prerequisites). 

> **Tip:** We advise you to begin with a freshly cloned application in a seperate director rather than using the same version you are using for development, to avoid wierd issues that may occur due to mismatched/overwritten files.

Steps **4-6** are required *only* if there is a change in database.

1. **Install Dependencies**: After a fresh clone you'd need to install all the JS & PHP dependencies. To install dependecies run the following one by one.
    ```
    npm install
    composer install
    ```
2. **Build JS/CSS Assets for production**: To build assets you'd simply run `npm run production`.
3. **Configure Environment Variables**: Duplicate the example `.env.example` file to `.env` and then generate application key using `php artisan key:generate`. You won't need to change any other variables just yet.
4. **Cache compiled views**: Cache the compiled views using `php artisan view:cache`. This will compile and cache all the views to `storage/framework/views`, you will need to upload this directory to the server so our application in production wont need to compile the views on the fly, resulting in a performance improvement.
4. **Create fresh local database**: Create a fresh database (say `ducs_prod`) in your local mysql instance. 

    Then, export the existing records from the production database on the server using phpMyAdmin, to a `.sql` file, and import this `.sql` file to your local database using phpMyAdmin/adminer on your local system.
5. **Configure Database & Run Migrations**: Change environment variables according to the database created and Run migrations using `php artisan migrate`.
6. **Export Database to .sql file**: Using adminer/phpMyAdmin UI you can export the whole database (with all data and structure) to a .sql file. Store .sql somewhere in your system, you would need this to export the modified database structure to the server.

> **Caution:** Avoid changing the structure of existing tables, that may cause data loss, if you didn't write migrations properly to map existing data to new structure. It is advised to make sure there is no data loss at this point, and only after that proceed further.

### 2. Upload to Server Directory
Once we have the application's production build ready, we can now proceed to upload the files to the server, after some cleanup.

1. **Cleanup existing files**: Remove everything from the server except the following files/directories:
    - `.env` -  you'd only change this file only if required.
    - `storage/app` - this folder contains uploaded files you dont want to remove those.
    - `storage/framework/cache` - this folder contains the cache data some of which might be important.
    - `vendor` (you'd need to remove this folder and upload again if you have updated/added new PHP dependencies)
2. **Copy files**: We would copy the application file in few steps.
    - First, copy all the files/directories in the root to the server directory except `node_modules`, `.env`, `tests`, and `storage`.
    - Next, You'd copy the compiled views to the server, by copying `storage/framework/views` to the server with same directory structure.
3. **Export database**: Logon to sever's phpMyAdmin and import the `.sql` file that you export in the step 1.7. You can ignore this step if you have made no changes to the database.
4. **Turn on/off Debug mode**: You might want to switch to debug mode if the application doesn't seem to work on production and debug the problems. Set `APP_DEBUG=true` and `APP_ENV=local`. Make sure your turn off debug mode and set the `APP_ENV` back to `production`, once you are done with deployment.
