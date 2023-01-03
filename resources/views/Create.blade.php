<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <title>Ajax CRUD </title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="../assets/css/owl-carousel.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">
</head>

<body>
    <div class="container mt-5">
        <div class="header text-center display-3 mb-5">Ajax Form</div>
        <div class="row row-2">
            <div class="col">
                <form id="ajax">
                    @csrf
                    <div id="message"></div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" class="form-control" name="name2" id="name2"
                                placeholder="Last Name" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" value="">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary ml-4 mt-5 col-md-5">Submit</button>
                    <button type="submit" name="submit" class="btn btn-danger mt-5 col-md-5">Update</button>
                </form>
            </div>
            <!--Show Data -->
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First</th>

                            <th scope="col">Email</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="d">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        show();

        function show() {
            jQuery.ajax({
                type: "get",
                url: "{{ url('show') }}",
                dataType: "json",
                success: function(response) {
                    //   console.log(response.aj);
                    $('tbody').empty()
                    $.each(response.aj, function(key, item) {
                        $('tbody').append(
                            '<tr>\
                                <th scope="row">' + item.id + '</th>\
                                <td>' + item.name + '</td>\
                                <td>' + item.email + '</td>\
                                <td><button type="button" value="' + item.id + '"  class="edit_btn btn btn-primary">Edit</button>\
                                    <button type="button" value="' + item.id + '" class=" delete_btn btn btn-danger">Dlt</button>\
                                </td>\
                            </tr>');

                    });

                }

            });

        }
        //delete data
        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();
            var s_id = $(this).val();

        // alert(s_id);
            jQuery.ajax({
                type: "GET",
                url: "delete/"+s_id,
                success: function(response) {
                    // console.log(response)
                },

            });


        });
        //edit data
        $(document).on('click', '.edit_btn', function(e) {
            e.preventDefault();
            var s_id = $(this).val();
            // console.log(s_id);
            jQuery.ajax({
                type: "GET",
                url: "edit/"+s_id,
                success: function(response) {
                    //  console.log(response.aj)
                    $('#name').val(response.aj.name);
                    $('#name2').val(response.aj.name2);
                    $('#email').val(response.aj.email);
                    $('#password').val(response.aj.password);
                },

            });

        });


        jQuery('#ajax').submit(function(e) {
            e.preventDefault();

            jQuery.ajax({
                type: "post",
                url: "{{ url('store') }}",
                data: jQuery('#ajax').serialize(),
                success: function(result) {
                    jQuery('#message').html(result.msg)
                    jQuery('#ajax')[0].reset('');
                    show();
                },

            });
        });
    });
</script>
