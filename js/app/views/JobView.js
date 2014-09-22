/*global Backbone, jQuery, _, ENTER_KEY */
var App = App || {};

(function ($) {
    'use strict';
    
    // Job View
    // --------

    // A JobView knows how to display a single contact
    App.JobView = Backbone.View.extend({
        tagName: "article",

        className: "job-container clearfix padv-sm fineb-light",

        template: $("#jobTemplate").html(),
        
        render: function() {
            var temp = _.template(this.template);
            
            this.$el.html(temp(this.model.toJSON()));
            return this;    
        },
        
        noResults: function() {
            this.$el.html('<p class="t-xl t-gray tcenter">No jobs to display.</p>');
            return this;
        }
    })

})(jQuery);