/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import $ from 'jquery';
global.$ = global.jQuery = $;

$(document).ready(function() {
    setTimeout(closeFlashes, 3000);
    $('.flash .closebtn').click(
        function() {
            closeFlash($(this).parent());
        }
    );
});

function closeFlashes()
{
    $('.flash').each(function() {
        closeFlash(this);
    })
}

function closeFlash(element)
{
    $(element).animate(
        {
            opacity: 0
        },
        1000,
        function() {
            $(element).css('display', 'none');
        }
    )
}
