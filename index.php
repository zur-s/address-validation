<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/app.css">
</head>
<body class="bg-secondary-light d-flex flex-column align-items-center justify-content-center vh-100">
    <nav class="bg-body-tertiary mb-4 w-50 p-2 rounded">
        <nav class="nav justify-content-around">
            <a class="nav-link active" aria-current="validator" data-page="validator" href="#">
                Address Validator
            </a>
            <a class="nav-link" aria-current="Saved addresses" data-page="saved-addresses" href="#">
                Saved Addresses
            </a>
        </nav>
    </nav>

    <div class="bg-body-tertiary p-4 border rounded shadow-sm page-container" id="validator">
        <h1>Address Validator</h1>
        <h2>Validate/Standardizes addresses using USPS</h2>
        <hr>
        <form action="" method="post" onsubmit="validateAddress(event)" id="save-address-form">
            <div class="form-group mb-3">
                <label for="address_1" class="form-label">Address Line 1</label>
                <input type="text" class="form-control" name="address_line_1" id="address_line_1">
            </div>
            <div class="form-group mb-3">
                <label for="address_2" class="form-label">Address Line 2</label>
                <input type="text" class="form-control" name="address_line_2" id="address_line_2">
            </div>
            <div class="form-group mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="city">
            </div>
            <div class="form-group mb-3">
                <label for="state" class="form-label">State</label>
                <select class="form-control" name="state" id="state">
                    <option value="" class="d-none">(Select)</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address_1" class="form-label">Zip Code</label>
                <input type="text" class="form-control" name="zip_code" id="zip_code">
            </div>
            <div class="form-group text-center pt-4">
                <button type="submit" class="btn btn-primary shadow-sm">
                    Validate
                </button>
            </div>
        </form>
    </div>

    <div class="container d-none page-container" id="saved-addresses">
        <div class="row">
            <div class="col">
                <table class="table table-bordered bg-body-tertiary">
                    <thead>
                        <th>Address 1</th>
                        <th>Address 2</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip code</th>
                    </thead>
                    <tbody id="saved-addresses-content"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title fs-5" id="modalLabel">Save Address</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="d-none" id="save-address">
                <span>Which Address format do you want to save?</span>
                <div class="btn-group nav-pills mb-3" role="tablist">
                    <button type="button" class="btn btn-primary active" id="original-tab" data-bs-toggle="pill" data-bs-target="#original" type="button" role="tab" aria-controls="original" aria-selected="true" data-type="original">
                        Original
                    </button>
                    <button type="button" class="btn btn-primary" id="standardized-tab" data-bs-toggle="pill" data-bs-target="#standardized" type="button" role="tab" aria-controls="standardized" aria-selected="false" data-type="standardized">
                        Standardized (USPS)
                    </button>
                </div>
                <div class="tab-content border p-2">
                    <div class="tab-pane fade show active" id="original" role="tabpanel" aria-labelledby="original-tab" tabindex="0"></div>
                    <div class="tab-pane fade" id="standardized" role="tabpanel" aria-labelledby="standardized-tab" tabindex="0"></div>
                </div>
            </div>

            <div class="alert alert-danger mt-3 d-none" id="error-alert"></div>
            <div class="alert alert-success mt-3 d-none" id="success-alert"></div>
        </div>
        <div class="modal-footer d-none" id="modal-footer">
            <button type="button" class="btn btn-primary" onclick="save()">Save</button>
        </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="assets/app.js"></script>
</body>
</html>