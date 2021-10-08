<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Employee</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    </head>
    <body>
        <section class="pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Employees</h3><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add New</button>
                            </div>
                            <div class="card-body">
                                <table class="table" id=employee-table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody id="emp_list">
                                        @if($emp)
                                            @foreach($emp as $employee)
                                                <tr>
                                                    <td>{{$employee->id}}</td>
                                                    <td>{{$employee->full_name}}</td>
                                                    <td>{{$employee->email}}</td>
                                                    <td>{{$employee->mobile_no}}</td>
                                                    <td>{{$employee->address}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <h3>No employee found!</h3>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="emp_form" name="emo_form">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Full Name : </label>
                        <input type="text" class="form-control" id="full_name" name="full_name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Mobile No.: </label>
                        <input type="text" class="form-control" id="mobile_no" name="mobile_no">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Address : </label>
                        <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
            </form>
            </div>
        </div>
        </div>
        <script>
            $("#emp_form").submit(function(e) {

                e.preventDefault();

                var form = $(this);
                $.ajax({
                    type: "POST",
                    url: 'employee',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function(data)
                    {
                        alert('employee details save!');
                        $('#emp_list').prepend('<tr><td>'+ data.id +'</td><td>'+ data.full_name +'</td><td>' + data.email +'</td><td>'+ data.mobile_no +'</td><td>' + data.address +'</td></tr>');
                    }
                });
            });
        </script>
    </body>

</html>
