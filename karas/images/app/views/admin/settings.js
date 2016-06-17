module.exports = {

    el: '#settings',

    data: function () {
        return window.$data;
    },

    methods: {

        created: function created() {
            this.$on('folder-selected', function (folder) {
                console.log('folder selected' + folder);
            })
        },


        save: function () {
            this.$http.post('admin/system/settings/config', {name: 'images', config: this.config}).then(function () {
                    this.$notify('Settings saved.');
                }, function (data) {
                    this.$notify(data, 'danger');
                }
            );
        }

    },


};

Vue.ready(module.exports);
