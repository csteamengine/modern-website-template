## Modern Website Template

![Tests](https://github.com/csteamengine/modern-website-template/workflows/Tests/badge.svg?branch=master)
<br/>
![GitHub stars](https://img.shields.io/github/stars/csteamengine/modern-website-template.svg?style=social)

### Demo Credentials

**Admin:** admin@admin.com  
**Password:** secret

**User:** user@user.com  
**Password:** secret

### Official Documentation
This is a branch off of the popular Laravel Boilerplate.

[Click here for the official documentation](http://laravel-boilerplate.com)

### Slack Channel

No Slack Channel as of right now.

### Introduction

I have been a fan of the Laravel Boilerplate for a long time now, and after leaving the web development game for several 
years, I came back to a drastically changed laravel boilerplate. I decided to take this opportunity to utilize the new features
and functionality added by creating a portfolio website from scratch. This site is setup to be as generic as possible, 
so anybody could spin it up quickly. 

Since users of this repository will likely want different styles and layouts, I wanted to leave that up to each individual.
For now, the site is setup to provide projects, jobs, links, etc... to each view and all you need to do is add html/css. 

I'm hoping to update this documentation further as the project progresses, so make sure to keep an eye out here.

For now, enjoy!

### Overview
This project was build with Laravel and Homestead, based on the [Laravel Boilerplate](http://laravel-boilerplate.com). 
The main idea was to build a CMS site (minus eCommerce) that I could use to build up portfolio websites quickly for myself, 
my friends and family. If you are interested in utilizing this site, please feel free! All that should be needed is the 
CSS on the frontend. All the views, routes, models and data are handled and passed to the correct locations, they just need 
displayed in the way that you see fit.

### Setup
* Clone the repository
    ```shell
    git clone https://github.com/csteamengine/modern-website-template.git
    ```
* Configure .env file
  * Copy .env.example to .env
  * Update values to match your app name, server, etc...
  * You'll also need to update the MySQL server IP to your Homestead IP, and the database to the homestead database you configure later.
    * For me the IP was `192.168.10.10` and for testing my database is `template` 
  ```shell
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
  ```
  * Configure the default administrator account in the .env file.
    * This will be used when seeding the database
  ```shell
    ADMIN_FIRST_NAME=
    ADMIN_LAST_NAME=
    ADMIN_EMAIL=
    ADMIN_PASSWORD=
  ```
* Run Composer Install
    ```shell
    cd modern-website-template
    composer install
    ```
* Install NPM/Yarn dependencies (I recommend Yarn)
    ```shell
    npm install
    -- OR --
    yarn
    ```
* Configure Homestead (Optional, if you choose to develop on Homestead)
  * [Get started with Laravel Homestead](https://laravel.com/docs/8.x/homestead)
  * Boot up Homestead (instructions based on my Mac, your homestead directory may be in a different location.)
    ```shell
    cd ~/Homestead
    vagrant up --provision
    ```
  * Next, use the IP of Homestead for your database connection in the `.env` file.
* Generate Application Key
    ```shell
    php artisan key:generate
    ```
* Migrate databases
    ```shell
    php artisan migrate --seed
    ```
* Generate Styles and Scripts with Webpack
    ```shell
    npm run watch
    ```
* Link `storage`, this needs to be run from within the vagran VM is you are using Homestead (works best by my experience.)
  
    ```shell
    cd ~/Homestead
    vagrant ssh
    cd code/<project repo>/
    php artisan link:storage
    ```
* Go for a spin!
  * You should now be able to visit `homestead.<your app>` in a browser.
  * The site should be entirely setup to function as a portfolio website, all you will need to do is give some styling
    to the front end.
  * If you want to run this application as a production website, you'll need to create a real admin user and delete the test users.
    

### Functionality
This template currently supports the following:
* Fully functional user management (login/register/etc...)
* Admin Portal for managing the following
    * Users
    * Roles
    * Projects
    * Positions (as in previous/current jobs)
    * Links (form implementing your own linktree)
    * Themes
        * Themes can be thought of as the basic website settings. Only one theme can be active at a time.
        * The Active theme can control maintenance mode, resume download, about page info, contact form submission and contact email.
    * Logs
        * Admin users can view error logs.


### Setup
#### Analytics
* To get Google Analytics setup, login to the [Google Anaylytics](https://analytics.google.com/)
* Click on the Admin button on the bottom left
* Create a new Account
* Create a new Property (This is the website you want to track)
* Once you have created a property, click on *Setup Assistant* in the property 
* Click *Tag Installation* and copy the *Measurement ID* from the Web Stream Details
* Paste the Measurement ID into the .env file next to GOOGLE_ANALYTICS_ID and set GOOGLE_ANALYTICS_ACTIVE to true
* Google Anayltics should now be tracked and can be viewed on the Google Analytics console.
### Issues

If you come across any issues please [report them here](https://github.com/csteamengine/modern-website-template/issues).
