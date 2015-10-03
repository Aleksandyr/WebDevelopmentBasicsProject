<h1>Welcome to Home</h1>

<button id="show-books">Show books</button>
<div id="books"></div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $('#show-books').on('click', function(ev){
        $.ajax({
            url: '/books/showBooks',
            method: 'GET'
        }).success(function(data){
            $('#books').html(data);
        })
    })
</script>