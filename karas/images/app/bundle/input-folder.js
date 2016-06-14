/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__vue_script__ = __webpack_require__(9)
	if (__vue_script__ &&
	    __vue_script__.__esModule &&
	    Object.keys(__vue_script__).length > 1) {
	  console.warn("[vue-loader] app\\components\\input-folder.vue: named exports in *.vue files are ignored.")}
	__vue_template__ = __webpack_require__(10)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) {
	(typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports).template = __vue_template__
	}
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "C:\\RootProjects\\pagekit-fondmdl\\packages\\karas\\images\\app\\components\\input-folder.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },

/***/ 9:
/***/ function(module, exports) {

	'use strict';

	module.exports = {

	    props: ['folder', 'class'],

	    data: function data() {
	        return $pagekit;
	    },

	    methods: {

	        pick: function pick() {
	            this.$refs.modal.open();
	        },

	        select: function select() {
	            this.folder = this.$refs.finder.getSelected()[0];
	            this.$dispatch('folder-selected', this.folder);
	            this.$refs.finder.removeSelection();
	            this.$refs.modal.close();
	        },

	        remove: function remove(e) {
	            e.stopPropagation();
	            this.folder = '';
	        },

	        hasSelection: function hasSelection() {
	            var selected = this.$refs.finder.getSelected();
	            return selected.length === 1 && !selected[0].match(/\.(.+)$/i);
	        }

	    }

	};

	Vue.component('input-folder', function (resolve, reject) {
	    Vue.asset({
	        js: ['app/assets/uikit/js/components/upload.min.js', 'app/system/modules/finder/app/bundle/panel-finder.js']
	    }).then(function () {
	        resolve(module.exports);
	    });
	});

/***/ },

/***/ 10:
/***/ function(module, exports) {

	module.exports = "\n\n<div @click=\"pick\" :class=\"class\">\n    <ul class=\"uk-float-right uk-subnav pk-subnav-icon\">\n        <li><a class=\"pk-icon-delete pk-icon-hover\" :title=\"'Delete' | trans\"\n               data-uk-tooltip=\"{delay: 500, 'pos': 'left'}\" @click=\"remove\"></a></li>\n    </ul>\n    <a class=\"pk-icon-folder-circle uk-margin-right\"></a>\n    <a v-if=\"!folder\" class=\"uk-text-muted\">{{ 'Select folder' | trans }}</a>\n    <a v-else>{{ folder }}</a>\n</div>\n\n<v-modal v-ref:modal large>\n\n    <panel-finder :root=\"storage\" v-ref:finder modal></panel-finder>\n\n    <div class=\"uk-modal-footer uk-text-right\">\n        <button class=\"uk-button uk-button-link uk-modal-close\" type=\"button\">{{ 'Cancel' | trans }}</button>\n        <button class=\"uk-button uk-button-primary\" type=\"button\" :disabled=\"!hasSelection()\" @click=\"select()\">{{ 'Select' | trans }}</button>\n    </div>\n\n</v-modal>\n\n";

/***/ }

/******/ });