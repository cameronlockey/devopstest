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
            price: 0,
            slot_price: 0,
            blast_price: 0,
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
        
        options: {
            base_slot_price: 325,
            blast_prices: {
                0 : 0,
                1 : 69,
                2 : 49
            },
            decay : 0.92 
        },
        
        // Init the plan selector
        initialize: function(options) {
            this.options = _.defaults(options || {}, this.options)
            this.decay = this.options.decay
            this.base_slot_price = this.options.base_slot_price
            this.blast_prices = this.options.blast_prices
            this.setSlotPrice().setBlastPrice().updateTotal().render()
        },
        
        render: function() {
            
            // render price
            $('#price').text('$'+this.subscription.price+'.00')
            
            // render pers
            $('#price-slot span').text('$'+this.subscription.slot_price)
            var $c2h = $('#price-c2h')
            if (this.subscription.blasts) {
                 $c2h.find('span').text('$'+this.subscription.blast_price)
                 $c2h.removeClass('none')
            } else {
                $c2h.addClass('none')
            } 
            $('#month-summary span').text(this.subscription.frequency+' month')
            
            // render debug
            if (this.debug)
                $('#summary').append('<pre id="output" class="marv-sm">'+JSON.stringify(this.subscription)+'</pre>')
        },
        
        events: {
            "click .option-btn": "setOption",
        },
        
        setOption: function(e) {
            var $target = $(e.currentTarget),
                value = parseInt($target.data('value')),
                text = $target.text(),
                $btn_group = $target.parents('.btn-group'),
                $btn = $btn_group.find('[data-current]'),
                field = $btn_group.data('field')
            
            $btn.text(text)
            this.subscription[field] = value 
            this.setSlotPrice() 
            if (field == 'blasts') {
                this.setBlastPrice()
            }
            
            this.updateTotal()
                          
            this.render()
            
            return this            
        },
        
        setTier: function() {
            var index = this.subscription.slots*this.months[this.subscription.frequency] // This number is the value that determines the tier
            this.subscription.tier_id = this.tiers[index] // This gets the correct tier_id for the current settings
            return this
        },
        
        setSlotPrice: function() {
            this.setTier()
            this.subscription.slot_price = Math.floor(this.base_slot_price * Math.pow(this.decay, this.subscription.tier_id))
            return this
        },
        
        setBlastPrice: function() {
            this.subscription.blast_price = this.blast_prices[this.subscription.blasts]
            return this
        },
        
        updateTotal: function() {
            var blastTotal = this.subscription.blasts * this.subscription.blast_price,
                slotTotal = this.subscription.slots * this.subscription.slot_price * this.subscription.frequency
            this.subscription.price = slotTotal + blastTotal
            return this
        }
    })
})(jQuery);