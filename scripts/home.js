$(document).ready(function() {
    $('.edit').each(function() {
        $(this).click(function() {
            let affrow = $(this).parent().parent().parent();
            $(affrow).find('.edit').attr('hidden', 'hidden');
            $(affrow).find('.save').removeAttr('hidden');
            $(affrow).find('.imgsrc').removeAttr('hidden');
            $(affrow).find('.imgsrc').removeAttr('disabled');
            $(affrow).find('img').attr('hidden', 'hidden');
            $(affrow).find('input').each(function(key, inp) {
                $(inp).removeAttr('disabled');
            })
        })
    })
    $('#trigger').click(function(e) {
        e.preventDefault();
        $('#add').trigger('submit');
    })
    $('#add input').each(function(key, input) {
        $(input).keyup(function() {
            if($('#add #title').val() != '' && $('#add #author').val() != '' && $('#add #year').val() != '' && $('#add #cover').val() != '') {
                $('#trigger').removeAttr('disabled');
            }
            else {
                $('#trigger').attr('disabled', 'disabled');
            }
        })
    })
    $('#search').submit(function(e) {
        e.preventDefault();
        let key = $('#query').val();
        $('tbody tr').each(function() {
            $(this).hide();
        })
        $(`td input[value*=${key}]`).each(function() {
            $(this).parent().parent().show();
        })
    })
    $('#logout').click(function(e) {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `ajax/sessdestroy.php`, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.replace('welcome.php');
            }
        }
    })
})