;(function( $ ) {
    $( document ).ready(function() {


        // SMUSH IMAGES PLUGIN UPD
        $( '.wp-smush-all' ).click(function() {

            setInterval(function() {

                if( $( '.wp-smush-bulk-wrapper[style="display: none;"]' ).size() != 1 ) {

                    $( '.wp-smush-all' ).click();
                    console.log( 'Run SMUSH..!' );

                }

            }, 1000);

        });


        // CUSTOM NAME FOR SECTIONS OF PAGE BUILDER
        $( 'body' ).on( 'keyup', '.acf-field.section-title input[type="text"], .acf-field.section-title textarea', function () {
            var $this      = $( this ),
                customName = $this.val(),
                origin     = $this.parents( '.layout' ).find( '.section-custom-title' ).attr( 'origin' );

            if ( customName != '' ) {
                $this.parents( '.layout' ).find( '.section-custom-title' ).html( customName );
            }

            else {
                $this.parents( '.layout' ).find( '.section-custom-title' ).html( origin );
            }
        });



    });
} ( jQuery ) );
