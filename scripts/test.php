
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript">
        $(function(){
            $('#result').hide();
            $('#search').keyup(function(){
                var value = $(this).val();
                if (value !=="") {
                    $.ajax({
                        type: 'GET',
                        url: 'findusers.php',
                        data: 'q='+value,
                        success: function(data){
                            $('#result').html(data);
                        }
                    });
                    $('#result').show();

                }
                else {
                    $('#result').hide();
                }
            });
        });
        </script>
    </head>
    <body>
        <?php
        session_start();
        echo $_SESSION['username'];
        echo "<br> DELA?";
         ?>
         <form>
             <input type="text" size="30" id="search">
             <div id="result"></div>
         </form>
    </body>
</html>
