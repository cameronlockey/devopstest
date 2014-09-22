/*global Backbone, jQuery, _, ENTER_KEY */
var App = App || {};

(function ($) {
	'use strict';
	
	// A JobListView knows how to display a list of Jobs (A JobList) automatically
    App.JobListView = Backbone.View.extend({
        el: $('#jobs'),
        container: $('#jobs-container'),
        
        // Init the jobs list as a JobList object
        // Render the JobList
        initialize: function() {

            this.collection = $.extend( {}, App.Jobs) // instantiate a copy of App.Jobs
            this.status = 1
            this.keywords = ""
            this.search()
            this.render()
            
            this.on("change:status", this.search, this)
            this.collection.on("reset", this.render, this)
        },
        
        events: {
            "click #filter button": "setFilter",
            "change:status": "filterByStatus",
            "keyup #search": "search"
        },
        
        // Loop over the models (jobs) in the JobList
        // Call a method to append each job to el
        render: function() {
            this.$el.find('article').remove()
            var that = this
            if (this.collection.length > 0) {
                _.each(this.collection.models, function (item) {
                    that.renderJob(item)
                }, this)
            } else {
                var jobView = new App.JobView()
                this.container.append(jobView.noResults().el)
            }
            
        },
        
        // Append the current model in the collection to el during its turn in the loop
        // el is the property that got the html from the temlpate, so return that to .append()
        renderJob: function (item) {
            var jobView = new App.JobView({
                model: item
            })
            this.container.append(jobView.render().el)
        },
        
        setFilter: function(e) {
            var $target = $(e.currentTarget)
            $target.addClass('active').siblings().removeClass('active')
            this.status = $target.data('status')
            this.trigger("change:status")
        },
        
        search: function(e) {
            this.keywords = $('#search').val() // set keywords
            this.collection.reset(App.Jobs.models, { silent : true }) // reset collection 
            var pattern = new RegExp(this.keywords, 'ig'),
                keywords = this.keywords,
                status = this.status,
                filtered = _.filter(this.collection.models, function (item) {                 
                return  (item.get("Job.title").match(pattern) || 
                        item.get("Job.city").match(pattern) ||
                        item.get("Job.state").match(pattern)) &&
                        item.get("Job.active") == status 
            })
            
            this.collection.reset(filtered)
        }
    })
})(jQuery);