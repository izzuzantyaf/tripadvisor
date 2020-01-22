$(function () {
    $('#add_place').on('click', function () {
        $('#modal_title').html('Add place');
        $('.modal-footer button[name=add]').html('Add');
        $('.modal-body form').attr('action', 'http://localhost/traveladvisor/public/home/add_place');
        $('.modal-footer button[id=delete]').css('display', 'none');
        $('.modal-body form input').removeAttr('disabled');
        $('.modal-body form select').removeAttr('disabled');

        $('#id').val('');
        $('#name').val('');
        $('#city').val('');
        $('#country').val('');
        $('#rating').val('1');
        $('#picture').val('');
    });

    $(".card_place").hover(
        function () {
            $('.edit_button' + $(this).data('id')).css('display', 'inline');
            $('.delete_button' + $(this).data('id')).css('display', 'inline');
        },
        function () {
            $('.edit_button' + $(this).data('id')).css('display', 'none');
            $('.delete_button' + $(this).data('id')).css('display', 'none');
        });

    $('.edit').on('click', function () {
        $('#modal_title').html('Edit place');
        $('.modal-footer button[name=add]').html('Update');
        $('.modal-footer button[id=delete]').css('display', 'none');
        $('.modal-footer button[name=add]').css('display', 'block');
        $('.modal-body form').attr('action', 'http://localhost/traveladvisor/public/home/update');
        $('.modal-body form input').removeAttr('disabled');
        $('.modal-body form select').removeAttr('disabled');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/traveladvisor/public/home/get_update',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#city').val(data.city);
                $('#country').val(data.country);
                $('#rating').val(data.rating);
                $('#picture').val(data.picture);
            }
        });
    });

    $('.delete').on('click', function () {
        $('#modal_title').html('Are you sure ?');
        $('.modal-footer button[id=delete]').css('display', 'block');
        $('.modal-footer button[name=add]').css('display', 'none');
        $('.modal-body form').attr('action', 'http://localhost/traveladvisor/public/home/delete');
        $('.modal-body form input').attr('disabled', 'true');
        $('.modal-body form input[type=hidden]').removeAttr('disabled');
        $('.modal-body form select').attr('disabled', 'true');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/traveladvisor/public/home/get_update',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#city').val(data.city);
                $('#country').val(data.country);
                $('#rating').val(data.rating);
                $('#picture').val(data.picture);
            }
        });
    });
});