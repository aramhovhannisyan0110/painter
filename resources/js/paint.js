import $ from 'jquery';
import './drawr';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
const canvas = $("#canvas");
$('#save').on('click', function (e) {
    e.preventDefault();
    const image = $("#canvas").drawr("export");

    $.post($(this).attr('action'), {
            "image": image,
        },
        function (data, rej) {
            if (rej === 'success') {
                location.href = 'galleria'
            }
        }
    )
});

$('#image').on('change', function () {
    $("#canvas").drawr("load", URL.createObjectURL(this.files[0]));

})


canvas.drawr({"enable_tranparency": false, "canvas_width": 800, "canvas_height": 800, "left": "none"});
canvas.drawr("start");

