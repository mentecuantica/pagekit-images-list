# Images extension #


You select the folder, all images from there are now accessible to be shown in gallery. 
Thumbs sizes are configured, it generates thumbnails on the fly (and cache it) and have a widget to output it

With the help of  

    jQuery FlexSlider v2.6.1 Copyright 2012 WooThemes
    Magnific Popup - v1.1.0 - 2016-02-20
    * http://dimsemenov.com/plugins/magnific-popup/
    * Copyright (c) 2016 Dmitry Semenov; */

It's not production ready, and can be buggy. Still it can get you an idea or some base how to implement some things in Pagekit.

I took hints and class from  [https://github.com/Bixie/pagekit-portfolio](https://github.com/Bixie/pagekit-portfolio "Bixie/pagekit-portfolio")

So with all due respect and rights few things or ideas are belongs to Bixie.

## How to install works ##

You can download the extension  zip file 


### My 10 rubles about Pagekit experience. ###

Pagekit is a sweet piece of gift wrapping pretty ideas and UI, with pretty complicated components and 
architecture. Keep in mind that i am not a good friend of Symfony components, and yet have some experience.
I am more into Laravel, cause it's understandable. 

Also using such kind of DI container in Pagekit appeared that autocomplete is basically ruined in IDE like PHPSTORM,
and no helpers available at the moment.

Other thing to mention - all your project kept in public web server folder. 

My knowledge of Vue.js is pretty basic, but it's a nice framework, which worth at least try some basics of it.

Well i will try to avoid Pagekit as the CMS of choice, it reminds me of October CMS - when you dig deeper. May be i am stupid )

It's just my opinon 

## Extension dev process

Files composer.json and index.php are basics

# composer.json #
```
{
    "name": "karas/images",
    "module": "karas/images",
    "type": "pagekit-extension",
    "version": "0.0.1",
    "title": "Images Extension",
    "description": "A blueprint to develop your own extension",
    "license": "MIT",
    "authors": [
        {
            "name": "Yuri Efimov",
            "email": "yura.karas@gmail.com",
            "homepage": "http://letcrew.com"
        }
    ],



    "extra": {
       "icon": "icon.svg",
        "scripts": "scripts.php"
    },
    "archive": {
        "exclude": ["node_modules", "!/app"]
    }

}
```

Follow the **"type": "pagekit-extension",** 
and values of     

1. "name": "karas/images",
1. "module": "karas/images",

### index.php ###

Whole config, description and meta data about extension or theme.



### Database structure ###

Each theme, or extension will appear in ** system_config ** table.

- id
- name
- value

**Name field**

Example *bixie/portfolio*  

**Value field**

Contains JSON config in text.

Can be anything

    {"admin":{"locale":"ru_RU"},"site":{"locale":"ru_RU","theme":"theme-fond"},"version":"1.0.3","packages":{"blog":"1.0.1","theme-one":"1.0.0","theme-custom":"0.0.2","karas\/items":"0.0.1","theme-fond":"0.0.1","tinymce":"1.0.2"},"extensions":{"0":"blog","2":"tinymce"}}


### scripts.php ###

Usually used as DB migrations, or things to do on 

- install
- uninstall
- updates