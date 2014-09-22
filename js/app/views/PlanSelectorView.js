/*global Backbone, jQuery, _, ENTER_KEY */
var App = App || {};

(function ($) {
	'use strict';
	
    App.PlanSelectorView = Backbone.View.extend({
        debug: 0,
        
        el: $('.plan-selector'),
        
        subscription: {
            slots: 1,
            blasts: 1,
            frequency: 1,
            price: 394,
            slot_price: 325,
            blast_price: 69,
            tier_id: 0
        },
        
        months: {
            1 : 1,
            2 : 2,
            3 : 3,
            6 : 4,
            12 : 5
        },
        
        tiers: {
            1 : 0,
            2 : 1,
            3 : 2,
            4 : 3,
            5 : 4,
            6 : 5,
            8 : 6,
            9 : 7,
            10: 8,
            12: 9,
            15: 10
        },
        
        blast_prices: {
            0 : 0,
            1 : 69,
            2 : 49
        },
        
        base_slot_price: 325,
        decay : 0.92,
        
        // Init the plan selector
        initialize: function() {
            this.render()
        },
        
        render: function() {
            // render correct c2h word
            var c2hText = (this.subscription.blasts > 1 || this.subscription.blasts == 0) ? 'Connect2Hires' : 'Connect2Hire'
            $('#c2h').text(c2hText)
            
            // render price
            $('#price').text('$'+this.subscription.price+'.00')
            
            // render pers
            $('#price-slot span').text('$'+this.subscription.slot_price)
            var $c2h = $('#price-c2h')
            $c2h.find('span').text('$'+this.subscription.blast_price).removeClass('none')
            if (this.subscription.blasts < 1)
                $c2h.addClass('none')
            
            // render debug
            if (this.debug)
                $('#summary').append('<pre id="output" class="marv-sm">'+JSON.stringify(this.subscription)+'</pre>')
        },
        
        events: {
            "click .option-btn": "setOption",
        },
        
        setOption: function(e) {
            var $target = $(e.currentTarget),
                value = parseInt($target.text()),
                $btn_group = $target.parents('.btn-group'),
                $btn = $btn_group.find('[data-current]'),
                field = $btn_group.data('field')
            
            $btn.text(value)
            this.subscription[field] = value 
            this.setSlotPrice() 
            if (field == 'blasts') {
                this.setBlastPrice()
            }
            
            this.updateTotal()
                          
            this.render()
            
            
            //this.trigger("change:status") Trigger a change on the form/model
        },
        
        setTier: function() {
            var index = this.subscription.slots*this.months[this.subscription.frequency] // This number is the value that determines the tier
            this.subscription.tier_id = this.tiers[index] // This gets the correct tier_id for the current settings
        },
        
        setSlotPrice: function() {
            this.setTier()
            this.subscription.slot_price = Math.floor(this.base_slot_price * Math.pow(this.decay, this.subscription.tier_id))
        },
        
        setBlastPrice: function() {
            this.subscription.blast_price = this.blast_prices[this.subscription.blasts]
        },
        
        updateTotal: function() {
            var blastTotal = this.subscription.blasts * this.subscription.blast_price,
                slotTotal = this.subscription.slots * this.subscription.slot_price * this.subscription.frequency
            this.subscription.price = slotTotal + blastTotal
        }
    })
})(jQuery);