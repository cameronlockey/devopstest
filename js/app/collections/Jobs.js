/*global Backbone, jQuery, _, ENTER_KEY */
var App = App || {};

(function ($) {
    'use strict';
    
    // Job Collection
    // --------------
    
    var Jobs = Backbone.Collection.extend({
        model: App.Job
    })
    
    // Create our global collection of Jobs
    App.Jobs = new Jobs();

})(jQuery);