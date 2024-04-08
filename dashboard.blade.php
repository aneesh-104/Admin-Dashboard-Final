<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS styles here if needed -->
    <style>
        /* Add your custom CSS styles here */
        .container {

            margin-top: 10px;
            margin-left: 10px;
            text-align: center;
            padding-left:5px;
            padding-right:10px;
        }

        .table {
            margin: 0 auto; /* Center the table horizontally */
            width: 90%; 
        }
        .sidebar {
            background-color: #ADD8E6;
            padding: 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .sidebar h3 {
            margin-bottom: 20px;
        }
        .sidebar ul {
            padding-left: 0;
            list-style: none;
            flex-grow: 1; 
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            display: flex;
            padding: 10px 15px;
            color: #000000;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #e9ecef;
            text-decoration: none;
        }
        .content {
            padding-left: 15px;
            padding-right: 15px;
        }
        .logo 
        {
            color: #a71818f4;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }
        html, body, .container, .row {
            height: 100%;
        }
    </style>
</head>
<!-- <body style="text-align: center;"> -->
<body>
<div class ="container">
   <div class="row">
            <div class="col-md-3">
            <div class="logo">
             <h3>WishWell</h3>
</div>
<div class="sidebar">
        <h3>Menu</h3>
        <ul>
        <li><a href="#all-campaigns" onclick="showTable('all-campaigns')">All Campaigns</a></li>
                <li><a href="#all-users" onclick="showTable('all-users')">All Users</a></li>
                <li><a href="#active-campaigns" onclick="showTable('active-campaigns')">Active Campaigns</a></li>
                <li><a href="#inactive-campaigns" onclick="showTable('inactive-campaigns')">Inactive Campaigns</a></li>
                <li><a href="#donations" onclick="showTable('donations')">Donations</a></li>
                <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-block">Logout</button>
            </form>
        </li>
        </ul>
    </div>
    </div>
    <div class="col-md-9">
    <div class ="content">
    <?php /*
                // Fetch data dynamically from tables
                $campaigns = Campaign::all(); // Assuming Campaign is your model for campaigns
                $allusers = AllUser::all(); // Assuming User is your model for users
                $donations = Donation::all(); // Assuming Donation is your model for donations
                $activeCampaigns = Campaign::where('status', 'active')->get();
                $inactiveCampaigns = Campaign::where('status', 'inactive')->get();
               */ ?>

                <!-- <?/*php if (!isset($_GET['table']) || empty($_GET['table'])): */?> -->
                <div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title text-primary">Campaigns</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer bg-transparent border-0">
                <p class="card-text">Total:</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title text-primary">All Users</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer bg-transparent border-0">
                <p class="card-text">Total: 40</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title text-primary">Active Campaigns</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer bg-transparent border-0">
                <p class="card-text">Total: 80</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title text-primary">Inactive Campaigns</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer bg-transparent border-0">
                <p class="card-text">Total: 100</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-header bg-transparent border-0">
                <h5 class="card-title text-primary">Donations</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer bg-transparent border-0">
                <p class="card-text">Total: 120</p>
            </div>
        </div>
    </div>
</div>

    <div id="all-campaigns" style="display:none;">
        <h1>Campaigns</h1>
        <!-- <div class="table-responsive"> -->
        <table class="table table-striped table-bordered ">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>UserId</th>
                    <th>Cause</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Amount</th>
                    <th>Current Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Beneficiary Name</th>
                    <th>Beneficiary Age</th>
                    <th>Beneficiary City</th>
                    <th>Beneficiary Mobile</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->user_id}}</td>
                        <td>{{$campaign->cause }}</td>
                        <td>{{$campaign->title }}</td>
                        <td>{{$campaign->description }}</td>
                        <td>{{$campaign->goal_amount }}</td>
                        <td>{{$campaign->current_amount }}</td>
                        <td>{{$campaign->start_date }}</td>
                        <td>{{$campaign->end_date }}</td>
                        <td>{{$campaign->beneficiary_name }}</td>
                        <td>{{$campaign->beneficiary_age }}</td>
                        <td>{{$campaign->beneficiary_city }}</td>
                        <td>{{$campaign->beneficiary_mobile }}</td>
                        <td>{{$campaign->created_at}}</td>
                        <td>{{$campaign->updated_at}}</td>
                        <td>{{$campaign->status }}</td>
                        <td>
                            @if($campaign->status == 'pending')
                            <form action="{{ route('approve',['id' => $campaign->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('deny',['id' => $campaign->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Deny</button>
                        </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div id="all-users" style="display:none;">
        <h1>All Users</h1>
        <!-- <div class="table-responsive"> Make the table responsive -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark"> <!-- Dark header -->
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>PAN</th>
                        <th>Balance</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>

                        <!-- You can add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @if(isset($allusers))
                        @foreach($allusers as $alluser)
                            <tr>
                                <td>{{ $alluser->id }}</td>
                                <td>{{ $alluser->name }}</td>
                                <td>{{ $alluser->email }}</td>
                                <td>{{ $alluser->dob }}</td>
                                <td>{{ $alluser->sex }}</td>
                                <td>{{ $alluser->age }}</td>
                                <td>{{ $alluser->pan }}</td>
                                <td>{{ $alluser->balance }}</td>
                                <td>{{ $alluser->address }}</td>
                                <td>{{ $alluser->city }}</td>
                                <td>{{ $alluser->role }}</td>
                                <td>{{$alluser->created_at}}</td>
                                <td>{{$alluser->updated_at}}</td>
                                <td>
                                    <form action="{{ route('disable', $alluser->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Disable</button>
                                    </form>
                                </td>
                                <!-- You can add more columns as needed -->
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">No users found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
          </div>

   <div id="donations" style="display:none;">
        <h1>Donations</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Donor ID</th>
                    <th>Donor Name</th>
                    <th>Campaign ID</th>
                    <th>Campaign Title</th>
                    <th>Amount</th>
                    <th>Transaction Date</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donation)
                    <tr>
                        <td>{{$donation->id}}</td>
                        <td>{{$donation->donor_id}}</td>
                        <td>{{ $donation->donor->name }}</td> <!-- Assuming donor relationship is defined in Donation model -->
                        <td>{{$donation->campaign_id}}</td>
                        <td>{{ $donation->campaign->title }}</td> <!-- Assuming campaign relationship is defined in Donation model -->
                        <td>{{ $donation->amount }}</td>
                        <td>{{ $donation->transaction_date }}</td>
                        <td>{{$donation->created_at}}</td>
                        <td>{{$donation->updated_at}}</td>
                        <td>
                            <form action="{{ route('refund', ['id' => $donation->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Refund</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div id="active-campaigns" style="display:none;">
        <h1>Active Campaigns</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>UserId</th>
                    <th>Cause</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Amount</th>
                    <th>Current Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Beneficiary Name</th>
                    <th>Beneficiary Age</th>
                    <th>Beneficiary City</th>
                    <th>Beneficiary Mobile</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activeCampaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->user_id}}</td>
                        <td>{{ $campaign->cause }}</td>
                        <td>{{ $campaign->title }}</td>
                        <td>{{ $campaign->description }}</td>
                        <td>{{ $campaign->goal_amount }}</td>
                        <td>{{ $campaign->current_amount }}</td>
                        <td>{{ $campaign->start_date }}</td>
                        <td>{{ $campaign->end_date }}</td>
                        <td>{{ $campaign->beneficiary_name }}</td>
                        <td>{{ $campaign->beneficiary_age }}</td>
                        <td>{{ $campaign->beneficiary_city }}</td>
                        <td>{{ $campaign->beneficiary_mobile }}</td>
                        <td>{{$campaign->created_at}}</td>
                        <td>{{$campaign->updated_at}}</td>
                        <td>{{ $campaign->status }}</td>
                        <td>
                            @if($campaign->status == 'active')
                                <!-- Add actions for active campaigns here if needed -->
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div id="inactive-campaigns"style="display:none;">
        <h1>Inactive Campaigns</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>UserId</th>
                    <th>Cause</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Amount</th>
                    <th>Current Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Beneficiary Name</th>
                    <th>Beneficiary Age</th>
                    <th>Beneficiary City</th>
                    <th>Beneficiary Mobile</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inactiveCampaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->user_id}}</td>
                        <td>{{ $campaign->cause }}</td>
                        <td>{{ $campaign->title }}</td>
                        <td>{{ $campaign->description }}</td>
                        <td>{{ $campaign->goal_amount }}</td>
                        <td>{{ $campaign->current_amount }}</td>
                        <td>{{ $campaign->start_date }}</td>
                        <td>{{ $campaign->end_date }}</td>
                        <td>{{ $campaign->beneficiary_name }}</td>
                        <td>{{ $campaign->beneficiary_age }}</td>
                        <td>{{ $campaign->beneficiary_city }}</td>
                        <td>{{ $campaign->beneficiary_mobile }}</td>
                        <td>{{$campaign->created_at}}</td>
                        <td>{{$campaign->updated_at}}</td>
                        <td>{{ $campaign->status }}</td>
                        <td>
                            @if($campaign->status == 'active')
                                <!-- Add actions for active campaigns here if needed -->
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
       
    <script>
        function showTable(tableId) {
            // Hide all tables
            document.querySelectorAll('.content > div').forEach(function(el) {
                el.style.display = 'none';
            });

            // Show the selected table
            document.getElementById(tableId).style.display = 'block';
        }
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>

