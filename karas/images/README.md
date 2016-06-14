# Images extension #

Can upload images, resize it, create thumbnails on the fly (and cache it) and have a widget to output it

It's not production ready, and even buggy. Still it can get you an idea or some base how to implement some things in Pagekit.

I took hints and class from  [https://github.com/Bixie/pagekit-portfolio](https://github.com/Bixie/pagekit-portfolio "Bixie/pagekit-portfolio")

So with all due respect and rights few things belongs to Bixie.

My knowledge of Vue.js is pretty basic. So thats kind of the root of issues.


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