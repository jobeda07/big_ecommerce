@extends('admin.admin_master')
@section('admin')
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Contact List <span class="badge rounded-pill alert-success"> {{ count($contact) }} </span></h2>
    </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive-sm">
               <table id="example" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contact as $key => $data)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->email }} </td>
                            <td> {{ $data->phone }} </td>
                            <td> {{ $data->message }} </td>
                            <td class="text-end">
                                <a href="{{ route('contact.destroy',$data->id) }}" id="delete" class="btn btn-md rounded font-sm">Delete</a>
                                <!-- dropdown //end -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
