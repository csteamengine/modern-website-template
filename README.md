## Modern Website Template

![Tests](https://github.com/csteamengine/modern-website-template/workflows/Tests/badge.svg?branch=master)
<br/>
![GitHub contributors](https://img.shields.io/github/contributors/csteamengine/modern-website-template.svg)
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
