var App = App || {}

App.LocationView = Backbone.View.extend({
    el: $('#app'),
    components: {
        locality: 'City',
        administrative_area_level_1: 'State',
        postal_code: 'PostalCode',
        lat: '',
        lng: ''
    },
    initialize: function() {
        // Create the autocomplete object, restricting the search to geographical location types
        this.autocomplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */
            (document.getElementById('LocationInput')),
            {componentRestrictions: { country: 'us'}}
        )
        
        // When the user selects an address from the dropdown,
        // populate the address fields in the form
        var _this = this
        google.maps.event.addListener(this.autocomplete, 'place_changed', _.bind(this.fill, this))
    },
    events: {
        'focus #LocationInput' : 'geolocate'  
    },
    fill: function() {
        // Get the place details from the autocomplete object
        this.place = this.autocomplete.getPlace()
        console.log(this.place)
        
        // Reset field values
        for (var field in this.components) {
            $('#Location'+this.components[field]).val('')
        }
        
        // Set address components in fields
        for (var i=0; i < this.place.address_components.length; i++) {
            var type = this.place.address_components[i].types[0]
            if (this.components[type]) {
                var value = this.place.address_components[i]['short_name'],
                    id = 'Location'+this.components[type]
                $('#'+id).val(value)
            }                
        }
        
        // Set geolocation data
        var coord = {lat: this.place.geometry.location.k, lng: this.place.geometry.location.B}
        this.components.lat = coord.lat
        this.components.lng = coord.lng
        $('#LocationLat').val(this.components.lat)
        $('#LocationLng').val(this.components.lng)
    },
    geolocate: function() {
        var that = this
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = new google.maps.LatLng(
                position.coords.latitude, position.coords.longitude);
                that.autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
                geolocation));
            });
        }
    }
})