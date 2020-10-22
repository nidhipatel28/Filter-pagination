@section('title', 'Employees Management')
@extends('layouts.common')

@section('content')
    <div class="wrapper">
        <div id ="table_data">
            @include('pagination')
        </div>
    </div>
@endsection
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script>
$(document).ready(function(){
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page) {
        var l = window.location;
        var url = l.origin + l.pathname + "?page=" + page;
        $.ajax({
            url:  url,
            success: function(data) {
                $('#table_data').html(data);
            }
        });
    }

    // search data 
    $('.filter-button').click(function(){
        var role = $("#role_id").val();
        var searchVal = $('#searchText').val();

        if(searchVal != ''){
            $.ajax({
            url: '{{ url("/search")}}',
            type: "GET",
            async: true,
            data:{ 
                _token:'{{ csrf_token() }}',
                search: searchVal,
                role: role,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                console.log(data);
                $("table#employee-data tbody").html(data);
            }
            });
        } else {
            alert("Enter input for search.")
        }
        
    });

    $("#role_id").change(function() {
        if($(this).val() != 0){
            $(".filter-button").prop("disabled", false);
        } else {
            $(".filter-button").prop("disabled", true);
        }
    });
});
</script>
