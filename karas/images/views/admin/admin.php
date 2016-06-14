<?php
/**
 * Date: 5/16/2016 5:14 AM
 * Filename: ${FILE_NAME}
 * @var $view \Pagekit\View\View;
 * @var $params array
 * @var $app \Pagekit\Application
 * @var $this \Pagekit\View\PhpEngine
 * @var $intl \Pagekit\Intl\IntlModule
 * @var $theme \Pagekit\Module\Module
 */ ?><?php $view->style('comment-index', 'images:assets/css/images.admin.css') ?>
<?php // $view->script('image-settings', 'images:app/bundle/settings.js', 'vue') ?>
<h1>Выбор картинок</h1>
<div id="imaginarium">
    <div data-uk-margin="" class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap">
        <div data-uk-margin="">

            <p class="uk-margin-remove">Кликните по картинкам, которые хотите видеть в галерее, после этого нажмите сохранить</p>

        </div>
        <div data-uk-margin="">

            <button class="uk-button uk-button-primary" @click.prevent="save">Сохранить</button>
            <button class="uk-button uk-button-primary" @click.prevent="clearConfigGallery">Очистить кэш фото</button>

        </div>
    </div>
    <div class="uk-block uk-block-primary">
    <ul id="imagine" class="uk-thumbnav">
        <li v-for="image in images" track-by="filename" v-bind:class="{ 'checked': image.checked }">
            <div class="img" v-bind:class="{ 'checked': image.checked }">

                <img class="uk-thumbnail" v-bind:src="'/'+ image.url_cached" v-bind:width="config.sizes.width" @click="checkImage(image,$event)"/>
            </div>
            <div class="uk-thumbnail-caption">{{image.filename}}</div>
        </li>
    </ul>
    </div>
    <pre>
        {{ config | json }}
    </pre>
    <pre>
        {{ images | json }}
    </pre>



</div>
<script>
    var vvv = new Vue({
        el: '#imaginarium',
        data: $data,
        events: {
            'hook:init': function () {
                console.log('Init VUE', this, window);
            }
        },

        methods: {
            checkImage: function (image, event) {

                var checked = image.checked;

                image.checked = checked ? false : true;
                this.config.gallery = _.filter(this.images, function (obj) {
                    return obj.checked;
                });



               // var kkk = image.filename;
               // var newObject = {kkk : image };

              //  var newObjects = {};

                /*var newImages = _.forEach(this.images, function(value) {
                    if (value.checked == true) {
                        return value;
                    }

                });*//* {
                    if (obj.checked) {
                        newObjects[key]=obj;
                    }
                });*/

               // console.log(newImages);

                //this.config.gallery = newObjects;

                if (checked==false) {


                 //   this.config.gallery.$remove();

                }

                /*this.config.gallery = this.images.filter(function(obj) {
                 return obj.checked;
                 });*/


            },

            clearConfigGallery: function () {
                //this.config.gallery = [];
                this.$http.post('/api/images/cleanConfigGallery', {
                    }).then(function (response) {
                        this.$notify('Кэш фото очищен.');

                   // this.config.gallery = response.data.currentConfig.gallery;

                   // this.images = this.images.file

                    //console.log();


                    }, function (data) {
                        this.$notify(data, 'danger');
                    }
                );
            },

            save: function () {

                var newImages = _.filter(this.images, function (obj) {
                    return obj.checked;
                });

                this.clearConfigGallery();
                this.config.gallery = newImages;


                this.$http.post('admin/system/settings/config', {
                    name: 'images',
                    config: this.config
                }).then(function () {
                        this.$notify('Фотографии сохранены.');
                    }, function (data) {
                        this.$notify(data, 'danger');
                    }
                );
            }


        }

    });

</script>

