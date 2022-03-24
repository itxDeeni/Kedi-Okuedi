$(function() {
    var paraTag = $('input#submit1').parent('p');
    $(paraTag).children('input').remove();
    $(paraTag).append('<input type="button"  name="submit1"  id="submit1" value="Subscribe !"/>');

    $('#main1 input#submit1').click(function() {
        $('#main1').append('<img src="images/loader.gif" alt="" />');

       
        var email1 = $('input#email1').val();
    

        $.ajax({
            type: 'post',
            url: 'submit.php',
            data: '&email1=' + email1,

            success: function(results) {
                $('#main1 img').fadeOut(1000);
                $('ul#response1').html(results);
            }
        }); // end ajax
    });
});
		