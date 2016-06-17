module.exports = [

    {
        entry: {
            "settings": "./app/views/admin/settings.js",
            "image": "./app/components/image.vue",
            "image-settings": "./app/components/image-settings.vue",
            "input-folder": "./app/components/input-folder.vue"
        },
        output: {
            filename: "./app/bundle/[name].js"
        },
        externals: {
            "lodash": "_",
            "jquery": "jQuery",
            "uikit": "UIkit",
            "vue": "Vue"
        },
        module: {
            loaders: [
                { test: /\.vue$/, loader: "vue" }
            ]
        }
    }

];
