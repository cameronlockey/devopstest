/*global $ */
var App = App || {};
var ENTER_KEY = 13;
var ESC_KEY = 27;

$(function () {
	'use strict';

    // load in apps
    new App.JobListView();
    new App.PlanSelectorView();
});