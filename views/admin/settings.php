<?php $view->style('comment-index', 'images:assets/css/images.admin.css') ?>
<?php $view->script('input-folder', 'images:app/bundle/input-folder.js', 'vue') ?>
<?php  $view->script('image-settings', 'images:app/bundle/settings.js', 'vue') ?>

<div id="settings" class="uk-form uk-form-horizontal" v-cloak>

    <div class="uk-grid pk-grid-large" data-uk-grid-margin>
        <div class="pk-width-sidebar">

            <div class="uk-panel">

                <ul class="uk-nav uk-nav-side pk-nav-large" data-uk-tab="{ connect: '#tab-content' }">
                    <li><a><i class="pk-icon-large-settings uk-margin-right"></i> {{ 'General' | trans }}</a></li>
                </ul>

            </div>

        </div>
        <div class="pk-width-content">

            <ul id="tab-content" class="uk-switcher uk-margin">
                <li>
                    <div class="uk-margin-large-top uk-form-horizontal uk-panel uk-panel-box">
                        <div class="uk-form-row">
                            <p class="uk-alert">Выберите папку в которую будете загружать картинки для галереи</p>
                            <p class="uk-alert uk-alert-success">Затем в разделе Фотографии надо выбрать картинки которые вы хотите отображать в галерее</p>
                            <label class="uk-form-label">{{ 'Папка с картинками для галереи' | trans }}</label>

                            <div class="uk-form-controls">
                                <ul class="uk-float-right uk-subnav pk-subnav-icon">
                                    <li><a class="uk-icon-info pk-icon-hover" data-uk-modal="{target:'#folder-help'}"></a></li>
                                </ul>
                                <input-folder :folder="config.folder" class="uk-width-medium-1-2"></input-folder>
                            </div>
                        </div>
                    </div>

                    <div class="uk-form-controls uk-form-controls-text">
                        <h4>Размеры превьюшек (маленьких изображений)</h4>
                        <p class="uk-form-controls-condensed">
                            <label><input type="number" v-model="config.sizes.width"> {{ 'Width' | trans }}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <input type="number" v-model="config.sizes.height"> {{ 'Height' | trans }}
                        </p>
                    </div>



                    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
                        <div data-uk-margin>

                            <h2 class="uk-margin-remove">{{ 'General' | trans }}</h2>

                        </div>
                        <div data-uk-margin>

                            <button class="uk-button uk-button-primary" @click.prevent="save">{{ 'Save' | trans }}</button>

                        </div>
                    </div>



                </li>
                <li>

                    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
                        <div data-uk-margin>

                            <h2 class="uk-margin-remove">{{ 'Comments' | trans }}</h2>

                        </div>
                        <div data-uk-margin>

                            <button class="uk-button uk-button-primary" @click.prevent="save">{{ 'Save' | trans }}</button>

                        </div>
                    </div>




                </li>
            </ul>

        </div>
    </div>

</div>
