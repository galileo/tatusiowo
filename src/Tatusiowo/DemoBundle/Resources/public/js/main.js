$(function(){
	'use strict';

	var Daddy = {};

	Daddy.VARS = {
		NAV: $('.jsNav'),
	};

	Daddy.navigation = function($elem){
		$elem.sidr({
			side: 'left',
			speed: 400
		});
	};

	Daddy.init = function() {
		var $window = $(window);

        if(this.VARS.NAV.length) {
            this.navigation(this.VARS.NAV);
        }

        $(document).on('click', function(e){
            if(!$(event.target).closest('#sidr').length && $('body').hasClass('sidr-open')) {
                $('body').removeClass('sidr-open');
				$.sidr('close');
	        }
        });
	};



	Daddy.init();

}());
