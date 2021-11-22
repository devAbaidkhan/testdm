<!DOCTYPE html>

<html lang="en">



<head>



    <!-- include cssfiles -->

    <?php include 'includes/meta-tags.php'; ?>



    <!-- include cssfiles -->

    <?php include 'includes/csslinks.php'; ?>







</head>



<body class="margin0" id="body">



    <!-- include header -->

    <?php include 'includes/header.php'; ?>



    <!-- end of navbar -->

    <!-- for mobile screen -->





    <div class="margin-top-75">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="text-white mt-4">

                        <div class="input-group rounded shadow-sm overflow-hidden">

                            <div class="input-group-prepend">

                                <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block" id="search-btn"><i
                                        class="feather-search"></i></button>

                            </div>

                            <input type="text" class="shadow-none border-0 form-control " id="search-input"
                                placeholder="Search for restaurants or dishes">

                        </div>

                    </div>
                    <div class="col-12" id="search-div">
                    </div>
                </div>

            </div>

        </div>

    </div>













    <?php



if ($_SESSION['source']!='mobile') {
    include_once 'includes/footer.php';
}

?>



    <?php include 'includes/side-menu.php';?>



    <?php include_once 'includes/jslinks.php';?>


    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                var search = $('#search-input').val()||'';
                console.log(search);
                $.ajax({
                    type: "post",
                    url: "backend/search_ajax.php",
                    data:{
                        search:search
                    },
                    success: function (data) {
                    $('#search-div').html(data);
                    }
                });
            });
            
        });
    </script>




</body>



</html>