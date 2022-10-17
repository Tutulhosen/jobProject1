@extends('admin.layout.app')

@section('main-content')
<div class="row">
    <div class="main-wrapper">
		
        
        
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        
                        <li > 
                            <a href="{{ route('admin.user.dashboard') }}"><i class="fe fe-home"></i> <span>All User</span></a>
                        </li>
                        
                        <li> 
                            <a href="{{ route('admin.user.logout') }}"><i class="fe fe-layout"></i> <span>Logout</span></a>
                        </li>
                        
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->
        
        <!-- Page Wrapper -->
        <div class="page-wrapper">
        
            <div class="content container-fluid">
                
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome Admin!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                
                
                <div class="row">

                    <div class="col-md-12 d-flex">
                    
                        <!-- Recent Orders -->
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">User List</h4>
                            </div>
                            @include('validate.validate')
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th> Name</th>
                                                <th>Email</th>
                                                
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @forelse ($user_data as $user)
                                            @if ($user->name!='Provider')
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->status)
                                                    <button style="cursor:auto"  class="btn btn-primary">Active</button>
                                                    @endif
                                                    @if ($user->status==false)
                                                    <button style="cursor:auto" class="btn btn-warning">Panding</button>
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                    @if ($user->status==false)
                                                    <a class="btn btn-md btn-success" href="{{ route('admin.user.status.update', $user->id) }}">Approve</a>
                                                    @endif
                                                   
                                                    <a class="btn btn-md btn-danger" href="{{ route('admin.user.destroy', $user->id) }}">Delete</a>
                                                </td>
                                               </tr>
                                            @endif
                                            
                                        @empty
                                            no recode found
                                        @endforelse
                                           
                                            
                                           
                                        
                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Recent Orders -->
                        
                    </div>

                    
                </div>
                
                
            </div>			
        </div>
        <!-- /Page Wrapper -->
    
    </div>
    
</div>
@endsection