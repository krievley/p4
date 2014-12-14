/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
   //Hide rsvp form initially.
    $('.rsvp_form').hide();

    //When rsvp link is clicked, 
    $('.rsvp').on('click', function() {
        //fade the page.
        $('.cover').fadeTo("fast", 0.3);
        //display rsvp form
        $('.rsvp_form').show();
    });

    //When close link is clicked
    $('#close').on('click', function() {
        //hide rsvp form
        $('.rsvp_form').hide();
        //and restore view of page.
        $('.cover').fadeTo("fast", 1);
    }); 
});
