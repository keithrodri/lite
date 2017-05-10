jQuery(document).ready(function($)
{	
$(".tfdate").datepicker({
    dateFormat: 'D, M d, yy',
    showOn: 'button',
    buttonImage: 'http://localhost:8888/rowdtla/wp-content/themes/dtla/inc/post-types/images/icon-datepicker.png',
    buttonImageOnly: true,
    numberOfMonths: 3

    });
});