<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Carrer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h2>User Carrer</h2>
        <form id="carreeForm">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                    required>
            </div>
            <div class="mb-3 mt-3">
                <label for="ph_no">Contact Number:</label>
                <input type="number" class="form-control" id="ph_no" placeholder="Enter Phone No." name="ph_no"
                    required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email">email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                    required>
            </div>
            <div class="mb-3 mt-3">
                <label for="totalExp"> Total Experience:</label>
                <input type="text" class="form-control" id="totalExp" placeholder="Enter Total Experience:"
                    name="totalExp" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="skillsets">Skillsets:</label>
                <input type="text" class="form-control" id="skillsets" placeholder="Enter Skillsets" name="skillsets"
                    required>
            </div>
            <div class="mb-3 mt-3">
                <label for="curentOrg">Current Organization:</label>
                <input type="text" class="form-control" id="curentOrg" placeholder="Enter Current Organization:"
                    name="curentOrg" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="addtinalRemark"> Additional Remarks:</label>
                <input type="text" class="form-control" id="addtinalRemark" placeholder="Enter Additional Remarks:"
                    name="addtinalRemark" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="resume">Resume:</label>
                <input type="file" class="form-control" id="resume" name="resume" required>
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#carreeForm').on("submit", function(e) {
                var submitbtn = $(this).find("input[type=submit]");
                $(submitbtn).text("Please Wait...");
                $(submitbtn).props(disable, true);

                e.preventDefault();

                var data = new FormData(this);
                // console.log(data);
                $.ajax({
                    url: "{{ route('carrer.addData') }}",
                    type: "post",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success == true) {
                            $(submitbtn).text("submit");
                            $(submitbtn).props(disable, false);
                            alert(data.msg);
                        } else {
                            alert(data.msg);
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>
